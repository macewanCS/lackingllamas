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
            $table->integer('user_ID')->unsigned();
            $table->integer('task_ID')->unsigned();

            $table->foreign('user_ID')->references('id')->on('users');
            $table->foreign('task_ID')->references('id')->on('tasks')->onDelete('cascade');
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
            $table->dropForeign('task_comments_user_ID_foreign');
            $table->dropForeign('task_comments_task_ID_foreign');
        });

        Schema::drop('task_comments');
    }
}
