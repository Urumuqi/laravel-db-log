<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * laravel db log migration.
 */
class LaravelDbLog extends Migration
{

    /**
     * table name.
     *
     * @var string
     */
    private static $tableName = 'db_log';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(self::$tableName, function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->addColumn('varchar(64)', 'biz_tag')->comment('业务标签');
            $table->addColumn('varchar(64', 'action_tag')->comment('操作标签');
            $table->addColumn('varchar(64)', 'operator')->comment('操作人');
            $table->addColumn('varchar(64)', 'track_key')->comment('追踪标签');
            $table->addColumn('json', 'log_content')->comment('日志内容');
            $table->dateTime('created_at')->comment('创建时间format:yyyy-mm-dd HH:ii:ss');
            $table->dateTime('created_date')->comment('创建日期format:yyy-mm-dd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop(self::$tableName);
    }
}
