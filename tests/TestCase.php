<?php namespace TestCase;

class TestCase extends \Orchestra\Foundation\Testing\TestCase
{
    protected function getBasePath()
    {
        return realpath(__DIR__.'/../');
    }

    protected function getApplicationProviders()
    {
        $config = require __DIR__.'/../config/app.php';

        return $config['providers'];
    }

    protected function getApplicationAliases()
    {
        $config = require __DIR__.'/../config/app.php';

        return $config['aliases'];
    }
}
