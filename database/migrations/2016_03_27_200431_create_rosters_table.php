<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rosters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_ID')->unsigned();
            $table->integer('group_ID')->unsigned();

            $table->foreign('user_ID')->references('id')->on('users');
            $table->foreign('group_ID')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_comments', function(Blueprint $table) {
            $table->dropForeign('rosters_user_ID_foreign');
            $table->dropForeign('rosters_group_ID_foreign');
        });

        Schema::drop('groups');
    }
}
