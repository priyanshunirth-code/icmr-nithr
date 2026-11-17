<?php
declare(strict_types=1);

if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    exit("This utility may only be executed from the command line.\n");
}

require_once __DIR__ . '/../includes/bootstrap.php';

echo "=== ICMR-NITHR IT Portal - Master Account Provisioning ===\n";

echo "Enter Master Username: ";
$username = trim((string)fgets(STDIN));
if ($username === '' || !preg_match('/^[a-zA-Z0-9_\-\.]{3,50}$/', $username)) {
    fwrite(STDERR, "Error: Username must be 3-50 alphanumeric characters (._- allowed).\n");
    exit(1);
}

// Check if user already exists
$stmt = $pdo->prepare('SELECT id FROM users WHERE username = ?');
$stmt->execute([$username]);
if ($stmt->fetch()) {
    fwrite(STDERR, "Error: User '{$username}' already exists.\n");
    exit(1);
}

// Prompt for password securely
echo "Enter Password (min 10 characters): ";
if (stripos(PHP_OS, 'WIN') === 0) {
    $password = trim((string)fgets(STDIN));
} else {
    $password = trim((string)shell_exec('/usr/bin/env bash -c "read -s -p \"\" pw && echo \"\$pw\""'));
    echo "\n";
}

if (strlen($password) < 10) {
    fwrite(STDERR, "Error: Password must be at least 10 characters long.\n");
    exit(1);
}

echo "Confirm Password: ";
if (stripos(PHP_OS, 'WIN') === 0) {
    $confirm = trim((string)fgets(STDIN));
} else {
    $confirm = trim((string)shell_exec('/usr/bin/env bash -c "read -s -p \"\" pw && echo \"\$pw\""'));
    echo "\n";
}

if ($password !== $confirm) {
    fwrite(STDERR, "Error: Passwords do not match.\n");
    exit(1);
}

$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $pdo->prepare('
    INSERT INTO users (username, password_hash, role, is_active, must_change_password)
    VALUES (?, ?, "Master", 1, 0)
');
$stmt->execute([$username, $hash]);
$newId = (string)$pdo->lastInsertId();

log_audit($pdo, 'user_create', 'users', $newId, "Initial Master '{$username}' created via CLI tool");

echo "Success: Master account '{$username}' successfully created.\n";
