<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/csv.php';
require_login();
require_csrf();

if (!can('import')) {
    json_response(['error' => 'Permission denied. Master role required for import.'], 403);
}

$rawType = trim((string)($_POST['type'] ?? 'ip'));
$type = ($rawType === 'directory' || $rawType === 'ip') ? 'ip' : 'inventory';
$updateExisting = isset($_POST['update_existing']) && $_POST['update_existing'] === '1';

if (empty($_FILES['csv']) || !is_array($_FILES['csv'])) {
    json_response(['error' => 'No CSV file uploaded'], 422);
}

try {
    $tmpFile = validate_csv_upload($_FILES['csv']);
} catch (InvalidArgumentException $e) {
    json_response(['error' => $e->getMessage()], 422);
}

$handle = fopen($tmpFile, 'r');
if (!$handle) {
    json_response(['error' => 'Failed to open uploaded file'], 500);
}

$firstLine = fgets($handle);
if ($firstLine === false) {
    fclose($handle);
    json_response(['error' => 'Uploaded CSV file is empty'], 422);
}

$firstLine = strip_utf8_bom($firstLine);
$delimiter = detect_csv_delimiter($firstLine);
rewind($handle);

$rawHeaders = fgetcsv($handle, 0, $delimiter, '"', "\\");
if (!$rawHeaders) {
    fclose($handle);
    json_response(['error' => 'Invalid CSV headers'], 422);
}

$headers = array_map(fn($h) => strtolower(trim(strip_utf8_bom($h))), $rawHeaders);
$headerIndex = array_flip($headers);

$added = 0;
$updated = 0;
$skipped = 0;
$invalid = [];
$lineNumber = 1;

