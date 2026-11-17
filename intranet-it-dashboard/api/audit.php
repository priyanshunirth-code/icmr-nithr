<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/csv.php';
require_login();

if (!can('manage_users')) {
    json_response(['error' => 'Permission denied'], 403);
}

$userFilter = trim((string)($_GET['user'] ?? ''));
$actionFilter = trim((string)($_GET['action'] ?? ''));
$dateFrom = trim((string)($_GET['date_from'] ?? ''));
$dateTo = trim((string)($_GET['date_to'] ?? ''));
$isExport = isset($_GET['export']) && $_GET['export'] === '1';

$conditions = [];
$params = [];

if ($userFilter !== '') {
    $conditions[] = 'username LIKE ?';
    $params[] = '%' . $userFilter . '%';
}
if ($actionFilter !== '') {
    $conditions[] = 'action = ?';
    $params[] = $actionFilter;
}
if ($dateFrom !== '') {
    $conditions[] = 'created_at >= ?';
    $params[] = $dateFrom . ' 00:00:00';
}
if ($dateTo !== '') {
    $conditions[] = 'created_at <= ?';
    $params[] = $dateTo . ' 23:59:59';
}

$where = $conditions ? ('WHERE ' . implode(' AND ', $conditions)) : '';

if ($isExport) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="audit_log_' . date('Ymd_His') . '.csv"');
    header('Cache-Control: no-store, no-cache, must-revalidate');

    $out = fopen('php://output', 'w');
    // Output UTF-8 BOM
    fwrite($out, "\xEF\xBB\xBF");
    fputcsv($out, ['ID', 'User ID', 'Username', 'Action', 'Entity', 'Entity ID', 'Details', 'IP Address', 'Timestamp']);

    $stmt = $pdo->prepare("SELECT id, user_id, username, action, entity, entity_id, details, ip, created_at FROM audit_log {$where} ORDER BY id DESC LIMIT 10000");
    $stmt->execute($params);
    while ($row = $stmt->fetch()) {
        fputcsv($out, array_map('csv_safe', [
            (string)$row['id'],
            (string)($row['user_id'] ?? ''),
            (string)$row['username'],
            (string)$row['action'],
            (string)$row['entity'],
            (string)($row['entity_id'] ?? ''),
            (string)($row['details'] ?? ''),
            (string)$row['ip'],
            (string)$row['created_at'],
        ]));
    }
    fclose($out);
    exit;
}

$countStmt = $pdo->prepare("SELECT COUNT(*) FROM audit_log {$where}");
$countStmt->execute($params);
$total = (int)$countStmt->fetchColumn();

$page = max(1, (int)($_GET['page'] ?? 1));
$limit = min(200, max(10, (int)($_GET['limit'] ?? 50)));
$offset = ($page - 1) * $limit;

$stmt = $pdo->prepare("SELECT id, user_id, username, action, entity, entity_id, details, ip, created_at FROM audit_log {$where} ORDER BY id DESC LIMIT {$limit} OFFSET {$offset}");
$stmt->execute($params);
$rows = $stmt->fetchAll();

json_response([
    'total' => $total,
    'page' => $page,
    'limit' => $limit,
    'rows' => $rows,
]);
