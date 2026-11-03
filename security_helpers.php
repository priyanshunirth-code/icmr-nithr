<?php
/**
 * security_helpers.php
 * FIX 1.4: Global XSS protection and input sanitization helpers
 * Include this file in any PHP page that outputs user data
 */
// Use this function whenever echoing ANY user-controlled data
// Instead of: echo $value;
// Use:        echo esc($value);
function esc($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}
// Sanitize plain string input (strip tags, trim)
function sanitize_str($value, $maxlen = 255) {
    return substr(strip_tags(trim((string)$value)), 0, $maxlen);
}
// Validate MD5 hash (for scientist profile sid parameter)
function sanitize_md5($value) {
    return preg_match('/^[a-f0-9]{32}$/i', $value) ? $value : '';
}
// Send security headers as PHP fallback (if .htaccess headers don't apply)
function send_security_headers() {
    if (!headers_sent()) {
        header('X-Frame-Options: SAMEORIGIN');
        header('X-Content-Type-Options: nosniff');
        header('X-XSS-Protection: 1; mode=block');
        header_remove('X-Powered-By');
    }
}
?>
