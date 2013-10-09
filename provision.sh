git pull
chmod -Rf 777 app/storage
chown -R www-data:www-data public/packages
chown -Rf www-data:www-data app/storage
echo "<?php return \"production\";" > bootstrap/env.php
composer install --no-dev
