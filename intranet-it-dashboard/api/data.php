<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';
require_login();

if (!can('read')) {
    json_response(['error' => 'Permission denied'], 403);
}

$rawType = trim((string)($_GET['type'] ?? 'inventory'));
$type = ($rawType === 'directory' || $rawType === 'ip') ? 'directory' : 'inventory';

$search = trim((string)($_GET['search'] ?? ''));
$page = max(1, (int)($_GET['page'] ?? 1));
$limit = min(100, max(5, (int)($_GET['limit'] ?? 25)));
$offset = ($page - 1) * $limit;

$sort = trim((string)($_GET['sort'] ?? 'id'));
$order = strtoupper(trim((string)($_GET['order'] ?? 'DESC'))) === 'ASC' ? 'ASC' : 'DESC';

$conditions = [];
$params = [];

if ($type === 'inventory') {
    $allowedSort = ['id', 'asset_id', 'device_name', 'category', 'brand', 'model', 'serial_number', 'status', 'assigned_to', 'department', 'location', 'ip_address', 'created_at'];
    if (!in_array($sort, $allowedSort, true)) $sort = 'id';

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
        $conditions[] = '(asset_id LIKE ? OR device_name LIKE ? OR brand LIKE ? OR model LIKE ? OR serial_number LIKE ? OR assigned_to LIKE ? OR department LIKE ? OR location LIKE ? OR ip_address LIKE ? OR category LIKE ? OR status LIKE ? OR remarks LIKE ?)';
        $like = '%' . $search . '%';
        for ($i = 0; $i < 12; $i++) $params[] = $like;
    }

    $where = $conditions ? ('WHERE ' . implode(' AND ', $conditions)) : '';

    $countStmt = $pdo->prepare("SELECT COUNT(*) FROM it_inventory {$where}");
    $countStmt->execute($params);
    $total = (int)$countStmt->fetchColumn();

    $query = "
        SELECT inv.*,
               CASE WHEN inv.ip_address IS NOT NULL AND inv.ip_address != '' AND EXISTS (SELECT 1 FROM ip_directory dir WHERE dir.ip_address = inv.ip_address) THEN 1 ELSE 0 END AS ip_in_directory
        FROM it_inventory inv
        {$where}
        ORDER BY {$sort} {$order}
        LIMIT {$limit} OFFSET {$offset}
    ";
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $rows = $stmt->fetchAll();
} else {
    $allowedSort = ['id', 'ip_address', 'hostname', 'device_type', 'ad_status', 'mac_address', 'device_status', 'department', 'location', 'created_at'];
    if (!in_array($sort, $allowedSort, true)) $sort = 'id';

    $deviceType = trim((string)($_GET['device_type'] ?? ''));
    $adStatus = trim((string)($_GET['ad_status'] ?? ''));
    $deviceStatus = trim((string)($_GET['device_status'] ?? ''));

    if ($deviceType !== '' && $deviceType !== 'All device types') {
        $conditions[] = 'device_type = ?';
        $params[] = $deviceType;
    }
    if ($adStatus !== '' && $adStatus !== 'All AD statuses') {
        $conditions[] = 'ad_status = ?';
        $params[] = $adStatus;
    }
    if ($deviceStatus !== '' && $deviceStatus !== 'All states' && $deviceStatus !== 'All statuses') {
        $conditions[] = 'device_status = ?';
        $params[] = $deviceStatus;
    }
    if ($search !== '') {
        $conditions[] = '(ip_address LIKE ? OR hostname LIKE ? OR mac_address LIKE ? OR device_type LIKE ? OR ad_status LIKE ? OR department LIKE ? OR location LIKE ? OR device_status LIKE ? OR remarks LIKE ?)';
        $like = '%' . $search . '%';
        for ($i = 0; $i < 9; $i++) $params[] = $like;
    }

    $where = $conditions ? ('WHERE ' . implode(' AND ', $conditions)) : '';

    $countStmt = $pdo->prepare("SELECT COUNT(*) FROM ip_directory {$where}");
    $countStmt->execute($params);
    $total = (int)$countStmt->fetchColumn();

    $query = "
        SELECT *
        FROM ip_directory
        {$where}
        ORDER BY {$sort} {$order}
        LIMIT {$limit} OFFSET {$offset}
    ";
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $rows = $stmt->fetchAll();
}

json_response([
    'total' => $total,
    'page' => $page,
    'limit' => $limit,
    'pages' => ceil($total / $limit),
    'rows' => $rows,
]);
