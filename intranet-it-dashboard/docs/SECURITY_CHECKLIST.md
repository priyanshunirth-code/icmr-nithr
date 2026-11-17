# Pre-Go-Live Security Checklist

Ensure all items are verified and checked off prior to opening the IT Portal to internal users.

- [ ] **No Default Credentials:**
  - Verify that `login.php` displays no passwords or sample credentials.
  - Verify that `config.php` contains production credentials and is located in `/var/www/it-portal-private/config.php` (outside web root).
  - Confirm `config.php` is listed in `.gitignore` and has file permissions `640`.

- [ ] **Database & User Privilege Isolation:**
  - Database user is non-root with permissions restricted exclusively to `intranet_it_dashboard`.
  - Initial `Master` account created via `bin/create_master.php` with a password meeting the 10+ character policy.
  - No dummy or test accounts present in `users` table.

- [ ] **Network & Boundary Access:**
  - Port `8085` accessible only from authorized institute subnets (`192.168.0.0/16`, `10.0.0.0/8`, `172.16.0.0/12`).
  - UFW active on the server (`sudo ufw status verbose`).
  - Server confirmed to have no public IP, no DMZ exposure, and no external port-forwarding.

- [ ] **Web Server & File Blocking:**
  - Apache VirtualHost configured with port 8085 and `AllowOverride None`.
  - Access to `data/`, `config/`, `includes/`, `docs/`, `migrations/`, `bin/`, and `.git/` verified to return HTTP 403 Forbidden.
  - Direct downloads of `.sql`, `.sqlite`, `.md`, and `.log` files return HTTP 403 Forbidden.
  - Security headers active: `X-Content-Type-Options: nosniff`, `X-Frame-Options: DENY`, `Referrer-Policy: same-origin`, and strict CSP.

- [ ] **PHP Runtime Hardening:**
  - `display_errors = Off` in production `php.ini`.
  - `expose_php = Off`.
  - PHP error log configured outside the web root (`/var/log/php/it-portal-error.log`).
  - `upload_max_filesize = 2M` enforced.

- [ ] **Authentication & Session Controls:**
  - Brute-force lockout verified (5 failed attempts locks user/IP for 15 minutes).
  - Session idle timeout verified (30 minutes of inactivity terminates session).
  - Absolute session ceiling verified (8 hours maximum lifetime).
  - Cookies set with `HttpOnly`, `SameSite=Strict`, and `Secure` (when TLS enabled).

- [ ] **Role & Authorization Boundaries:**
  - `User` accounts cannot access write, update, delete, or import endpoints (server returns HTTP 403).
  - `User` role cannot access user management (`api/users.php`) or audit log (`api/audit.php`).
  - Deletions in `api/inventory.php` and `api/ip.php` operate strictly by primary ID and write audit logs.

- [ ] **Input & CSV Sanitization:**
  - CSV exports sanitize formula injection characters (`=`, `+`, `-`, `@`, `\t`, `\r`).
  - CSV imports reject files exceeding 2MB and validate MIME types.
  - Input fields validated against PHP server-side enums and regex patterns.

- [ ] **Automated Backups:**
  - Daily backup script `deploy/backup.sh` scheduled in cron.
  - Gzip dumps verified and 14-day rotation policy confirmed.
