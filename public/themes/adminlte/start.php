<?php defined('LARAVEL_START') or die('No direct script access allowed');

$app = app();
set_meta('ADMINLTE::SKIN', 'skin-blue');

if (! $app->bound('orchestra.avatar')) {
    $app->register('Orchestra\Avatar\AvatarServiceProvider');
}
