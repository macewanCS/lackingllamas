<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->date('date');
            $table->timestamps();
            $table->integer('userID')->unsigned();
            $table->integer('taskID')->unsigned();

            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('taskID')->references('id')->on('tasks');
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
            $table->dropForeign('task_comments_userID_foreign');
            $table->dropForeign('task_comments_taskID_foreign');
        });

        Schema::drop('task_comments');
    }
}
