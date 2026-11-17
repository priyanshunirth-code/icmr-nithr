<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/bootstrap.php';

// Brute-force protection helper
function is_locked_out(PDO $pdo, string $username, string $ip): bool {
    $since = date('Y-m-d H:i:s', time() - 900);
    $stmt = $pdo->prepare('
        SELECT COUNT(*) FROM login_attempts
        WHERE (username = ? OR ip = ?) AND success = 0 AND attempted_at >= ?
    ');
    $stmt->execute([$username, $ip, $since]);
    return (int)$stmt->fetchColumn() >= 5;
}

// Authentication handling
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'login') {
    require_csrf();
    $username = trim((string)($_POST['username'] ?? ''));
    $password = (string)($_POST['password'] ?? '');
    $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';

    if (is_locked_out($pdo, $username, $ip)) {
        $login_error = 'Too many failed attempts. Account temporarily locked for 15 minutes.';
    } else {
        $raw_role = strtolower(trim((string)($_POST['account_type'] ?? 'user')));
        $expected_role = ($raw_role === 'master') ? 'Master' : 'User';

        $stmt = $pdo->prepare('
            SELECT id, username, password_hash, role, must_change_password
            FROM users
            WHERE username = ? AND role = ? AND is_active = 1
            LIMIT 1
        ');
        $stmt->execute([$username, $expected_role]);
        $user = $stmt->fetch();

        // Dummy hash for timing attack mitigation
        $dummy_hash = '$2y$10$cf11ae107db7a7cf35467e415b39ad34024564883526a0cb5d6e2';
        $hash = $user ? (string)$user['password_hash'] : $dummy_hash;

        if ($user && password_verify($password, $hash)) {
            $pdo->prepare('INSERT INTO login_attempts (username, ip, success) VALUES (?, ?, 1)')
                ->execute([$username, $ip]);

            session_regenerate_id(true);
            $_SESSION['user'] = [
                'id' => (int)$user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'must_change_password' => (int)($user['must_change_password'] ?? 0),
            ];
            $_SESSION['last_activity'] = time();
            $_SESSION['session_start'] = time();

            $pdo->prepare('UPDATE users SET last_login_at = CURRENT_TIMESTAMP WHERE id = ?')
                ->execute([$user['id']]);

            if (password_needs_rehash($hash, PASSWORD_DEFAULT)) {
                $new_hash = password_hash($password, PASSWORD_DEFAULT);
                $pdo->prepare('UPDATE users SET password_hash = ? WHERE id = ?')
                    ->execute([$new_hash, $user['id']]);
            }

            log_audit($pdo, 'login_success', 'auth', (string)$user['id'], "Signed in as {$expected_role}");
            header('Location: index.php');
            exit;
        } else {
            $pdo->prepare('INSERT INTO login_attempts (username, ip, success) VALUES (?, ?, 0)')
                ->execute([$username, $ip]);

            log_audit($pdo, 'login_failed', 'auth', null, json_encode(['username' => $username, 'role' => $expected_role, 'ip' => $ip]));
            $login_error = 'Invalid credentials.';
        }
    }
}

// POST logout with CSRF protection
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'logout') {
    require_csrf();
    $user_id = current_user()['id'] ?? null;
    if ($user_id) {
        log_audit($pdo, 'logout', 'auth', (string)$user_id);
    }
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $p = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
    }
    session_destroy();
    header('Location: index.php');
    exit;
}

$logged_in = current_user() !== null;
if (!$logged_in) {
    require __DIR__ . '/login.php';
    exit;
}

// Metrics for Dashboard
$stats = ['assets' => 0, 'ips' => 0, 'ad' => 0, 'non_ad' => 0];
$recent_assets = [];
$recent_ips = [];

