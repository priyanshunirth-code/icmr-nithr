# ICMR-NITHR Intranet IT Dashboard

Institutional IT Inventory & Network IP Directory portal for ICMR-National Institute for Tribal Health Research (NITHR), Jabalpur.

Built with PHP 8.1+ / PDO / MariaDB (or SQLite in local demo mode) and vanilla JavaScript. Zero Composer or third-party frontend dependencies.

---

## 1. Prerequisites

- **PHP 8.1 or higher** (PHP 8.2, 8.3, 8.4, 8.5 tested)
  - Required PHP extensions: `pdo`, `pdo_mysql` (for MySQL/MariaDB), `pdo_sqlite` (if testing demo mode), `session`, `fileinfo`
- **Database Server:** MySQL 8.0+ or MariaDB 10.5+ (recommended)
  - Alternatively, SQLite 3 for zero-setup local demo mode

Check your installed PHP version and extensions:
```bash
php -v
php -m | grep -E "pdo|session|fileinfo"
```

---

## 2. Project Directory Setup

Navigate into the application folder:
```bash
cd intranet-it-dashboard
```

The application layout:
```text
intranet-it-dashboard/
├── api/             # Backend REST/JSON endpoints (health, inventory, ip, users, etc.)
├── assets/          # Static vanilla JS, CSS, and institutional SVG icons
│   ├── css/app.css  # UI stylesheet (responsive, dark-compatible identity colors)
│   └── js/app.js    # Client router, AJAX handlers, validation, toasts, modals
├── bin/             # CLI administrative tools (master account provisioning)
├── config/          # Environment configuration (gitignored private config)
├── deploy/          # Apache 2.4 vhost, systemd, and production configs
├── docs/            # Deployment guides and security audit checklists
├── includes/        # PHP core bootstrap, auth, CSRF, validation, and audit helpers
├── index.php        # Single-page dashboard application view
├── login.php        # Secure login controller with brute-force lockout
├── schema.sql       # Complete relational database DDL schema
└── sample-data.sql  # Optional dummy records for local development
```

---

## 3. Database Initialization

### Option A: Using MySQL / MariaDB (Recommended & Standard)

1. Start your local database server:
   - **macOS (Homebrew):** `brew services start mysql` (or `mysql@8.4` / `mariadb`)
   - **Linux (systemd):** `sudo systemctl start mariadb`

2. Create the database and dedicated application user:
   ```sql
   CREATE DATABASE intranet_it_dashboard CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   CREATE USER 'portal'@'127.0.0.1' IDENTIFIED BY 'YOUR_LOCAL_DB_PASSWORD';
   GRANT ALL PRIVILEGES ON intranet_it_dashboard.* TO 'portal'@'127.0.0.1';
   FLUSH PRIVILEGES;
   ```

3. Import the core schema:
   ```bash
   mysql -u portal -p -h 127.0.0.1 intranet_it_dashboard < schema.sql
   ```

4. *(Optional)* Import development sample assets and IP allocations:
   ```bash
   mysql -u portal -p -h 127.0.0.1 intranet_it_dashboard < sample-data.sql
   ```

### Option B: Local SQLite Demo Mode (Zero DB Setup)

Set `'demo_mode' => true` and `'app_env' => 'development'` in `config/config.php`. If MySQL is unavailable, bootstrap automatically initializes an SQLite database inside `data/dashboard.sqlite`.

---

## 4. Configuration

Create your private configuration file from the template:
```bash
cp config/config.example.php config/config.php
```

Edit `config/config.php`:
```php
<?php
declare(strict_types=1);

return [
    'app_env' => 'development', // 'development' or 'production'
    'demo_mode' => false,       // set true only if using SQLite fallback
    'timezone' => 'Asia/Kolkata',
    'db' => [
        'dsn' => 'mysql:host=127.0.0.1;port=3306;dbname=intranet_it_dashboard;charset=utf8mb4',
        'username' => 'portal',
        'password' => 'YOUR_LOCAL_DB_PASSWORD',
    ],
    'institution_name' => 'ICMR-NITHR',
    'app_name' => 'IT Administration Dashboard',
];
```
> Note: `config/config.php` and `data/` are listed in `.gitignore` and must never be committed.

---

## 5. Provision the Master Administrator Account

The portal uses strict role separation (`Master` and `User`). To create your initial administrator account:

```bash
php bin/create_master.php
```

Follow the interactive prompts:
```text
=== ICMR-NITHR IT Portal - Master Account Provisioning ===
Enter Master Username: admin
Enter Password (min 10 characters): [hidden]
Confirm Password: [hidden]
Success: Master account 'admin' successfully created.
```

---

## 6. Run the Local Development Server

Start the built-in PHP development server from the `intranet-it-dashboard/` root:

```bash
php -S 127.0.0.1:8000
```

Open your browser at:
```text
http://127.0.0.1:8000
```

You will be automatically redirected to `login.php`.

---

## 7. Authentication & Roles

### Logging In
1. Toggle the **Master / User** account switch on the login screen to match the account's assigned role.
2. Enter your credentials.
3. If an account is assigned the `Master` role, logging in with the `User` toggle selected will fail-closed.

| Feature | Master Role | User Role |
|:---|:---:|:---:|
| Dashboard & Live System Health | ✓ | ✓ |
| Browse IT Inventory & IP Directory | ✓ | ✓ |
| Topbar Global Live Search & Filters | ✓ | ✓ |
| Export Filtered Datasets to CSV | ✓ | ✓ |
| Add & Edit Equipment / IP Records | ✓ | ✗ |
| Delete Records (Full JSON Audit Log) | ✓ | ✗ |
| Batch CSV Import & Template Download | ✓ | ✗ |
| User Provisioning & Password Resets | ✓ | ✗ |
| View System Audit Trails | ✓ | ✗ |

---

## 8. Development Verification & Common Commands

- **Lint all PHP files:**
  ```bash
  find . -name "*.php" -exec php -l {} \;
  ```

- **Reset Lockout After Failed Attempts:**
  If you trigger the 15-minute brute-force lockout during testing, clear failed records in MySQL:
  ```sql
  DELETE FROM login_attempts WHERE success = 0;
  ```

- **Create additional standard Users:**
  Log in as a Master account, navigate to **User Accounts** in the sidebar, and click **+ Add User**.

---

## 9. Production Deployment Reference

For deploying to institutional Apache 2.4 / Ubuntu servers on port 8085 with subnet restrictions and hardened VirtualHost configurations, refer to [docs/DEPLOYMENT.md](file:///Users/priyanshu/Desktop/icmr-nithr/intranet-it-dashboard/docs/DEPLOYMENT.md) and [docs/SECURITY_CHECKLIST.md](file:///Users/priyanshu/Desktop/icmr-nithr/intranet-it-dashboard/docs/SECURITY_CHECKLIST.md).
