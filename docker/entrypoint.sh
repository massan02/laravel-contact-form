#!/bin/sh

set -eu

if [ ! -f .env ]; then
    cp .env.example .env
fi

composer install --no-interaction

if ! grep -q '^APP_KEY=.' .env; then
    php artisan key:generate --force
fi

php artisan migrate --force

exec "$@"