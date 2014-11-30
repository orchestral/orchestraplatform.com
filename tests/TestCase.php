<?php namespace TestCase;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Get application timezone.
     *
     * @return string
     */
    protected function getApplicationTimezone($app)
    {
        return $app['config']['app.timezone'];
    }

     /**
     * Get application aliases.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getApplicationAliases($app)
    {
        return $app['config']['app.aliases'];
    }

    /**
     * Get application providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getApplicationProviders($app)
    {
        return $app['config']['app.providers'];
    }

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
     * Resolve application Console Kernel implementation.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function resolveApplicationConsoleKernel($app)
    {
        $app->singleton('Illuminate\Contracts\Console\Kernel', 'App\Console\Kernel');
    }

    /**
     * Resolve application HTTP Kernel implementation.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function resolveApplicationHttpKernel($app)
    {
        $app->singleton('Illuminate\Contracts\Http\Kernel', 'App\Http\Kernel');
    }

    /**
     * Resolve application core implementation.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function resolveApplicationCore($app)
    {
        parent::resolveApplicationCore($app);

        $app->singleton('Illuminate\Contracts\Debug\ExceptionHandler', 'App\Exceptions\Handler');
    }
}
