#!/bin/sh
set -e

# Navigate to app root
cd /var/www/html

# Ensure storage symlink exists (ignore if already present)
php artisan storage:link || true

# Clear old caches that may include stale env (e.g., DB_CONNECTION)
php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Rebuild caches using current Railway env vars
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Optionally run migrations (uncomment if desired)
# php artisan migrate --force || true

# Start PHP built-in server
exec php -S 0.0.0.0:8000 -t public
