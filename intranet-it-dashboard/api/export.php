<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/csv.php';
require_login();

if (!can('export')) {
    json_response(['error' => 'Permission denied'], 403);
}

$rawType = trim((string)($_GET['type'] ?? 'ip'));
$type = ($rawType === 'directory' || $rawType === 'ip') ? 'ip' : 'inventory';
$table = ($type === 'inventory') ? 'it_inventory' : 'ip_directory';

$search = trim((string)($_GET['search'] ?? ''));
$conditions = [];
$params = [];

if ($type === 'inventory') {
    $headers = ['asset_id', 'device_name', 'category', 'brand', 'model', 'serial_number', 'assigned_to', 'department', 'location', 'ip_address', 'status', 'remarks'];
    $category = trim((string)($_GET['category'] ?? ''));
    $status = trim((string)($_GET['status'] ?? ''));

    if ($category !== '' && $category !== 'All categories') {
        $conditions[] = 'category = ?';
        $params[] = $category;
    }
    if ($status !== '' && $status !== 'All statuses') {
        $conditions[] = 'status = ?';
        $params[] = $status;
    }
    if ($search !== '') {
        $conditions[] = '(asset_id LIKE ? OR device_name LIKE ? OR serial_number LIKE ? OR assigned_to LIKE ? OR department LIKE ? OR location LIKE ? OR ip_address LIKE ?)';
        $like = '%' . $search . '%';
        for ($i = 0; $i < 7; $i++) $params[] = $like;
    }
} else {
    $headers = ['ip_address', 'hostname', 'mac_address', 'device_type', 'ad_status', 'department', 'location', 'device_status', 'remarks'];
    $deviceType = trim((string)($_GET['device_type'] ?? ''));
    $adStatus = trim((string)($_GET['ad_status'] ?? ''));

    if ($deviceType !== '' && $deviceType !== 'All device types') {
        $conditions[] = 'device_type = ?';
        $params[] = $deviceType;
    }
    if ($adStatus !== '' && $adStatus !== 'All AD statuses') {
        $conditions[] = 'ad_status = ?';
        $params[] = $adStatus;
    }
    if ($search !== '') {
        $conditions[] = '(ip_address LIKE ? OR hostname LIKE ? OR mac_address LIKE ? OR department LIKE ? OR location LIKE ?)';
        $like = '%' . $search . '%';
        for ($i = 0; $i < 5; $i++) $params[] = $like;
    }
}

$where = $conditions ? ('WHERE ' . implode(' AND ', $conditions)) : '';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $table . '_' . date('Ymd_His') . '.csv"');
header('Cache-Control: no-store, no-cache, must-revalidate');

$out = fopen('php://output', 'w');
fwrite($out, "\xEF\xBB\xBF");
fputcsv($out, $headers);

$sql = 'SELECT ' . implode(',', $headers) . ' FROM ' . $table . ' ' . $where . ' ORDER BY id DESC LIMIT 50000';
$stmt = $pdo->prepare($sql);
$stmt->execute($params);

$rowCount = 0;
while ($row = $stmt->fetch()) {
    $rowCount++;
    $cleanRow = array_map(fn($h) => csv_safe((string)($row[$h] ?? '')), $headers);
    fputcsv($out, $cleanRow);
}
fclose($out);

log_audit($pdo, 'export', $table, null, "Exported {$rowCount} records (Search: '{$search}')");
exit;