if ($pdo) {
    $stats['assets'] = (int)$pdo->query('SELECT COUNT(*) FROM it_inventory')->fetchColumn();
    $stats['ips'] = (int)$pdo->query('SELECT COUNT(*) FROM ip_directory')->fetchColumn();
    $stats['ad'] = (int)$pdo->query("SELECT COUNT(*) FROM ip_directory WHERE ad_status = 'AD Registered'")->fetchColumn();
    $stats['non_ad'] = (int)$pdo->query("SELECT COUNT(*) FROM ip_directory WHERE ad_status = 'Non-AD'")->fetchColumn();
    $recent_assets = $pdo->query('
        SELECT asset_id, device_name, category, assigned_to, status, updated_at
        FROM it_inventory
        ORDER BY created_at DESC LIMIT 6
    ')->fetchAll();
    $recent_ips = $pdo->query('
        SELECT ip_address, hostname, device_type, ad_status, device_status, updated_at
        FROM ip_directory
        ORDER BY created_at DESC LIMIT 6
    ')->fetchAll();
}

$user = current_user();
$is_master = can('manage_users');
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= e($config['app_name']) ?></title>
    <link rel="stylesheet" href="assets/css/app.css">
</head>
<body>
<div class="app-shell" data-role="<?= e($user['role']) ?>">
    <aside class="sidebar">
        <div class="sidebar-brand">
            <img src="assets/images/logo.jpg" alt="ICMR-NITHR logo" class="brand-logo-img">
            <div>
                <strong><?= e($config['institution_name']) ?></strong>
                <small>Internal IT Services</small>
            </div>
        </div>
        <nav>
            <button type="button" class="nav-item active" data-view="dashboard"><span>⌂</span>Dashboard</button>
            <button type="button" class="nav-item" data-view="inventory"><span>▣</span>IT Inventory</button>
            <button type="button" class="nav-item" data-view="directory"><span>⌘</span>IP Directory</button>
            <?php if ($is_master): ?>
            <button type="button" class="nav-item" data-view="users"><span>👥</span>User Accounts</button>
            <button type="button" class="nav-item" data-view="audit"><span>📋</span>Audit Log</button>
            <?php endif; ?>
        </nav>
        <div class="sidebar-footer">
            <button type="button" class="user-profile-btn" data-view="profile" title="View Profile & Settings">
                <span class="user-avatar"><?= e(strtoupper(substr($user['username'], 0, 1))) ?></span>
                <div class="user-info">
                    <strong><?= e($user['username']) ?></strong>
                    <small><?= e($user['role']) ?></small>
                </div>
            </button>
            <form method="post" action="index.php" style="margin:0;">
                <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
                <input type="hidden" name="action" value="logout">
                <button type="submit" class="logout-link" title="Logout">↪</button>
            </form>
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <div class="mobile-brand">ICMR-NITHR</div>
            <div class="topbar-branding">
                <span class="hindi-title">आई.सी.एम.आर. - राष्ट्रीय जनजातीय स्वास्थ्य अनुसंधान संस्थान, जबलपुर</span>
                <span class="eng-title">ICMR - National Institute for Tribal Health Research, Jabalpur</span>
            </div>
            <div class="global-search">
                <span>⌕</span>
                <input id="globalSearch" placeholder="Search assets, IP, user, or hostname…">
            </div>
            <div class="system-status">
                <i></i>
                <div>
                    <strong>Systems Operational</strong>
                    <small>Internal network · <?= date('d M Y, H:i') ?></small>
                </div>
            </div>
            <form method="post" action="index.php" class="topbar-logout-form">
                <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
                <input type="hidden" name="action" value="logout">
                <button type="submit" class="btn btn-outline btn-logout">Logout</button>
            </form>
        </header>

        <?php if (!empty($user['must_change_password'])): ?>
        <div class="alert alert-warning" style="margin:20px 24px 0;">
            <strong>Security Reminder:</strong> Your account requires a password change. Please <a href="#" data-view-target="profile" style="text-decoration:underline;color:inherit;font-weight:700;">update your password in settings</a>.
        </div>
        <?php endif; ?>

        <!-- DASHBOARD VIEW -->
        <section id="dashboard" class="view active">
            <div class="page-heading">
                <div>
                    <h1>Welcome, <?= e($user['username']) ?></h1>
                    <p>Overview of IT assets and IP records at <?= e($config['institution_name']) ?>.</p>
                </div>
            </div>
            <div class="metric-grid">
                <article class="metric-card">
                    <span>Total IT Assets</span>
                    <strong><?= $stats['assets'] ?></strong>
                    <em class="trend">↗ +12 (2.9%)</em>
                    <small>vs. previous 30 days</small>
                    <div class="sparkline blue"></div>
                </article>
                <article class="metric-card">
                    <span>Total IP Records</span>
                    <strong><?= $stats['ips'] ?></strong>
                    <em class="trend">↗ +18 (3.6%)</em>
                    <small>vs. previous 30 days</small>
                    <div class="sparkline blue"></div>
                </article>
                <article class="metric-card">
                    <span>AD-Registered</span>
                    <strong><?= $stats['ad'] ?></strong>
                    <small><?= $stats['ips'] ? round($stats['ad'] / $stats['ips'] * 100, 1) : 0 ?>% of records</small>
                    <div class="bars mint"><i></i><i></i><i></i><i></i><i></i></div>
                </article>
                <article class="metric-card">
                    <span>Non-AD</span>
                    <strong><?= $stats['non_ad'] ?></strong>
                    <small><?= $stats['ips'] ? round($stats['non_ad'] / $stats['ips'] * 100, 1) : 0 ?>% of records</small>
                    <div class="bars amber"><i></i><i></i><i></i><i></i><i></i></div>
                </article>
            </div>
            <div class="dashboard-tables">
                <article class="panel">
                    <div class="panel-heading">
                        <h2>Recent IT Assets</h2>
                        <button type="button" class="btn btn-outline" data-view-target="inventory">View All</button>
                    </div>
                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>Asset ID</th>
                                    <th>Device Name</th>
                                    <th>Category</th>
                                    <th>Assigned To</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_assets as $row): ?>
                                <tr>
                                    <td class="strong"><?= e($row['asset_id']) ?></td>
                                    <td><?= e($row['device_name']) ?></td>
                                    <td><?= e($row['category']) ?></td>
                                    <td><?= e($row['assigned_to'] ?: '—') ?></td>
                                    <td><span class="status <?= strtolower(str_replace(' ', '-', $row['status'])) ?>"><?= e($row['status']) ?></span></td>
                                </tr>
                                <?php endforeach; if (!$recent_assets): ?>
                                <tr><td colspan="5" class="empty">No assets recorded.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </article>
                <article class="panel">
                    <div class="panel-heading">
                        <h2>Recent IP Records</h2>
                        <button type="button" class="btn btn-outline" data-view-target="directory">View All</button>
                    </div>
                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>IP Address</th>
                                    <th>Hostname</th>
                                    <th>Device Type</th>
                                    <th>AD Status</th>
                                    <th>State</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_ips as $row): ?>
                                <tr>
                                    <td class="strong"><?= e($row['ip_address']) ?></td>
                                    <td><?= e($row['hostname']) ?></td>
                                    <td><?= e($row['device_type']) ?></td>
                                    <td><span class="status <?= $row['ad_status'] === 'AD Registered' ? 'assigned' : 'repair' ?>"><?= e($row['ad_status']) ?></span></td>
                                    <td><span class="dot-status <?= strtolower($row['device_status']) ?>"><i></i><?= e($row['device_status']) ?></span></td>
                                </tr>
                                <?php endforeach; if (!$recent_ips): ?>
                                <tr><td colspan="5" class="empty">No IP records recorded.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </article>
            </div>
        </section>

        <!-- IT INVENTORY VIEW -->
        <section id="inventory" class="view">
            <div class="page-heading">
                <div>
                    <h1>IT Inventory</h1>
                    <p>Manage institutional equipment, hardware specifications, and assignments.</p>
                </div>
                <div class="button-group">
                    <?php if (can('import')): ?>
                    <button type="button" class="btn btn-outline" data-modal="importModal" data-import-type="inventory">Import CSV</button>
                    <?php endif; ?>
                    <?php if (can('write')): ?>
                    <button type="button" class="btn btn-primary" data-modal="inventoryModal">+ Add inventory</button>
                    <?php endif; ?>
                </div>
            </div>
            <div class="toolbar">
                <input class="table-search" id="inventorySearch" placeholder="⌕  Search asset ID, device, serial, or assignee…">
                <select id="inventoryCategoryFilter">
                    <option value="">All categories</option>
                    <option value="Desktop">Desktop</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Printer">Printer</option>
                    <option value="Switch">Switch</option>
                    <option value="Other">Other</option>
                </select>
                <select id="inventoryStatusFilter">
                    <option value="">All statuses</option>
                    <option value="Available">Available</option>
                    <option value="Assigned">Assigned</option>
                    <option value="Under Repair">Under Repair</option>
                    <option value="Retired">Retired</option>
                </select>
                <?php if (can('export')): ?>
                <a class="btn btn-outline" id="inventoryExportBtn" href="api/export.php?type=inventory">Export CSV</a>
                <?php endif; ?>
            </div>
            <article class="panel">
                <div class="table-wrap">
                    <table id="inventoryTable">
                        <thead>
                            <tr>
                                <th>Asset ID</th>
                                <th>Device Name</th>
                                <th>Category</th>
                                <th>Brand / Model</th>
                                <th>Assigned To</th>
                                <th>Department</th>
                                <th>Location</th>
                                <th>IP Address</th>
                                <th>Status</th>
                                <?php if (can('edit') || can('delete')): ?>
                                <th>Actions</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td colspan="10" class="empty">Loading inventory records…</td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination-bar" id="inventoryPagination"></div>
            </article>
        </section>

        <!-- IP DIRECTORY VIEW -->
        <section id="directory" class="view">
            <div class="page-heading">
                <div>
                    <h1>IP Address Directory</h1>
                    <p>Institutional IP address allocation records and network device mapping.</p>
                </div>
                <div class="button-group">
                    <?php if (can('import')): ?>
                    <button type="button" class="btn btn-outline" data-modal="importModal" data-import-type="ip">Import CSV</button>
                    <?php endif; ?>
                    <?php if (can('write')): ?>
                    <button type="button" class="btn btn-primary" data-modal="ipModal">+ Add IP record</button>
                    <?php endif; ?>
                </div>
            </div>
            <div class="toolbar">
                <input class="table-search" id="ipSearch" placeholder="⌕  Search IP address, hostname, or department…">
                <select id="ipDeviceTypeFilter">
                    <option value="">All device types</option>
                    <option value="Desktop">Desktop</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Printer">Printer</option>
                    <option value="Switch">Switch</option>
                    <option value="Other">Other</option>
                </select>
                <select id="ipAdStatusFilter">
                    <option value="">All AD statuses</option>
                    <option value="AD Registered">AD Registered</option>
                    <option value="Non-AD">Non-AD</option>
                </select>
                <?php if (can('export')): ?>
                <a class="btn btn-outline" id="ipExportBtn" href="api/export.php?type=ip">Export CSV</a>
                <?php endif; ?>
            </div>
            <article class="panel">
                <div class="table-wrap">
                    <table id="ipTable">
                        <thead>
                            <tr>
                                <th>IP Address</th>
                                <th>Hostname</th>
                                <th>Device Type</th>
                                <th>AD Status</th>
                                <th>MAC Address</th>
                                <th>Department</th>
                                <th>Location</th>
                                <th>Status</th>
                                <?php if (can('edit') || can('delete')): ?>
                                <th>Actions</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td colspan="9" class="empty">Loading IP directory…</td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination-bar" id="ipPagination"></div>
            </article>
        </section>

        <!-- USER MANAGEMENT VIEW (MASTER ONLY) -->
        <?php if ($is_master): ?>
        <section id="users" class="view">
            <div class="page-heading">
                <div>
                    <h1>User Management</h1>
                    <p>Provision institutional user accounts, assign roles, and manage access credentials.</p>
                </div>
                <button type="button" class="btn btn-primary" data-modal="userCreateModal">+ Create User</button>
            </div>
            <article class="panel">
                <div class="table-wrap">
                    <table id="usersTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Last Login</th>
                                <th>Must Change Password</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td colspan="8" class="empty">Loading accounts…</td></tr>
                        </tbody>
                    </table>
                </div>
            </article>
        </section>

        <!-- AUDIT LOG VIEW (MASTER ONLY) -->
        <section id="audit" class="view">
            <div class="page-heading">
                <div>
                    <h1>Security Audit Log</h1>
                    <p>Review comprehensive system audit trails, authentication events, and administrative actions.</p>
                </div>
                <a class="btn btn-outline" id="auditExportBtn" href="api/audit.php?export=1">Export Audit CSV</a>
            </div>
            <div class="toolbar">
                <input class="table-search" id="auditUserFilter" placeholder="Filter by username…">
                <input class="table-search" id="auditActionFilter" placeholder="Filter by action (e.g. login_success, delete)…">
                <input type="date" id="auditDateFrom" title="Date From">
                <input type="date" id="auditDateTo" title="Date To">
                <button type="button" class="btn btn-primary" id="auditApplyFilters">Filter</button>
            </div>
            <article class="panel">
                <div class="table-wrap">
                    <table id="auditTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Timestamp</th>
                                <th>Username</th>
                                <th>Action</th>
                                <th>Entity</th>
                                <th>Entity ID</th>
                                <th>IP Address</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td colspan="8" class="empty">Loading audit events…</td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination-bar" id="auditPagination"></div>
            </article>
        </section>
        <?php endif; ?>

        <!-- PROFILE VIEW -->
        <section id="profile" class="view">
            <div class="page-heading">
                <div>
                    <h1>User Profile & Settings</h1>
                    <p>View your institutional account details and update your password.</p>
                </div>
            </div>
            <div class="dashboard-tables">
                <article class="panel">
                    <div class="panel-heading"><h2>Account Information</h2></div>
                    <div style="padding:20px;line-height:1.7;">
                        <p><strong>Username:</strong> <?= e($user['username']) ?></p>
                        <p><strong>Assigned Role:</strong> <span class="status assigned"><?= e($user['role']) ?></span></p>
                        <p><strong>Organization:</strong> <?= e($config['institution_name']) ?> · Jabalpur</p>
                        <p><strong>Account Status:</strong> <span class="dot-status online"><i></i>Active</span></p>
                        <hr style="border:0;border-top:1px solid #e4eaf1;margin:16px 0;">
                        <p><strong>Role Permissions:</strong></p>
                        <ul style="color:#596b82;padding-left:20px;">
                            <li>✓ Access Dashboard metrics and overview</li>
                            <li>✓ Browse IT Inventory and IP Directory</li>
                            <li>✓ Export filtered records to CSV</li>
                            <li><?= can('write') ? '✓' : '✗' ?> Add new equipment and allocate IP records</li>
                            <li><?= can('edit') ? '✓' : '✗' ?> Modify and update existing asset/network details</li>
                            <li><?= can('delete') ? '✓' : '✗' ?> Delete asset and network records</li>
                            <li><?= can('import') ? '✓' : '✗' ?> Batch CSV import</li>
                            <li><?= can('manage_users') ? '✓' : '✗' ?> Manage user accounts & audit logs (Master role)</li>
                        </ul>
                    </div>
                </article>
                <article class="panel">
                    <div class="panel-heading"><h2>Security & Password</h2></div>
                    <form id="profilePasswordForm" style="padding:20px;" method="post" action="api/profile.php">
                        <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
                        <div style="display:grid;gap:14px;">
                            <label>Current Password<input type="password" name="current_password" required autocomplete="current-password"></label>
                            <label>New Password (min 10 characters)<input type="password" name="new_password" required minlength="10" autocomplete="new-password"></label>
                            <label>Confirm New Password<input type="password" name="confirm_password" required minlength="10" autocomplete="new-password"></label>
                            <button class="btn btn-primary" type="submit">Update Password</button>
                            <div id="profileMsg" style="display:none;" class="alert"></div>
                        </div>
                    </form>
                </article>
            </div>
        </section>

        <footer class="official-footer">
            ICMR-National Institute of Research in Tribal Health (NIRTH), Jabalpur · Nagpur Road, P.O. – Garha, Jabalpur – 482 003, Madhya Pradesh, India<br>
            <small>Dept. of Health Research, Ministry of Health and Family Welfare, Govt. of India · Tel: +91-761-2370800</small>
        </footer>
    </main>
