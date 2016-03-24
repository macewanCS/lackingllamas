<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objectives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->string('ident');
            $table->integer('group')->unsigned();
            $table->boolean('bp');
            $table->integer('goal_id')->unsigned();
            $table->foreign('goal_id')->references('id')->on('goals');
              $table->foreign('group')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        if (Schema::hasTable('actions')) {
            Schema::table('actions', function (Blueprint $table) {
                $table->dropForeign('actions_objective_id_foreign');
                $table->dropForeign('actions_group_foreign');
                $table->dropForeign('actions_userId_foreign');
            });
        }
        Schema::table('objectives', function(Blueprint $table) {
            $table->dropForeign('objectives_goal_id_foreign');
            $table->dropForeign('objectives_group_foreign');
        });
        Schema::drop('objectives');
    }
}
