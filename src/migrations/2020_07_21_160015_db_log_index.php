<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbLogIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('db_log', function (Blueprint $table) {
            $table->index('biz_tag', 'idx_big');
            $table->index('action_tag', 'idx_action');
            $table->index('operator', 'idx_operator');
            $table->index('track_key', 'idx_track');
            $table->index('created_date', 'idx_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
