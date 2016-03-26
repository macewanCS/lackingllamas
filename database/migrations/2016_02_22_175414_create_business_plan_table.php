<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_plans', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->date('created');
            $table->date('ending')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('goals')) {
            Schema::table('goals', function (Blueprint $table) {
                $table->dropForeign('goals_bpid_foreign');
            });
        }
        Schema::drop('businessPlans');
    }
}
