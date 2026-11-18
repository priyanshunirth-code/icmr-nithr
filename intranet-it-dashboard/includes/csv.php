<?php
declare(strict_types=1);

function csv_safe(?string $val): string {
    if ($val === null || $val === '') {
        return '';
    }
    $firstChar = $val[0];
    if (in_array($firstChar, ['=', '+', '-', '@', "\t", "\r"], true)) {
        return "'" . $val;
    }
    return $val;
}

function csv_unquote_safe(?string $val): string {
    if ($val === null || $val === '') {
        return '';
    }
    if (strlen($val) > 1 && $val[0] === "'" && in_array($val[1], ['=', '+', '-', '@', "\t", "\r"], true)) {
        return substr($val, 1);
    }
    return $val;
}

function strip_utf8_bom(string $str): string {
    if (str_starts_with($str, "\xEF\xBB\xBF")) {
        return substr($str, 3);
    }
    return $str;
}

function detect_csv_delimiter(string $sampleLine): string {
    $semicolons = substr_count($sampleLine, ';');
    $commas = substr_count($sampleLine, ',');
    return ($semicolons > $commas) ? ';' : ',';
}

function validate_csv_upload(array $file): string {
    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        throw new InvalidArgumentException('Upload failed with error code: ' . ($file['error'] ?? 'unknown'));
    }
    if (($file['size'] ?? 0) > 2 * 1024 * 1024) {
        throw new InvalidArgumentException('File exceeds the 2MB size limit.');
    }
    $tmpName = (string)($file['tmp_name'] ?? '');
    if (!is_uploaded_file($tmpName)) {
        throw new InvalidArgumentException('Invalid file upload source.');
    }
    $ext = strtolower(pathinfo((string)($file['name'] ?? ''), PATHINFO_EXTENSION));
    if ($ext !== 'csv') {
        throw new InvalidArgumentException('Uploaded file must have a .csv extension.');
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = (string)$finfo->file($tmpName);
    $validMimes = [
        'text/plain',
        'text/csv',
        'application/csv',
        'text/x-csv',
        'application/vnd.ms-excel',
        'application/octet-stream',
        'text/x-comma-separated-values',
        'application/vnd.csv',
    ];
    if (!in_array($mime, $validMimes, true)) {
        throw new InvalidArgumentException('Invalid file content type: ' . $mime);
    }

    return $tmpName;
}
