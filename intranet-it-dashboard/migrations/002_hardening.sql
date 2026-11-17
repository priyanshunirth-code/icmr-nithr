-- Migration 002: Hardening and Security Upgrades
USE intranet_it_dashboard;

-- 1. Create login_attempts table for brute-force prevention
CREATE TABLE IF NOT EXISTS login_attempts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(80) NOT NULL,
    ip VARCHAR(45) NOT NULL,
    attempted_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    success TINYINT(1) NOT NULL DEFAULT 0,
    INDEX idx_login_attempt (username, ip, attempted_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Create audit_log table
CREATE TABLE IF NOT EXISTS audit_log (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED DEFAULT NULL,
    username VARCHAR(80) NOT NULL,
    action VARCHAR(50) NOT NULL,
    entity VARCHAR(50) NOT NULL,
    entity_id VARCHAR(80) DEFAULT NULL,
    details TEXT DEFAULT NULL,
    ip VARCHAR(45) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_audit_action (action),
    INDEX idx_audit_entity (entity),
    INDEX idx_audit_created (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Upgrade users table: migrate roles and add security flags
ALTER TABLE users MODIFY COLUMN role VARCHAR(30) NOT NULL;
UPDATE users SET role = 'Master' WHERE role = 'Administrator';
UPDATE users SET role = 'User' WHERE role = 'IT Staff';
ALTER TABLE users MODIFY COLUMN role ENUM('Master', 'User') NOT NULL DEFAULT 'User';

-- Add user status and policy flags safely
ALTER TABLE users
    ADD COLUMN is_active TINYINT(1) NOT NULL DEFAULT 1 AFTER role,
    ADD COLUMN last_login_at DATETIME DEFAULT NULL AFTER is_active,
    ADD COLUMN must_change_password TINYINT(1) NOT NULL DEFAULT 0 AFTER last_login_at;

-- 4. Add index for inventory ip_address to cross-reference directory
CREATE INDEX idx_inventory_ip ON it_inventory (ip_address);
