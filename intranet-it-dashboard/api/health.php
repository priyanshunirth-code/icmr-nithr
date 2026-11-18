<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';
require_login();

try {
    $pdo->query('SELECT 1');
    json_response([
        'status' => 'ok',
        'database' => 'connected',
        'message' => 'Database Connected',
        'time' => date('d M Y, H:i'),
    ]);
} catch (Throwable $e) {
    json_response([
        'status' => 'fail',
        'database' => 'disconnected',
        'message' => 'Database Disconnected',
        'time' => date('d M Y, H:i'),
    ], 503);
}
