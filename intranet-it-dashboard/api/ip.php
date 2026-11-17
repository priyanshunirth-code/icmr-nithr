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
        $stmt = $pdo->prepare('SELECT * FROM ip_directory WHERE id = ? FOR UPDATE');
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if (!$row) {
            $pdo->rollBack();
            json_response(['error' => 'Record not found'], 404);
        }

        $del = $pdo->prepare('DELETE FROM ip_directory WHERE id = ?');
        $del->execute([$id]);

        log_audit($pdo, 'delete', 'ip_directory', (string)$id, json_encode($row, JSON_UNESCAPED_SLASHES));
        $pdo->commit();
        json_response(['success' => true]);
    } catch (Throwable $e) {
        $pdo->rollBack();
        error_log('IP delete error: ' . $e->getMessage());
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

    $ip_address = trim($_POST['ip_address'] ?? '');
    $hostname = trim($_POST['hostname'] ?? '');
    $device_type = trim($_POST['device_type'] ?? '');
    $ad_status = trim($_POST['ad_status'] ?? 'Non-AD');
    $device_status = trim($_POST['device_status'] ?? 'Unknown');
    $raw_mac = normalize_null($_POST['mac_address'] ?? null);

    $errors = [];
    if (!filter_var($ip_address, FILTER_VALIDATE_IP)) {
        $errors['ip_address'] = 'A valid IPv4 or IPv6 address is required';
    }
    if ($hostname === '') {
        $errors['hostname'] = 'Hostname is required';
    }
    if (!in_array($device_type, ALLOWED_DEVICE_TYPES, true)) {
        $errors['device_type'] = 'Invalid device type';
    }
    if (!in_array($ad_status, ALLOWED_AD_STATUSES, true)) {
        $errors['ad_status'] = 'Invalid AD status';
    }
    if (!in_array($device_status, ALLOWED_DEVICE_STATUSES, true)) {
        $errors['device_status'] = 'Invalid device status';
    }

    $mac_address = null;
    if ($raw_mac !== null) {
        $mac_address = validate_mac($raw_mac);
        if ($mac_address === null) {
            $errors['mac_address'] = 'Invalid MAC address format (use AA:BB:CC:DD:EE:FF)';
        }
    }

    if (!empty($errors)) {
        json_response(['error' => 'Validation failed', 'fields' => $errors], 422);
    }

    $department = normalize_null($_POST['department'] ?? null);
    $location = normalize_null($_POST['location'] ?? null);
    $remarks = normalize_null($_POST['remarks'] ?? null);

    $pdo->beginTransaction();
    try {
        if ($action === 'create') {
            $stmt = $pdo->prepare('
                INSERT INTO ip_directory (ip_address, hostname, mac_address, device_type, ad_status, department, location, device_status, remarks)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ');
            $stmt->execute([$ip_address, $hostname, $mac_address, $device_type, $ad_status, $department, $location, $device_status, $remarks]);
            $newId = (int)$pdo->lastInsertId();
            $logDetails = json_encode(['ip_address' => $ip_address, 'hostname' => $hostname, 'ad_status' => $ad_status], JSON_UNESCAPED_SLASHES);
            log_audit($pdo, 'create', 'ip_directory', (string)$newId, $logDetails);
        } else {
            $stmt = $pdo->prepare('
                UPDATE ip_directory
                SET ip_address = ?, hostname = ?, mac_address = ?, device_type = ?, ad_status = ?, department = ?, location = ?, device_status = ?, remarks = ?
                WHERE id = ?
            ');
            $stmt->execute([$ip_address, $hostname, $mac_address, $device_type, $ad_status, $department, $location, $device_status, $remarks, $id]);
            if ($stmt->rowCount() === 0) {
                $check = $pdo->prepare('SELECT id FROM ip_directory WHERE id = ?');
                $check->execute([$id]);
                if (!$check->fetch()) {
                    $pdo->rollBack();
                    json_response(['error' => 'Record not found'], 404);
                }
            }
            $logDetails = json_encode(['ip_address' => $ip_address, 'hostname' => $hostname, 'ad_status' => $ad_status], JSON_UNESCAPED_SLASHES);
            log_audit($pdo, 'update', 'ip_directory', (string)$id, $logDetails);
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
            json_response(['error' => "IP address {$ip_address} is already assigned in directory.", 'fields' => ['ip_address' => 'Duplicate IP address']], 422);
        }
        error_log('IP save error: ' . $e->getMessage());
        json_response(['error' => 'Database error occurred while saving.'], 500);
    }
}

json_response(['error' => 'Invalid action'], 400);