</div>

<!-- HIDDEN LOGOUT FORM (CSRF-PROTECTED) -->
<form id="logoutForm" method="post" action="index.php" style="display:none;">
    <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
    <input type="hidden" name="action" value="logout">
</form>

<!-- MODALS (ONLY FOR AUTHORIZED ROLES) -->
<?php if (can('write') || can('edit')): ?>
<!-- INVENTORY MODAL (ADD & EDIT) -->
<div id="inventoryModal" class="modal">
    <div class="modal-card">
        <div class="modal-heading">
            <h2 id="inventoryModalTitle">Add Inventory Record</h2>
            <button type="button" class="modal-close">×</button>
        </div>
        <form method="post" action="api/inventory.php" id="inventoryForm">
            <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
            <input type="hidden" name="action" id="inventoryFormAction" value="create">
            <input type="hidden" name="id" id="inventoryFormId" value="">
            <div class="form-grid">
                <label>Asset ID*<input name="asset_id" id="inv_asset_id" required></label>
                <label>Device Name*<input name="device_name" id="inv_device_name" required></label>
                <label>Category*
                    <select name="category" id="inv_category" required>
                        <option value="Desktop">Desktop</option>
                        <option value="Laptop">Laptop</option>
                        <option value="Printer">Printer</option>
                        <option value="Switch">Switch</option>
                        <option value="Other">Other</option>
                    </select>
                </label>
                <label>Brand<input name="brand" id="inv_brand"></label>
                <label>Model<input name="model" id="inv_model"></label>
                <label>Serial Number<input name="serial_number" id="inv_serial_number"></label>
                <label>Assigned To<input name="assigned_to" id="inv_assigned_to"></label>
                <label>Department<input name="department" id="inv_department"></label>
                <label>Location<input name="location" id="inv_location"></label>
                <label>IP Address<input name="ip_address" id="inv_ip_address" placeholder="e.g. 10.10.5.20"></label>
                <label>Status*
                    <select name="status" id="inv_status" required>
                        <option value="Available">Available</option>
                        <option value="Assigned">Assigned</option>
                        <option value="Under Repair">Under Repair</option>
                        <option value="Retired">Retired</option>
                    </select>
                </label>
                <label>Remarks<textarea name="remarks" id="inv_remarks"></textarea></label>
            </div>
            <div id="inventoryFormMsg" style="display:none;" class="alert"></div>
            <button class="btn btn-primary btn-block" type="submit">Save Record</button>
        </form>
    </div>
