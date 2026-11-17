<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';
require_login();

if (!can('manage_users')) {
    json_response(['error' => 'Permission denied. Master role required.'], 403);
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $stmt = $pdo->query('
        SELECT id, username, role, is_active, last_login_at, must_change_password, created_at
        FROM users
        ORDER BY id ASC
    ');
    json_response(['users' => $stmt->fetchAll()]);
}

require_csrf();
$action = (string)($_POST['action'] ?? '');
$current_id = (int)(current_user()['id'] ?? 0);

if ($action === 'create') {
    $username = trim((string)($_POST['username'] ?? ''));
    $role = trim((string)($_POST['role'] ?? 'User'));
    $password = (string)($_POST['password'] ?? '');

    if (!preg_match('/^[a-zA-Z0-9_\-\.]{3,50}$/', $username)) {
        json_response(['error' => 'Username must be 3-50 alphanumeric characters (._- allowed).'], 422);
    }
    if (!in_array($role, ['Master', 'User'], true)) {
        json_response(['error' => 'Invalid role specified.'], 422);
    }
    if (strlen($password) < 10) {
        json_response(['error' => 'Temporary password must be at least 10 characters long.'], 422);
    }

    $stmt = $pdo->prepare('SELECT id FROM users WHERE username = ?');
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        json_response(['error' => "Username '{$username}' already exists."], 422);
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $ins = $pdo->prepare('
        INSERT INTO users (username, password_hash, role, is_active, must_change_password)
        VALUES (?, ?, ?, 1, 1)
    ');
    $ins->execute([$username, $hash, $role]);
    $newId = (string)$pdo->lastInsertId();

    log_audit($pdo, 'user_create', 'users', $newId, "Created {$role} user '{$username}'");
    json_response(['success' => true]);
}

if ($action === 'toggle_status') {
    $id = (int)($_POST['id'] ?? 0);
    if ($id <= 0) {
        json_response(['error' => 'Invalid user ID'], 422);
    }
    if ($id === $current_id) {
        json_response(['error' => 'You cannot disable your own account.'], 422);
    }

    $stmt = $pdo->prepare('SELECT id, username, role, is_active FROM users WHERE id = ?');
    $stmt->execute([$id]);
    $target = $stmt->fetch();
    if (!$target) {
        json_response(['error' => 'User not found'], 404);
    }

    $new_status = ((int)$target['is_active'] === 1) ? 0 : 1;
    if ($target['role'] === 'Master' && $new_status === 0) {
        $master_count = (int)$pdo->query("SELECT COUNT(*) FROM users WHERE role = 'Master' AND is_active = 1")->fetchColumn();
        if ($master_count <= 1) {
            json_response(['error' => 'Cannot disable the last active Master account.'], 422);
        }
    }

    $upd = $pdo->prepare('UPDATE users SET is_active = ? WHERE id = ?');
    $upd->execute([$new_status, $id]);

    $act = $new_status === 1 ? 'user_enable' : 'user_disable';
    log_audit($pdo, $act, 'users', (string)$id, "Account '{$target['username']}' status set to {$new_status}");
    json_response(['success' => true, 'is_active' => $new_status]);
}

if ($action === 'change_role') {
    $id = (int)($_POST['id'] ?? 0);
    $new_role = trim((string)($_POST['role'] ?? ''));
    if ($id <= 0 || !in_array($new_role, ['Master', 'User'], true)) {
        json_response(['error' => 'Invalid user ID or role'], 422);
    }
    if ($id === $current_id) {
        json_response(['error' => 'You cannot change your own role.'], 422);
    }

    $stmt = $pdo->prepare('SELECT id, username, role, is_active FROM users WHERE id = ?');
    $stmt->execute([$id]);
    $target = $stmt->fetch();
    if (!$target) {
        json_response(['error' => 'User not found'], 404);
    }

    if ($target['role'] === 'Master' && $new_role !== 'Master' && (int)$target['is_active'] === 1) {
        $master_count = (int)$pdo->query("SELECT COUNT(*) FROM users WHERE role = 'Master' AND is_active = 1")->fetchColumn();
        if ($master_count <= 1) {
            json_response(['error' => 'Cannot demote the last active Master account.'], 422);
        }
    }

    $upd = $pdo->prepare('UPDATE users SET role = ? WHERE id = ?');
    $upd->execute([$new_role, $id]);

    log_audit($pdo, 'user_role_change', 'users', (string)$id, "Changed role of '{$target['username']}' to {$new_role}");
    json_response(['success' => true]);
}

if ($action === 'reset_password') {
    $id = (int)($_POST['id'] ?? 0);
    $password = (string)($_POST['password'] ?? '');
    if ($id <= 0) {
        json_response(['error' => 'Invalid user ID'], 422);
    }
    if (strlen($password) < 10) {
        json_response(['error' => 'New temporary password must be at least 10 characters long.'], 422);
    }

    $stmt = $pdo->prepare('SELECT id, username FROM users WHERE id = ?');
    $stmt->execute([$id]);
    $target = $stmt->fetch();
    if (!$target) {
        json_response(['error' => 'User not found'], 404);
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $upd = $pdo->prepare('UPDATE users SET password_hash = ?, must_change_password = 1 WHERE id = ?');
    $upd->execute([$hash, $id]);

    log_audit($pdo, 'admin_password_reset', 'users', (string)$id, "Reset password for '{$target['username']}' (must change on next login)");
    json_response(['success' => true]);
}

json_response(['error' => 'Invalid action'], 400);
