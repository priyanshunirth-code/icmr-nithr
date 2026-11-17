<?php
declare(strict_types=1);

function log_audit(PDO $pdo, string $action, string $entity, ?string $entity_id = null, ?string $details = null): void {
    $user = current_user();
    $userId = $user['id'] ?? null;
    $username = $user['username'] ?? 'system';
    $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';

    $stmt = $pdo->prepare(
        'INSERT INTO audit_log (user_id, username, action, entity, entity_id, details, ip)
         VALUES (?, ?, ?, ?, ?, ?, ?)'
    );
    $stmt->execute([$userId, $username, $action, $entity, $entity_id, $details, $ip]);
}
