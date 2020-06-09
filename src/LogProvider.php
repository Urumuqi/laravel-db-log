<?php
/**
 * dblog provider
 *
 * @author wuqi <wuqi226@gmail.com>
 */

namespace Urumuqi\DbLog;

use Illuminate\Support\ServiceProvider;

/**
 * Class LogProvider.
 */
class LogProvider extends ServiceProvider
{

    public function register()
    {
        // register to laravel service container as singleton
        $this->app->singleton('dblog', function () {
            return new Log;
        });
    }

    public function boot()
    {
        // migrations
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
    }
}