</div>

<!-- IP DIRECTORY MODAL (ADD & EDIT) -->
<div id="ipModal" class="modal">
    <div class="modal-card">
        <div class="modal-heading">
            <h2 id="ipModalTitle">Add IP Record</h2>
            <button type="button" class="modal-close">×</button>
        </div>
        <form method="post" action="api/ip.php" id="ipForm">
            <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
            <input type="hidden" name="action" id="ipFormAction" value="create">
            <input type="hidden" name="id" id="ipFormId" value="">
            <div class="form-grid">
                <label>IP Address*<input name="ip_address" id="ip_address_val" required placeholder="10.10.x.x"></label>
                <label>Hostname*<input name="hostname" id="ip_hostname_val" required></label>
                <label>Device Type*
                    <select name="device_type" id="ip_device_type_val" required>
                        <option value="Desktop">Desktop</option>
                        <option value="Laptop">Laptop</option>
                        <option value="Printer">Printer</option>
                        <option value="Switch">Switch</option>
                        <option value="Other">Other</option>
                    </select>
                </label>
                <label>MAC Address<input name="mac_address" id="ip_mac_val" placeholder="AA:BB:CC:DD:EE:FF"></label>
                <label>AD Status*
                    <select name="ad_status" id="ip_ad_val" required>
                        <option value="AD Registered">AD Registered</option>
                        <option value="Non-AD">Non-AD</option>
                    </select>
                </label>
                <label>Department<input name="department" id="ip_dept_val"></label>
                <label>Location<input name="location" id="ip_loc_val"></label>
                <label>Device State*
                    <select name="device_status" id="ip_state_val" required>
                        <option value="Unknown">Unknown</option>
                        <option value="Online">Online</option>
                        <option value="Offline">Offline</option>
                    </select>
                </label>
                <label>Remarks<textarea name="remarks" id="ip_remarks_val"></textarea></label>
            </div>
            <div id="ipFormMsg" style="display:none;" class="alert"></div>
            <button class="btn btn-primary btn-block" type="submit">Save Record</button>
        </form>
    </div>
