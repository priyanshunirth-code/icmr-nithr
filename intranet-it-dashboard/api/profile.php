<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';
require_login();
require_csrf();

$user = current_user();
if (($user['id'] ?? 0) === 0) {
    json_response(['error' => 'Password change is disabled in demo preview mode.'], 400);
}

$current_pw = (string)($_POST['current_password'] ?? '');
$new_pw = (string)($_POST['new_password'] ?? '');
$confirm_pw = (string)($_POST['confirm_password'] ?? '');

if (strlen($new_pw) < 10) {
    json_response(['error' => 'New password must be at least 10 characters long.'], 422);
}
if ($new_pw !== $confirm_pw) {
    json_response(['error' => 'New passwords do not match.'], 422);
}
if ($new_pw === $current_pw) {
    json_response(['error' => 'New password must be different from current password.'], 422);
}

$stmt = $pdo->prepare('SELECT password_hash FROM users WHERE id = ?');
$stmt->execute([$user['id']]);
$hash = $stmt->fetchColumn();

if (!$hash || !password_verify($current_pw, (string)$hash)) {
    log_audit($pdo, 'password_change_failed', 'users', (string)$user['id'], 'Incorrect current password provided');
    json_response(['error' => 'Current password is incorrect.'], 422);
}

$new_hash = password_hash($new_pw, PASSWORD_DEFAULT);
$update = $pdo->prepare('UPDATE users SET password_hash = ?, must_change_password = 0 WHERE id = ?');
$update->execute([$new_hash, $user['id']]);

if (isset($_SESSION['user'])) {
    $_SESSION['user']['must_change_password'] = 0;
}

log_audit($pdo, 'password_change', 'users', (string)$user['id'], 'User updated their password');

json_response(['success' => true, 'message' => 'Password updated successfully.']);
