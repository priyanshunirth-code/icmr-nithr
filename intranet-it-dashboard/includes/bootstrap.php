<?php
declare(strict_types=1);

// Resolve private config path outside web root or fall back to project folder
$config_file = getenv('IT_PORTAL_CONFIG') ?: '/var/www/it-portal-private/config.php';
if (!file_exists($config_file)) {
    $config_file = __DIR__ . '/../config/config.php';
}
$config = require $config_file;
date_default_timezone_set($config['timezone'] ?? 'Asia/Kolkata');

// Session configuration and lifetime controls
if (session_status() === PHP_SESSION_NONE) {
    session_name('IT_PORTAL_SESS');
    session_start([
        'use_strict_mode' => 1,
        'cookie_httponly' => true,
        'cookie_samesite' => 'Lax',
        'cookie_secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
    ]);
}

// Session expiration: 30-min idle timeout, 8-hour absolute maximum
if (isset($_SESSION['user'])) {
    $now = time();
    $idle_timeout = 1800;
    $max_lifetime = 28800;

    $idle_expired = isset($_SESSION['last_activity']) && ($now - $_SESSION['last_activity'] > $idle_timeout);
    $absolute_expired = isset($_SESSION['session_start']) && ($now - $_SESSION['session_start'] > $max_lifetime);

    if ($idle_expired || $absolute_expired) {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $p = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
        }
        session_destroy();
    } else {
        $_SESSION['last_activity'] = $now;
    }
}

$local_demo = ($config['demo_mode'] ?? false) === true
    && ($config['app_env'] ?? 'production') !== 'production'
    && in_array($_SERVER['REMOTE_ADDR'] ?? '', ['127.0.0.1', '::1'], true);

