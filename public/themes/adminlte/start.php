<?php defined('LARAVEL_START') or die('No direct script access allowed');

set_meta('ADMINLTE::SKIN', 'skin-blue');

if (! App::bound('orchestra.avatar') && class_exists('Orchestra\Avatar\AvatarServiceProvider')) {
    App::register('Orchestra\Avatar\AvatarServiceProvider');
}
