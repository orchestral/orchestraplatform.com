#!/usr/bin/env bash

/usr/bin/mysql -uroot -p$1 -e "CREATE DATABASE IF NOT EXISTS orchestraplatform;"

cd /vagrant

if [ -f storage/meta/compiled.php ]; then
    rm storage/meta/compiled.php
    echo ">>> Remove compiled.php"
fi

echo "<?php return \"local\";" > bootstrap/environment.php
composer install --prefer-dist --dev
