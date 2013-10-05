git pull
chmod -Rf 777 app/storage
echo "<?php return \"production\";" > bootstrap/env.php
composer install --no-dev