$pdo->beginTransaction();
try {
    if ($type === 'inventory') {
        if (!isset($headerIndex['asset_id'], $headerIndex['device_name'])) {
            throw new InvalidArgumentException('CSV must contain at least "asset_id" and "device_name" columns.');
        }

        $checkStmt = $pdo->prepare('SELECT id FROM it_inventory WHERE asset_id = ?');
        $insertStmt = $pdo->prepare('
            INSERT INTO it_inventory (asset_id, device_name, category, brand, model, serial_number, assigned_to, department, location, ip_address, status, remarks)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');
        $updateStmt = $pdo->prepare('
            UPDATE it_inventory
            SET device_name = ?, category = ?, brand = ?, model = ?, serial_number = ?, assigned_to = ?, department = ?, location = ?, ip_address = ?, status = ?, remarks = ?
            WHERE asset_id = ?
        ');

        while (($row = fgetcsv($handle, 0, $delimiter, '"', "\\")) !== false) {
            $lineNumber++;
            if ($lineNumber > 5001) {
                $invalid[] = ['line' => $lineNumber, 'reason' => 'Maximum limit of 5,000 rows reached'];
                break;
            }
            if (empty(array_filter($row, fn($v) => trim((string)$v) !== ''))) continue;

            $asset_id = csv_unquote_safe(trim((string)($row[$headerIndex['asset_id']] ?? '')));
            $device_name = csv_unquote_safe(trim((string)($row[$headerIndex['device_name']] ?? '')));
            $category = csv_unquote_safe(trim((string)($row[$headerIndex['category'] ?? -1] ?? 'Other')));
            $status = csv_unquote_safe(trim((string)($row[$headerIndex['status'] ?? -1] ?? 'Available')));
            $ip_address = normalize_null(csv_unquote_safe(trim((string)($row[$headerIndex['ip_address'] ?? -1] ?? ''))));

            if ($asset_id === '' || $device_name === '') {
                $invalid[] = ['line' => $lineNumber, 'reason' => 'Missing Asset ID or Device Name'];
                continue;
            }
            if (!in_array($category, ALLOWED_CATEGORIES, true)) $category = 'Other';
            if (!in_array($status, ALLOWED_INVENTORY_STATUSES, true)) $status = 'Available';
            if ($ip_address !== null && !filter_var($ip_address, FILTER_VALIDATE_IP)) {
                $invalid[] = ['line' => $lineNumber, 'reason' => "Invalid IP format '{$ip_address}'"];
                continue;
            }

            $brand = normalize_null(csv_unquote_safe(trim((string)($row[$headerIndex['brand'] ?? -1] ?? ''))));
            $model = normalize_null(csv_unquote_safe(trim((string)($row[$headerIndex['model'] ?? -1] ?? ''))));
            $serial_number = normalize_null(csv_unquote_safe(trim((string)($row[$headerIndex['serial_number'] ?? -1] ?? ''))));
            $assigned_to = normalize_null(csv_unquote_safe(trim((string)($row[$headerIndex['assigned_to'] ?? -1] ?? ''))));
            $department = normalize_null(csv_unquote_safe(trim((string)($row[$headerIndex['department'] ?? -1] ?? ''))));
            $location = normalize_null(csv_unquote_safe(trim((string)($row[$headerIndex['location'] ?? -1] ?? ''))));
            $remarks = normalize_null(csv_unquote_safe(trim((string)($row[$headerIndex['remarks'] ?? -1] ?? ''))));

            $checkStmt->execute([$asset_id]);
            $exists = $checkStmt->fetch();

            if ($exists) {
                if ($updateExisting) {
                    $updateStmt->execute([$device_name, $category, $brand, $model, $serial_number, $assigned_to, $department, $location, $ip_address, $status, $remarks, $asset_id]);
                    $updated++;
                } else {
                    $skipped++;
                }
            } else {
                $insertStmt->execute([$asset_id, $device_name, $category, $brand, $model, $serial_number, $assigned_to, $department, $location, $ip_address, $status, $remarks]);
                $added++;
            }
        }
    } else {
        if (!isset($headerIndex['ip_address'], $headerIndex['hostname'])) {
            throw new InvalidArgumentException('CSV must contain at least "ip_address" and "hostname" columns.');
        }

        $checkStmt = $pdo->prepare('SELECT id FROM ip_directory WHERE ip_address = ?');
        $insertStmt = $pdo->prepare('
            INSERT INTO ip_directory (ip_address, hostname, mac_address, device_type, ad_status, department, location, device_status, remarks)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');
        $updateStmt = $pdo->prepare('
            UPDATE ip_directory
            SET hostname = ?, mac_address = ?, device_type = ?, ad_status = ?, department = ?, location = ?, device_status = ?, remarks = ?
            WHERE ip_address = ?
        ');

        while (($row = fgetcsv($handle, 0, $delimiter, '"', "\\")) !== false) {
            $lineNumber++;
            if ($lineNumber > 5001) {
                $invalid[] = ['line' => $lineNumber, 'reason' => 'Maximum limit of 5,000 rows reached'];
                break;
            }
            if (empty(array_filter($row, fn($v) => trim((string)$v) !== ''))) continue;

            $ip = csv_unquote_safe(trim((string)($row[$headerIndex['ip_address']] ?? '')));
            $hostname = csv_unquote_safe(trim((string)($row[$headerIndex['hostname']] ?? '')));
            $device_type = csv_unquote_safe(trim((string)($row[$headerIndex['device_type'] ?? -1] ?? 'Other')));
            $ad_status = csv_unquote_safe(trim((string)($row[$headerIndex['ad_status'] ?? -1] ?? 'Non-AD')));
            $device_status = csv_unquote_safe(trim((string)($row[$headerIndex['device_status'] ?? -1] ?? 'Unknown')));
            $raw_mac = normalize_null(csv_unquote_safe(trim((string)($row[$headerIndex['mac_address'] ?? -1] ?? ''))));

            if (!filter_var($ip, FILTER_VALIDATE_IP) || $hostname === '') {
                $invalid[] = ['line' => $lineNumber, 'reason' => "Invalid IP '{$ip}' or missing hostname"];
                continue;
            }
            if (!in_array($device_type, ALLOWED_DEVICE_TYPES, true)) $device_type = 'Other';
            if (!in_array($ad_status, ALLOWED_AD_STATUSES, true)) $ad_status = 'Non-AD';
            if (!in_array($device_status, ALLOWED_DEVICE_STATUSES, true)) $device_status = 'Unknown';

            $mac = null;
            if ($raw_mac !== null) {
                $mac = validate_mac($raw_mac);
                if ($mac === null) {
                    $invalid[] = ['line' => $lineNumber, 'reason' => "Invalid MAC format '{$raw_mac}'"];
                    continue;
                }
            }

            $department = normalize_null(csv_unquote_safe(trim((string)($row[$headerIndex['department'] ?? -1] ?? ''))));
            $location = normalize_null(csv_unquote_safe(trim((string)($row[$headerIndex['location'] ?? -1] ?? ''))));
            $remarks = normalize_null(csv_unquote_safe(trim((string)($row[$headerIndex['remarks'] ?? -1] ?? ''))));

            $checkStmt->execute([$ip]);
            $exists = $checkStmt->fetch();

            if ($exists) {
                if ($updateExisting) {
                    $updateStmt->execute([$hostname, $mac, $device_type, $ad_status, $department, $location, $device_status, $remarks, $ip]);
                    $updated++;
                } else {
                    $skipped++;
                }
            } else {
                $insertStmt->execute([$ip, $hostname, $mac, $device_type, $ad_status, $department, $location, $device_status, $remarks]);
                $added++;
            }
        }
    }

    $pdo->commit();
} catch (Throwable $e) {
    $pdo->rollBack();
    fclose($handle);
    error_log('CSV import error: ' . $e->getMessage());
    json_response(['error' => 'Import failed: ' . $e->getMessage()], 422);
}
fclose($handle);

$invalidLines = !empty($invalid) ? ' (lines ' . implode(', ', array_map(fn($item) => (string)$item['line'], array_slice($invalid, 0, 10))) . ')' : '';
$invalidPart = count($invalid) . ' invalid' . $invalidLines;
$summary = "{$added} added, {$skipped} duplicates skipped, {$invalidPart}";
if ($updated > 0) {
    $summary .= ", {$updated} updated";
}
$origName = (string)($_FILES['csv']['name'] ?? 'import.csv');
log_audit($pdo, 'import', $type, null, "{$summary} (File: {$origName})");

json_response([
    'success' => true,
    'message' => $summary,
    'counts' => [
        'added' => $added,
        'updated' => $updated,
        'skipped' => $skipped,
        'invalid_count' => count($invalid),
    ],
    'invalid_rows' => array_slice($invalid, 0, 50),
]);
