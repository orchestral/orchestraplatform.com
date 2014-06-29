cd /vagrant

if [ -f bootstrap/compiled.php ]; then
    rm bootstrap/compiled.php
    echo ">>> Remove compiled.php"
fi

echo "<?php return \"local\";" > bootstrap/environment.php
composer install --prefer-dist --dev
