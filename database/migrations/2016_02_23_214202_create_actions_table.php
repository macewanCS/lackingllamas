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
            $table->timestamp('date');
            $table->string('leads');
            $table->string('collaborators');
            $table->integer('budget');
            $table->text('projectPlan');
            $table->text('successMeasured');
            $table->integer('priority');
            $table->timestamps();
            $table->integer('objective_id')->unsigned();
             $table->foreign('objective_id')->references('id')->on('objectives');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('actions');
    }
}
