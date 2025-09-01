#!/bin/sh
set -e

# Navigate to app root
cd /var/www/html

# If APP_URL is set but http, switch to https (Railway terminates TLS)
if [ -n "$APP_URL" ]; then
  APP_URL=$(echo "$APP_URL" | sed 's#^http://#https://#')
  export APP_URL
fi

# Ensure storage symlink exists (ignore if already present)
php artisan storage:link || true

# Clear old caches that may include stale env (e.g., DB_CONNECTION)
php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Rebuild database schema if there are pending migrations
php artisan migrate --force || true

# Rebuild caches using current Railway env vars
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Start PHP built-in server
exec php -S 0.0.0.0:8000 -t public
