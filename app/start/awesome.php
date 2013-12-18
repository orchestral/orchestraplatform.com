<?php

use Monolog\Handler\HipChatHandler;
use Monolog\Logger;

$token = Config::get('monolog.hipchat.token');
$room  = Config::get('monolog.hipchat.room');

if (! (is_null($token) and is_null($room)) {
    $hipchat = new HipChatHandler($token, $room, 'Monolog', true, Logger::INFO);

    Log::getMonolog()->pushHandler($hipchat);
}
