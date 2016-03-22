<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->date('date');
            $table->timestamps();
            $table->integer('user_ID')->unsigned();
            $table->integer('action_ID')->unsigned();

            $table->foreign('user_ID')->references('id')->on('users');
            $table->foreign('action_ID')->references('id')->on('actions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('action_comments', function(Blueprint $table) {
            $table->dropForeign('action_comments_user_ID_foreign');
            $table->dropForeign('action_comments_action_ID_foreign');
        });

        Schema::drop('action_comments');
    }
}
