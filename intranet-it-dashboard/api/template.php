<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';
require_login();

$rawType = trim((string)($_GET['type'] ?? 'ip'));
$type = ($rawType === 'directory' || $rawType === 'ip') ? 'ip' : 'inventory';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $type . '_template.csv"');
header('Cache-Control: no-store, no-cache, must-revalidate');

$out = fopen('php://output', 'w');
fwrite($out, "\xEF\xBB\xBF");

if ($type === 'inventory') {
    fputcsv($out, ['asset_id', 'device_name', 'category', 'brand', 'model', 'serial_number', 'assigned_to', 'department', 'location', 'ip_address', 'status', 'remarks'], ',', '"', "\\");
    fputcsv($out, ['NITHR-PC-0101', 'NITHR-ADMIN-01', 'Desktop', 'Dell', 'OptiPlex 7090', 'SN123456', 'Dr. Sharma', 'Administration', 'Block-A Room 102', '10.10.5.50', 'Assigned', 'Main administrative workstation'], ',', '"', "\\");
} else {
    fputcsv($out, ['ip_address', 'hostname', 'device_type', 'ad_status', 'mac_address', 'department', 'location', 'device_status', 'remarks'], ',', '"', "\\");
    fputcsv($out, ['10.10.5.50', 'NITHR-ADMIN-01', 'Desktop', 'AD Registered', '00:1A:2B:3C:4D:5E', 'Administration', 'Block-A Room 102', 'Online', 'Static allocation'], ',', '"', "\\");
}

fclose($out);
exit;
