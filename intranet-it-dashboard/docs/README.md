# ICMR-NITHR Intranet IT Dashboard

Internal PHP 8.1 / MariaDB management portal for institutional IT inventory and network IP directory at ICMR-National Institute for Tribal Health Research, Jabalpur.

---

## Architecture & Technology

- **Backend:** Pure PHP 8.1+ with PDO and strict type declarations. No third-party frameworks.
- **Database:** MariaDB / MySQL (strict SQL mode enforced).
- **Frontend:** Vanilla JavaScript (zero external JS dependencies) and custom CSS styled to ICMR-NITHR identity (Navy `#123c65` and Saffron `#e36b37`).
- **Security:** CSRF tokens on all state-changing actions, session hardening, role-based authorization map, brute-force protection, input validation, and audit logging.

---

## Role Matrix

The portal defines two roles:

| Capability | Master | User |
| :--- | :---: | :---: |
| Browse Dashboard & Recent Records | ✓ | ✓ |
| Search & Filter IT Inventory | ✓ | ✓ |
| Search & Filter IP Directory | ✓ | ✓ |
| Export Filtered Datasets to CSV | ✓ | ✓ |
| Add & Edit Equipment / IP Records | ✓ | ✗ |
| Delete Records (Audited) | ✓ | ✗ |
| Batch CSV Import | ✓ | ✗ |
| User Provisioning & Password Resets | ✓ | ✗ |
| View & Export System Audit Trails | ✓ | ✗ |

---

## Local Development Setup (macOS / Linux)

1. **Configure Database:**
   Copy the example configuration:
   ```bash
   cp config/config.example.php config/config.php
   ```
   Set your local MySQL credentials in `config/config.php`.

2. **Initialize Schema:**
   Import `schema.sql` into your database:
   ```bash
   mysql -u root -p intranet_it_dashboard < schema.sql
   ```

3. **Provision Master Account:**
   Run the CLI provisioning script:
   ```bash
   php bin/create_master.php
   ```
   Enter the desired username and a password (minimum 10 characters).

4. **Start Development Server:**
   ```bash
   php -S 127.0.0.1:8000
   ```
   Open `http://127.0.0.1:8000` in your browser.

---

## Production Deployment

Production deployment is targeted for standalone internal Ubuntu servers running on port 8085 with strict subnet access. Full instructions, VirtualHost configs, and firewall policies are documented in [docs/DEPLOYMENT.md](DEPLOYMENT.md).

Prior to go-live, complete the verification items in [docs/SECURITY_CHECKLIST.md](SECURITY_CHECKLIST.md).