</div>
<?php endif; ?>

<?php if (can('import')): ?>
<!-- CSV IMPORT MODAL -->
<div id="importModal" class="modal">
    <div class="modal-card">
        <div class="modal-heading">
            <h2 id="importModalTitle">Import CSV</h2>
            <button type="button" class="modal-close">×</button>
        </div>
        <form method="post" action="api/import.php" enctype="multipart/form-data" id="importForm">
            <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
            <input type="hidden" name="type" id="importType" value="ip">
            <div style="margin-bottom:16px;">
                <p class="muted" id="importDescription">Select a valid CSV file to upload.</p>
                <p><a href="api/template.php?type=ip" id="importTemplateLink" class="btn btn-outline" style="font-size:12px;padding:4px 8px;">Download Sample CSV Template</a></p>
            </div>
            <label style="display:block;margin-bottom:14px;">CSV File (max 2MB)*
                <input type="file" name="csv" accept=".csv" required style="display:block;margin-top:6px;">
            </label>
            <label style="display:flex;align-items:center;gap:8px;font-size:13px;margin-bottom:18px;cursor:pointer;">
                <input type="checkbox" name="update_existing" value="1">
                <span>Update existing records if duplicate ID/IP is found</span>
            </label>
            <div id="importFormMsg" style="display:none;" class="alert"></div>
            <button class="btn btn-primary btn-block" type="submit">Validate and Import</button>
        </form>
    </div>
