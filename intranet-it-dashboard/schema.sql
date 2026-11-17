CREATE DATABASE IF NOT EXISTS intranet_it_dashboard CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE intranet_it_dashboard;

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(80) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('Master', 'User') NOT NULL DEFAULT 'User',
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    last_login_at DATETIME DEFAULT NULL,
    must_change_password TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_user_role (role),
    INDEX idx_user_active (is_active)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE login_attempts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(80) NOT NULL,
    ip VARCHAR(45) NOT NULL,
    attempted_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    success TINYINT(1) NOT NULL DEFAULT 0,
    INDEX idx_login_attempt (username, ip, attempted_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE audit_log (
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

CREATE TABLE it_inventory (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    asset_id VARCHAR(80) NOT NULL UNIQUE,
    device_name VARCHAR(120) NOT NULL,
    category VARCHAR(50) NOT NULL,
    brand VARCHAR(80) DEFAULT NULL,
    model VARCHAR(120) DEFAULT NULL,
    serial_number VARCHAR(120) DEFAULT NULL,
    assigned_to VARCHAR(120) DEFAULT NULL,
    department VARCHAR(120) DEFAULT NULL,
    location VARCHAR(120) DEFAULT NULL,
    ip_address VARCHAR(45) DEFAULT NULL,
    status ENUM('Available','Assigned','Under Repair','Retired') NOT NULL DEFAULT 'Available',
    remarks TEXT,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_inventory_category (category),
    INDEX idx_inventory_status (status),
    INDEX idx_inventory_ip (ip_address)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE ip_directory (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ip_address VARCHAR(45) NOT NULL UNIQUE,
    hostname VARCHAR(120) NOT NULL,
    mac_address VARCHAR(17) DEFAULT NULL,
    device_type VARCHAR(50) NOT NULL,
    ad_status ENUM('AD Registered','Non-AD') NOT NULL DEFAULT 'Non-AD',
    department VARCHAR(120) DEFAULT NULL,
    location VARCHAR(120) DEFAULT NULL,
    device_status ENUM('Online','Offline','Unknown') NOT NULL DEFAULT 'Unknown',
    remarks TEXT,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_ip_type (device_type),
    INDEX idx_ip_ad_status (ad_status),
    INDEX idx_ip_device_status (device_status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
