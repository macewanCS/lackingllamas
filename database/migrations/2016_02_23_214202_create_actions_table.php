<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
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
            $table->integer('objective_id')->unsigned();
            $table->foreign('objective_id')->references('id')->on('objectives');
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
        if (Schema::hasTable('tasks')){
            Schema::table('tasks', function (Blueprint $table) {
                $table->dropForeign('tasks_action_id_foreign');
                $table->dropForeign('tasks_teamOrDeptId_foreign');
                $table->dropForeign('tasks_userId_foreign');
            });
         }
        Schema::table('actions', function (Blueprint $table) {
            $table->dropForeign('actions_objective_id_foreign');
            $table->dropForeign('actions_group_foreign');
            $table->dropForeign('actions_userId_foreign');
        });
        Schema::drop('actions');
    }
}
