<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->date('date');
            $table->string('collaborators');
            $table->integer('budget');
            $table->text('successMeasured');
            $table->integer('progress');
            $table->timestamps();
            $table->string('ident');
            $table->integer('group')->unsigned();
            $table->integer('userId')->unsigned();
            $table->integer('action_id')->unsigned();
            $table->foreign('action_id')->references('id')->on('actions');
            $table->foreign('group')->references('id')->on('groups');
            $table->foreign('userId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function(Blueprint $table) {
            $table->dropForeign('tasks_action_id_foreign');
            $table->dropForeign('tasks_group_foreign');
            $table->dropForeign('tasks_userId_foreign');
        });
        Schema::drop('tasks');
    }
}
