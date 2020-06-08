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
        //
    }

    public function boot()
    {
        // 数据库迁移
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
    }
}
