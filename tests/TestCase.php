<?php

use App\User;
use Orchestra\Testing\ApplicationTestCase;
use Orchestra\Contracts\Installation\Installation;

abstract class TestCase extends ApplicationTestCase
{
    /**
     * Base application namespace.
     *
     * @var string
     */
    protected $baseNamespace = 'App';

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Get base path.
     *
     * @return string
     */
    protected function getBasePath()
    {
        return realpath(__DIR__.'/../');
    }

    /**
     * Install Orchestra Platform and get the administrator user.
     *
     * @return \App\User
     */
    protected function createAdminUser(Installation $installer = null)
    {
        if (is_null($installer)) {
            $installer = $this->makeInstaller();
        }

        $user = factory(User::class)->create();

        $installer->create($user, [
            'site_name' => 'Orchestra Platform',
            'email'     => 'hello@orchestraplatform.com',
        ]);

        $this->artisan('migrate');

        $this->app['orchestra.installed'] = true;

        $this->beforeApplicationDestroyed(function () {
            $this->app['orchestra.installed'] = false;
        });

        return $user;
    }
}
