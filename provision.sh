php artisan down
supervisorctl stop all
git pull
git submodule update
chmod -Rf 777 app/storage
chown -R www-data:www-data app/storage
echo "<?php return \"production\";" > bootstrap/env.php
composer install --no-dev
chown -R www-data:www-data public/packages
supervisorctl start all
php artisan up
