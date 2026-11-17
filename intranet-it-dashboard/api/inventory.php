<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';
require_login();
require_csrf();

$action = $_POST['action'] ?? 'create';

if ($action === 'delete') {
    if (!can('delete')) {
        json_response(['error' => 'Permission denied'], 403);
    }
    $id = (int)($_POST['id'] ?? 0);
    if ($id <= 0) {
        json_response(['error' => 'Invalid record ID'], 422);
    }

    $pdo->beginTransaction();
    try {
        $stmt = $pdo->prepare('SELECT * FROM it_inventory WHERE id = ? FOR UPDATE');
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if (!$row) {
            $pdo->rollBack();
            json_response(['error' => 'Record not found'], 404);
        }

        $del = $pdo->prepare('DELETE FROM it_inventory WHERE id = ?');
        $del->execute([$id]);

        log_audit($pdo, 'delete', 'it_inventory', (string)$id, json_encode($row, JSON_UNESCAPED_SLASHES));
        $pdo->commit();
        json_response(['success' => true]);
    } catch (Throwable $e) {
        $pdo->rollBack();
        error_log('Inventory delete error: ' . $e->getMessage());
        json_response(['error' => 'Failed to delete record'], 500);
    }
}

if ($action === 'create' || $action === 'update') {
    $perm = $action === 'update' ? 'edit' : 'write';
    if (!can($perm)) {
        json_response(['error' => 'Permission denied'], 403);
    }

    $id = (int)($_POST['id'] ?? 0);
    if ($action === 'update' && $id <= 0) {
        json_response(['error' => 'Invalid record ID'], 422);
    }

    $asset_id = trim($_POST['asset_id'] ?? '');
    $device_name = trim($_POST['device_name'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $status = trim($_POST['status'] ?? 'Available');
    $ip_address = normalize_null($_POST['ip_address'] ?? null);

    $errors = [];
    if ($asset_id === '') $errors['asset_id'] = 'Asset ID is required';
    if ($device_name === '') $errors['device_name'] = 'Device name is required';
    if (!in_array($category, ALLOWED_CATEGORIES, true)) $errors['category'] = 'Invalid category';
    if (!in_array($status, ALLOWED_INVENTORY_STATUSES, true)) $errors['status'] = 'Invalid status';
    if ($ip_address !== null && !filter_var($ip_address, FILTER_VALIDATE_IP)) {
        $errors['ip_address'] = 'Invalid IP address format';
    }

    if (!empty($errors)) {
        json_response(['error' => 'Validation failed', 'fields' => $errors], 422);
    }

    $brand = normalize_null($_POST['brand'] ?? null);
    $model = normalize_null($_POST['model'] ?? null);
    $serial_number = normalize_null($_POST['serial_number'] ?? null);
    $assigned_to = normalize_null($_POST['assigned_to'] ?? null);
    $department = normalize_null($_POST['department'] ?? null);
    $location = normalize_null($_POST['location'] ?? null);
    $remarks = normalize_null($_POST['remarks'] ?? null);

    $pdo->beginTransaction();
    try {
        if ($action === 'create') {
            $stmt = $pdo->prepare('
                INSERT INTO it_inventory (asset_id, device_name, category, brand, model, serial_number, assigned_to, department, location, ip_address, status, remarks)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ');
            $stmt->execute([$asset_id, $device_name, $category, $brand, $model, $serial_number, $assigned_to, $department, $location, $ip_address, $status, $remarks]);
            $newId = (int)$pdo->lastInsertId();
            $logDetails = json_encode(['asset_id' => $asset_id, 'device_name' => $device_name, 'status' => $status], JSON_UNESCAPED_SLASHES);
            log_audit($pdo, 'create', 'it_inventory', (string)$newId, $logDetails);
        } else {
            $stmt = $pdo->prepare('
                UPDATE it_inventory
                SET asset_id = ?, device_name = ?, category = ?, brand = ?, model = ?, serial_number = ?, assigned_to = ?, department = ?, location = ?, ip_address = ?, status = ?, remarks = ?
                WHERE id = ?
            ');
            $stmt->execute([$asset_id, $device_name, $category, $brand, $model, $serial_number, $assigned_to, $department, $location, $ip_address, $status, $remarks, $id]);
            if ($stmt->rowCount() === 0) {
                // Check if row actually exists
                $check = $pdo->prepare('SELECT id FROM it_inventory WHERE id = ?');
                $check->execute([$id]);
                if (!$check->fetch()) {
                    $pdo->rollBack();
                    json_response(['error' => 'Record not found'], 404);
                }
            }
            $logDetails = json_encode(['asset_id' => $asset_id, 'device_name' => $device_name, 'status' => $status], JSON_UNESCAPED_SLASHES);
            log_audit($pdo, 'update', 'it_inventory', (string)$id, $logDetails);
        }
        $pdo->commit();

        if (is_api_request()) {
            json_response(['success' => true]);
        }
        header('Location: ../index.php');
        exit;
    } catch (PDOException $e) {
        $pdo->rollBack();
        if ($e->getCode() === '23000') {
            json_response(['error' => 'Asset ID already exists.', 'fields' => ['asset_id' => 'Duplicate Asset ID']], 422);
        }
        error_log('Inventory save error: ' . $e->getMessage());
        json_response(['error' => 'Database error occurred while saving.'], 500);
    }
}

json_response(['error' => 'Invalid action'], 400);
