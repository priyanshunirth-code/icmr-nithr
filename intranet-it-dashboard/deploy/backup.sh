#!/usr/bin/env bash
set -euo pipefail

# Configuration
BACKUP_DIR="${BACKUP_DIR:-/var/backups/it-portal}"
DB_NAME="${DB_NAME:-intranet_it_dashboard}"
DB_USER="${DB_USER:-portal_backup}"
DB_PASS="${DB_PASS:-}"
RETENTION_DAYS=14
TIMESTAMP=$(date +"%Y%m%d_%H%M%S")
BACKUP_FILE="${BACKUP_DIR}/${DB_NAME}_${TIMESTAMP}.sql.gz"

mkdir -p "${BACKUP_DIR}"
chmod 700 "${BACKUP_DIR}"

# Execute dump with gzip
if [ -n "${DB_PASS}" ]; then
    MYSQL_PWD="${DB_PASS}" mysqldump -u "${DB_USER}" --single-transaction --quick "${DB_NAME}" | gzip > "${BACKUP_FILE}"
else
    mysqldump -u "${DB_USER}" --single-transaction --quick "${DB_NAME}" | gzip > "${BACKUP_FILE}"
fi

chmod 600 "${BACKUP_FILE}"

# Rotate backups older than retention window
find "${BACKUP_DIR}" -name "${DB_NAME}_*.sql.gz" -type f -mtime +"${RETENTION_DAYS}" -delete

echo "[$(date -Iseconds)] Backup complete: ${BACKUP_FILE}"