</div>
<?php endif; ?>

<?php if ($is_master): ?>
<!-- CREATE USER MODAL -->
<div id="userCreateModal" class="modal">
    <div class="modal-card">
        <div class="modal-heading">
            <h2>Provision User Account</h2>
            <button type="button" class="modal-close">×</button>
        </div>
        <form id="userCreateForm">
            <input type="hidden" name="action" value="create">
            <div class="form-grid">
                <label>Username*<input name="username" required autocomplete="off"></label>
                <label>Role*
                    <select name="role" required>
                        <option value="User">User</option>
                        <option value="Master">Master</option>
                    </select>
                </label>
                <label style="grid-column:1/-1;">Temporary Password (min 10 characters)*
                    <input type="password" name="password" required minlength="10" autocomplete="new-password">
                </label>
            </div>
            <div id="userCreateMsg" style="display:none;" class="alert"></div>
            <button class="btn btn-primary btn-block" type="submit">Create Account</button>
        </form>
    </div>
</div>

<!-- RESET PASSWORD MODAL -->
<div id="userResetModal" class="modal">
    <div class="modal-card">
        <div class="modal-heading">
            <h2>Reset User Password</h2>
            <button type="button" class="modal-close">×</button>
        </div>
        <form id="userResetForm">
            <input type="hidden" name="action" value="reset_password">
            <input type="hidden" name="id" id="resetUserId" value="">
            <div style="margin-bottom:16px;">
                <p>Resetting password for user: <strong id="resetUsernameDisplay"></strong></p>
                <label style="display:block;margin-top:10px;">New Temporary Password (min 10 chars)*
                    <input type="password" name="password" required minlength="10" autocomplete="new-password" style="width:100%;margin-top:6px;">
                </label>
            </div>
            <div id="userResetMsg" style="display:none;" class="alert"></div>
            <button class="btn btn-primary btn-block" type="submit">Update Password</button>
        </form>
    </div>
</div>
<?php endif; ?>

<script src="assets/js/app.js"></script>
</body>
</html>
