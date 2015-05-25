#!/usr/bin/env bash

/usr/bin/mysql -uroot -p$1 -e "CREATE DATABASE IF NOT EXISTS orchestraplatform;"

cd /vagrant

if [ -f storage/framework/compiled.php ]; then
    rm storage/framework/compiled.php
    echo ">>> Remove compiled.php"
fi

if [ ! -f .env ]; then
    cat ./resources/provision/.env.vagrant > .env
fi

composer install --prefer-dist --dev