function init_sqlite_tables(PDO $db): void {
    $db->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT NOT NULL UNIQUE,
            password_hash TEXT NOT NULL,
            role TEXT NOT NULL DEFAULT 'User',
            is_active INTEGER NOT NULL DEFAULT 1,
            last_login_at DATETIME DEFAULT NULL,
            must_change_password INTEGER NOT NULL DEFAULT 0,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
        CREATE TABLE IF NOT EXISTS login_attempts (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT NOT NULL,
            ip TEXT NOT NULL,
            attempted_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            success INTEGER NOT NULL DEFAULT 0
        );
        CREATE TABLE IF NOT EXISTS audit_log (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER DEFAULT NULL,
            username TEXT NOT NULL,
            action TEXT NOT NULL,
            entity TEXT NOT NULL,
            entity_id TEXT DEFAULT NULL,
            details TEXT DEFAULT NULL,
            ip TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
        CREATE TABLE IF NOT EXISTS it_inventory (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            asset_id TEXT NOT NULL UNIQUE,
            device_name TEXT NOT NULL,
            category TEXT NOT NULL,
            brand TEXT,
            model TEXT,
            serial_number TEXT,
            assigned_to TEXT,
            department TEXT,
            location TEXT,
            ip_address TEXT,
            status TEXT NOT NULL DEFAULT 'Available',
            remarks TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
        CREATE TABLE IF NOT EXISTS ip_directory (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            ip_address TEXT NOT NULL UNIQUE,
            hostname TEXT NOT NULL,
            mac_address TEXT,
            device_type TEXT NOT NULL,
            ad_status TEXT NOT NULL DEFAULT 'Non-AD',
            department TEXT,
            location TEXT,
            device_status TEXT NOT NULL DEFAULT 'Unknown',
            remarks TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
    ");

    $rand_pass = bin2hex(random_bytes(8));
    if (php_sapi_name() === 'cli') {
        fwrite(STDERR, "[Demo Mode] Generated initial Master account 'master' with password: {$rand_pass}\n");
    }
    $master_hash = password_hash($rand_pass, PASSWORD_DEFAULT);
    $db->prepare("INSERT OR IGNORE INTO users (username, password_hash, role) VALUES ('master', ?, 'Master')")->execute([$master_hash]);
}

try {
    $pdo = new PDO($config['db']['dsn'], $config['db']['username'], $config['db']['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    $pdo->exec("SET SESSION sql_mode='STRICT_TRANS_TABLES,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION'");
} catch (PDOException $exception) {
    if (!$local_demo) {
        error_log('Database connection failure: ' . $exception->getMessage());
        http_response_code(503);
        echo '<!doctype html><html lang="en"><head><meta charset="utf-8"><title>503 Service Unavailable</title></head>';
        echo '<body style="font-family:sans-serif;text-align:center;padding:50px;">';
        echo '<h2>Service Temporarily Unavailable</h2><p>Please contact internal IT support if this persists.</p>';
        echo '</body></html>';
        exit;
    }

    $data_dir = getenv('IT_PORTAL_DATA') ?: '/var/www/it-portal-private/data';
    if (!is_dir($data_dir)) {
        $data_dir = __DIR__ . '/../data';
        if (!is_dir($data_dir)) {
            mkdir($data_dir, 0755, true);
        }
    }
    $sqlite_file = $data_dir . '/dashboard.sqlite';
    $first_run = !file_exists($sqlite_file);
    $pdo = new PDO('sqlite:' . $sqlite_file, null, null, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    if ($first_run) {
        init_sqlite_tables($pdo);
    }
}

require_once __DIR__ . '/audit.php';
require_once __DIR__ . '/validate.php';

function e(?string $value): string {
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

function csrf_token(): string {
    return $_SESSION['csrf'] ??= bin2hex(random_bytes(32));
}

function is_api_request(): bool {
    $uri = $_SERVER['REQUEST_URI'] ?? '';
    $script = $_SERVER['SCRIPT_NAME'] ?? '';
    $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
    return str_contains($uri, '/api/') || str_contains($script, '/api/') || str_contains($accept, 'application/json');
}

function require_csrf(): void {
    $token = (string)($_POST['csrf'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '');
    if (!hash_equals($_SESSION['csrf'] ?? '', $token)) {
        if (is_api_request()) {
            json_response(['error' => 'Invalid or expired CSRF token'], 419);
        }
        http_response_code(419);
        echo '<!doctype html><html lang="en"><head><meta charset="utf-8"><title>Session Expired</title>';
        echo '<link rel="stylesheet" href="assets/css/app.css"></head>';
        echo '<body style="display:flex;align-items:center;justify-content:center;min-height:100vh;font-family:sans-serif;background:#f5f7fa;margin:0;">';
        echo '<div style="background:#fff;padding:32px;border-radius:8px;box-shadow:0 2px 12px rgba(0,0,0,0.08);text-align:center;max-width:400px;">';
        echo '<h3 style="margin-top:0;color:#123c65;">Session Expired</h3>';
        echo '<p style="color:#556882;font-size:14px;">Your session or security token has expired. Please return to the login page.</p>';
        echo '<a href="index.php" style="display:inline-block;margin-top:12px;background:#125599;color:#fff;padding:8px 16px;border-radius:6px;text-decoration:none;font-weight:600;font-size:13px;">Return to Portal</a>';
        echo '</div></body></html>';
        exit;
    }
}

function current_user(): ?array {
    return $_SESSION['user'] ?? null;
}

function require_login(): void {
    if (!current_user()) {
        if (is_api_request()) {
            json_response(['error' => 'Session expired'], 401);
        }
        header('Location: index.php');
        exit;
    }
}

function can(string $permission): bool {
    static $map = [
        'Master' => ['read', 'write', 'edit', 'delete', 'import', 'export', 'manage_users'],
        'User'   => ['read', 'export'],
    ];
    return in_array($permission, $map[current_user()['role'] ?? ''] ?? [], true);
}

function json_response(array $payload, int $status = 200): never {
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($payload);
    exit;
}
