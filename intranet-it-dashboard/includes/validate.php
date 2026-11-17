<?php
declare(strict_types=1);

const ALLOWED_CATEGORIES = ['Desktop', 'Laptop', 'Printer', 'Switch', 'Other'];
const ALLOWED_INVENTORY_STATUSES = ['Available', 'Assigned', 'Under Repair', 'Retired'];
const ALLOWED_DEVICE_TYPES = ['Desktop', 'Laptop', 'Printer', 'Switch', 'Other'];
const ALLOWED_AD_STATUSES = ['AD Registered', 'Non-AD'];
const ALLOWED_DEVICE_STATUSES = ['Online', 'Offline', 'Unknown'];

function validate_mac(?string $mac): ?string {
    if ($mac === null || trim($mac) === '') {
        return null;
    }
    $cleaned = strtolower(preg_replace('/[^0-9a-fA-F]/', '', $mac) ?? '');
    if (strlen($cleaned) !== 12) {
        return null;
    }
    return strtoupper(implode(':', str_split($cleaned, 2)));
}

function normalize_null(?string $value): ?string {
    if ($value === null) {
        return null;
    }
    $trimmed = trim($value);
    return $trimmed === '' ? null : $trimmed;
}
