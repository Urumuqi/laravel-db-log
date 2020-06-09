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
        Schema::create(self::$tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('biz_tag', 64)->comment('业务标签');
            $table->string('action_tag', 64)->comment('操作标签');
            $table->string('operator', 64)->comment('操作人');
            $table->string('track_key', 64)->comment('追踪标签');
            $table->json('log_content')->comment('日志内容');
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
