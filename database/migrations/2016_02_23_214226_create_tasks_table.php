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
            $table->description('description');
            $table->timestamp('date');
            $table->string('leads');
            $table->string('collaborators');
            $table->integer('budget');
            $table->text('projectPlan');
            $table->text('successMeasured');
            $table->integer('priority');
            $table->timestamps();
             $table->foreign('action_id')->references('id')->on('actions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
