# ICMR-NITHR IT Portal — Production Deployment Guide

This guide covers deploying the IT Portal on a dedicated, standalone internal server running Ubuntu Server 22.04 or 24.04 LTS with Apache 2.4, PHP 8.1+, and MariaDB/MySQL.

---

## 1. Prerequisites and Package Installation

Update system packages and install required software:

```bash
sudo apt update && sudo apt upgrade -y
sudo apt install -y apache2 php php-fpm php-mysql php-mbstring mariadb-server ufw
sudo a2enmod headers rewrite
```

---

## 2. Directory Layout & Private Config

To prevent web accessibility of sensitive files, keep configuration and runtime state in a private directory outside the web root:

```bash
# Create private application directory
sudo mkdir -p /var/www/it-portal-private
sudo chown -R www-data:www-data /var/www/it-portal-private
sudo chmod 750 /var/www/it-portal-private

# Deploy web root
sudo mkdir -p /var/www/it-portal
sudo cp -r . /var/www/it-portal/
sudo chown -R www-data:www-data /var/www/it-portal
sudo chmod -R 755 /var/www/it-portal
```

Copy the example configuration to the private directory:

```bash
sudo cp /var/www/it-portal/config/config.example.php /var/www/it-portal-private/config.php
sudo chmod 640 /var/www/it-portal-private/config.php
```

Edit `/var/www/it-portal-private/config.php` and set the database credentials.

*(Note for development on macOS: The application automatically falls back to `config/config.php` in the repository root if `/var/www/it-portal-private/config.php` is not found).*

---

## 3. Database Setup

Secure MariaDB and create the database and dedicated non-root user:

```bash
sudo mysql_secure_installation
```

Log in to MySQL as root:

```sql
CREATE DATABASE intranet_it_dashboard CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE USER 'portal_user'@'localhost' IDENTIFIED BY 'REPLACE_WITH_STRONG_PASSWORD';
GRANT ALL PRIVILEGES ON intranet_it_dashboard.* TO 'portal_user'@'localhost';
FLUSH PRIVILEGES;
```

Import schema (fresh installation):

```bash
sudo mysql intranet_it_dashboard < /var/www/it-portal/schema.sql
```

*(If upgrading an existing installation, apply the migration script: `sudo mysql intranet_it_dashboard < /var/www/it-portal/migrations/002_hardening.sql`).*

---

## 4. Provision Initial Master Account

Create the first administrative account using the CLI provisioning tool:

```bash
cd /var/www/it-portal
sudo -u www-data php bin/create_master.php
```

You will be prompted for a username and a strong password (minimum 10 characters).

---

## 5. Apache VirtualHost Configuration

Copy the hardened VirtualHost configuration:

```bash
sudo cp /var/www/it-portal/deploy/it-portal.conf /etc/apache2/sites-available/it-portal.conf
sudo a2ensite it-portal
sudo a2dissite 000-default
sudo apache2ctl configtest
sudo systemctl reload apache2
```

### Network Restriction Policy

The portal listens on port **8085** and restricts access strictly to loopback and institute private subnets (`192.168.0.0/16`, `10.0.0.0/8`, `172.16.0.0/12`).

To modify allowed subnets, edit the `<RequireAny>` block in `/etc/apache2/sites-available/it-portal.conf`:

```apache
<RequireAny>
    Require ip 127.0.0.1
    Require ip 192.168.0.0/16 10.0.0.0/8 172.16.0.0/12
</RequireAny>
```

---

## 6. UFW Firewall Configuration

Configure UFW to enforce internal-only connectivity:

```bash
sudo ufw default deny incoming
sudo ufw default allow outgoing
sudo ufw allow from 192.168.0.0/16 to any port 8085 proto tcp
sudo ufw allow from 10.0.0.0/8 to any port 8085 proto tcp
sudo ufw allow from 172.16.0.0/12 to any port 8085 proto tcp
sudo ufw allow from 192.168.0.0/16 to any port 22 proto tcp
sudo ufw enable
```

> **Network Isolation Verification:**
> 1. Connect to the institute local WiFi/LAN: Navigate to `http://<server-ip>:8085` — the portal login should load.
> 2. Disconnect and test via mobile hotspot / cellular data: The request must time out and be completely blocked by firewall rules.
> 3. Verify the server has no public IP, no NAT forwarding, and no external port forwarding enabled on institutional edge routers.

---

## 7. PHP Runtime Hardening

Edit `/etc/php/8.1/apache2/php.ini` (or fpm pool config):

```ini
display_errors = Off
display_startup_errors = Off
log_errors = On
error_log = /var/log/php/it-portal-error.log
expose_php = Off

session.use_strict_mode = 1
session.cookie_httponly = 1
session.cookie_samesite = "Strict"

upload_max_filesize = 2M
post_max_size = 8M
memory_limit = 128M
```

Restart web services:

```bash
sudo systemctl restart apache2
```

---

## 8. Automated Backups

A backup script with 14-day rotation is included at `deploy/backup.sh`.

Create backup directory:

```bash
sudo mkdir -p /var/backups/it-portal
sudo chmod 700 /var/backups/it-portal
```

Add daily cron job (`/etc/cron.d/it-portal-backup`):

```cron
0 2 * * * root DB_NAME=intranet_it_dashboard DB_USER=portal_user DB_PASS=REPLACE_WITH_PASSWORD /var/www/it-portal/deploy/backup.sh >> /var/log/it-portal-backup.log 2>&1
```
