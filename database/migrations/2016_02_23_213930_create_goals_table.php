<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->string('ident');
            $table->integer('group')->unsigned();
            $table->boolean('bp');
            $table->integer('bpid')->unsigned();
            $table->foreign('bpid')->references('id')->on('businessPlans');
            $table->foreign('group')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('objectives')) {
            Schema::table('objectives', function (Blueprint $table) {
                $table->dropForeign('objectives_goal_id_foreign');
                $table->dropForeign('objectives_teamOrDeptId_foreign');
            });
        }
        Schema::table('goals', function(Blueprint $table) {
            $table->dropForeign('goals_teamOrDeptId_foreign');
        });
        Schema::drop('goals');
    }
}
