<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/bootstrap.php';

// Brute-force protection helper
function is_locked_out(PDO $pdo, string $username, string $ip): bool {
    if ($pdo->getAttribute(PDO::ATTR_DRIVER_NAME) === 'mysql') {
        $stmt = $pdo->prepare('
            SELECT COUNT(*) FROM login_attempts
            WHERE (username = ? OR ip = ?) AND success = 0 AND attempted_at >= DATE_SUB(NOW(), INTERVAL 15 MINUTE)
        ');
        $stmt->execute([$username, $ip]);
    } else {
        $since = date('Y-m-d H:i:s', time() - 900);
        $stmt = $pdo->prepare('
            SELECT COUNT(*) FROM login_attempts
            WHERE (username = ? OR ip = ?) AND success = 0 AND attempted_at >= ?
        ');
        $stmt->execute([$username, $ip, $since]);
    }
    return (int)$stmt->fetchColumn() >= 5;
}

// Authentication handling
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'login') {
    $token = (string)($_POST['csrf'] ?? '');
    if (!hash_equals($_SESSION['csrf'] ?? '', $token)) {
        // Session was wiped (e.g. server restart). Regenerate token and
        // redirect back to login so the fresh form loads with the new token.
        unset($_SESSION['csrf']);
        csrf_token(); // seed a fresh token
        header('Location: index.php');
        exit;
    } else {
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
            $pdo->prepare('DELETE FROM login_attempts WHERE (username = ? OR ip = ?) AND success = 0')
                ->execute([$username, $ip]);
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
}

// POST logout with CSRF protection
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'logout') {
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
$stats = [
    'assets' => 0,
    'assets_assigned' => 0,
    'assets_available' => 0,
    'ips' => 0,
    'ips_online' => 0,
    'ips_other' => 0,
    'ad_registered' => 0,
    'non_ad' => 0,
    'ad_compliance_pct' => 0,
];
$recent_assets = [];
$recent_ips = [];

if ($pdo) {
    $stats['assets'] = (int)$pdo->query('SELECT COUNT(*) FROM it_inventory')->fetchColumn();
    $stats['assets_assigned'] = (int)$pdo->query("SELECT COUNT(*) FROM it_inventory WHERE status = 'Assigned'")->fetchColumn();
    $stats['assets_available'] = (int)$pdo->query("SELECT COUNT(*) FROM it_inventory WHERE status = 'Available'")->fetchColumn();

    $stats['ips'] = (int)$pdo->query('SELECT COUNT(*) FROM ip_directory')->fetchColumn();
    $stats['ips_online'] = (int)$pdo->query("SELECT COUNT(*) FROM ip_directory WHERE device_status = 'Online'")->fetchColumn();
    $stats['ips_other'] = (int)$pdo->query("SELECT COUNT(*) FROM ip_directory WHERE device_status != 'Online' OR device_status IS NULL")->fetchColumn();

    $stats['ad_registered'] = (int)$pdo->query("SELECT COUNT(*) FROM ip_directory WHERE ad_status = 'AD Registered'")->fetchColumn();
    $stats['non_ad'] = (int)$pdo->query("SELECT COUNT(*) FROM ip_directory WHERE ad_status = 'Non-AD'")->fetchColumn();
    $ad_total = $stats['ad_registered'] + $stats['non_ad'];
    $stats['ad_compliance_pct'] = $ad_total > 0 ? (int)round(($stats['ad_registered'] / $ad_total) * 100) : 0;

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
    </aside>
    <div id="sidebarBackdrop" class="sidebar-backdrop"></div>

    <main class="main">
        <header class="topbar">
            <button type="button" id="sidebarToggle" class="hamburger-btn" aria-label="Toggle menu">☰</button>
            <div class="mobile-brand">ICMR-NITHR</div>
            <div class="topbar-branding">
                <span class="topbar-title">ICMR–NITHR, Jabalpur</span>
                <span class="topbar-subtitle">Internal IT Administration</span>
            </div>
            <div class="global-search">
                <span>⌕</span>
                <input id="globalSearch" placeholder="Search across all records…">
            </div>
            <div class="system-status" id="systemStatus">
                <i id="statusDot"></i>
                <div>
                    <strong id="statusTitle">Connecting…</strong>
                    <small id="statusSubtitle">Checking database…</small>
                </div>
            </div>
            <div class="topbar-user-actions">
                <div class="profile-dropdown" id="profileDropdown">
                    <button type="button" class="profile-trigger" id="profileTrigger" aria-expanded="false" aria-haspopup="true">
                        <span class="topbar-avatar"><?= e(strtoupper(substr($user['username'], 0, 1))) ?></span>
                        <span class="topbar-username"><?= e($user['username']) ?></span>
                        <span class="user-role-badge status <?= $user['role'] === 'Master' ? 'assigned' : 'available' ?>"><?= e($user['role']) ?></span>
                        <span class="profile-chevron" aria-hidden="true">▾</span>
                    </button>
                    <div class="profile-menu" id="profileMenu" role="menu">
                        <div class="profile-menu-header">
                            <span class="profile-menu-username"><?= e($user['username']) ?></span>
                            <span class="user-role-badge status <?= $user['role'] === 'Master' ? 'assigned' : 'available' ?>"><?= e($user['role']) ?></span>
                        </div>
                        <div class="profile-menu-divider"></div>
                        <button type="button" class="profile-menu-item" data-modal="passwordModal" role="menuitem">
                            <span class="menu-icon">🔑</span>
                            <span>Change Password</span>
                        </button>
                        <div class="profile-menu-divider"></div>
                        <button type="button" class="profile-menu-item profile-menu-logout" data-modal="logoutModal" role="menuitem">
                            <span class="menu-icon">⎋</span>
                            <span>Logout</span>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <?php if (!empty($user['must_change_password'])): ?>
        <div class="alert alert-warning security-reminder" style="margin:20px 24px 0;">
            <strong>Security Reminder:</strong> Your account requires a password change. Please <button type="button" class="btn-inline-link" data-modal="passwordModal">update your password now</button>.
        </div>
        <?php endif; ?>

        <!-- DASHBOARD VIEW -->
        <section id="dashboard" class="view active">
            <div class="dashboard-header">
                <h1>Welcome, <?= e($user['username']) ?></h1>
                <p>Overview of IT assets and IP records at <?= e($config['institution_name']) ?>.</p>
            </div>

            <div class="metrics-grid">
                <article class="metric-card">
                    <span class="metric-label">Total IT Assets</span>
                    <strong class="metric-val"><?= $stats['assets'] ?></strong>
                    <small class="metric-subtext"><?= $stats['assets_assigned'] ?> Assigned · <?= $stats['assets_available'] ?> Available</small>
                </article>
                <article class="metric-card">
                    <span class="metric-label">Total IP Records</span>
                    <strong class="metric-val"><?= $stats['ips'] ?></strong>
                    <small class="metric-subtext"><?= $stats['ips_online'] ?> Online · <?= $stats['ips_other'] ?> Unknown/Offline</small>
                </article>
                <article class="metric-card">
                    <span class="metric-label">AD Compliance</span>
                    <strong class="metric-val"><?= $stats['ad_compliance_pct'] ?>%</strong>
                    <small class="metric-subtext"><?= $stats['ad_registered'] ?> AD Registered · <?= $stats['non_ad'] ?> Non-AD</small>
                </article>
                <article class="metric-card metric-card-quickactions">
                    <span class="metric-label">Quick Actions</span>
                    <div class="quick-actions-btns">
                        <?php if (can('write')): ?>
                        <button type="button" class="btn btn-primary btn-sm" data-modal="inventoryModal">+ Add Asset</button>
                        <button type="button" class="btn btn-outline btn-sm" data-modal="ipModal">+ Add IP</button>
                        <?php else: ?>
                        <button type="button" class="btn btn-primary btn-sm" data-view-target="inventory">IT Inventory</button>
                        <button type="button" class="btn btn-outline btn-sm" data-view-target="directory">IP Directory</button>
                        <?php endif; ?>
                    </div>
                    <small class="metric-subtext">Instant management shortcuts</small>
                </article>
            </div>
            <div class="dashboard-tables">
                <article class="panel">
                    <div class="panel-heading">
                        <h2>Recent IT Assets</h2>
                        <div style="display:flex;gap:8px;align-items:center;">
                            <select id="dashAssetCategoryFilter" style="padding:4px 8px;font-size:12px;border:1px solid #b8c8d8;border-radius:4px;outline:none;">
                                <option value="">All categories</option>
                                <option value="Desktop">Desktop</option>
                                <option value="Laptop">Laptop</option>
                                <option value="Printer">Printer</option>
                                <option value="Switch">Switch</option>
                                <option value="Other">Other</option>
                            </select>
                            <button type="button" class="btn btn-outline" data-view-target="inventory">View All</button>
                        </div>
                    </div>
                    <div class="table-wrap">
                        <table id="recentAssetsTable">
                            <thead>
                                <tr>
                                    <th data-sort="asset_id" class="sortable">Asset ID</th>
                                    <th data-sort="device_name" class="sortable">Device Name</th>
                                    <th data-sort="category" class="sortable">Category</th>
                                    <th data-sort="assigned_to" class="sortable">Assigned To</th>
                                    <th data-sort="status" class="sortable">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_assets as $row): ?>
                                <tr>
                                    <td class="strong cell-mono"><?= e($row['asset_id']) ?></td>
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
                        <div style="display:flex;gap:8px;align-items:center;">
                            <select id="dashIpStatusFilter" style="padding:4px 8px;font-size:12px;border:1px solid #b8c8d8;border-radius:4px;outline:none;">
                                <option value="">All states</option>
                                <option value="Online">Online</option>
                                <option value="Offline">Offline</option>
                                <option value="Unknown">Unknown</option>
                            </select>
                            <button type="button" class="btn btn-outline" data-view-target="directory">View All</button>
                        </div>
                    </div>
                    <div class="table-wrap">
                        <table id="recentIpsTable">
                            <thead>
                                <tr>
                                    <th data-sort="ip_address" class="sortable">IP Address</th>
                                    <th data-sort="hostname" class="sortable">Hostname</th>
                                    <th data-sort="device_type" class="sortable">Device Type</th>
                                    <th data-sort="ad_status" class="sortable">AD Status</th>
                                    <th data-sort="device_status" class="sortable">State</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_ips as $row): ?>
                                <tr>
                                    <td class="strong cell-mono"><?= e($row['ip_address']) ?></td>
                                    <td><?= e($row['hostname']) ?></td>
                                    <td><?= e($row['device_type']) ?></td>
                                    <td><span class="status <?= $row['ad_status'] === 'AD Registered' ? 'ad-registered' : 'non-ad' ?>"><?= e($row['ad_status']) ?></span></td>
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
                <input type="search" id="inventorySearch" class="table-search" placeholder="Search inventory by ID, name, user, IP…">
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
                                <th data-sort="asset_id" class="sortable">Asset ID</th>
                                <th data-sort="device_name" class="sortable">Device Name</th>
                                <th data-sort="category" class="sortable">Category</th>
                                <th data-sort="brand" class="sortable">Brand / Model</th>
                                <th data-sort="assigned_to" class="sortable">Assigned To</th>
                                <th data-sort="department" class="sortable">Department</th>
                                <th data-sort="location" class="sortable">Location</th>
                                <th data-sort="ip_address" class="sortable">IP Address</th>
                                <th data-sort="status" class="sortable">Status</th>
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
                <input type="search" id="ipSearch" class="table-search" placeholder="Search IP directory by IP, host, MAC, dept…">
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
                <select id="ipDeviceStatusFilter">
                    <option value="">All states</option>
                    <option value="Online">Online</option>
                    <option value="Offline">Offline</option>
                    <option value="Unknown">Unknown</option>
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
                                <th data-sort="ip_address" class="sortable">IP Address</th>
                                <th data-sort="hostname" class="sortable">Hostname</th>
                                <th data-sort="device_type" class="sortable">Device Type</th>
                                <th data-sort="ad_status" class="sortable">AD Status</th>
                                <th data-sort="mac_address" class="sortable">MAC Address</th>
                                <th data-sort="department" class="sortable">Department</th>
                                <th data-sort="location" class="sortable">Location</th>
                                <th data-sort="device_status" class="sortable">Status</th>
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
            ICMR–National Institute for Tribal Health Research (NITHR), Jabalpur · Nagpur Road, P.O. – Garha, Jabalpur – 482 003, Madhya Pradesh, India<br>
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

<!-- CHANGE PASSWORD MODAL (ALL ROLES) -->
<div id="passwordModal" class="modal">
    <div class="modal-card">
        <div class="modal-heading">
            <h2>Change Password</h2>
            <button type="button" class="modal-close">×</button>
        </div>
        <form id="passwordModalForm" method="post" action="api/profile.php">
            <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
            <div style="display:grid;gap:14px;">
                <label>Current Password*<input type="password" name="current_password" required autocomplete="current-password"></label>
                <label>New Password (min 10 characters)*<input type="password" name="new_password" required minlength="10" autocomplete="new-password"></label>
                <label>Confirm New Password*<input type="password" name="confirm_password" required minlength="10" autocomplete="new-password"></label>
                <div id="passwordModalMsg" style="display:none;" class="alert"></div>
                <button class="btn btn-primary btn-block" type="submit">Update Password</button>
            </div>
        </form>
    </div>
</div>

<!-- LOGOUT CONFIRMATION MODAL -->
<div id="logoutModal" class="modal">
    <div class="modal-card" style="max-width:420px;">
        <div class="modal-heading">
            <h2>Confirm Logout</h2>
            <button type="button" class="modal-close">×</button>
        </div>
        <div style="padding:16px 0 22px;color:#50657f;font-size:14px;line-height:1.5;">
            Are you sure you want to end your session and log out of the IT Administration Dashboard?
        </div>
        <div style="display:flex;justify-content:flex-end;gap:10px;">
            <button type="button" class="btn btn-outline modal-close">Cancel</button>
            <form method="post" action="index.php" style="margin:0;">
                <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
                <input type="hidden" name="action" value="logout">
                <button type="submit" class="btn btn-primary" style="background:#d34d4d;border-color:#d34d4d;">Sign Out</button>
            </form>
        </div>
    </div>
</div>

<script src="assets/js/app.js"></script>
</body>
</html>
