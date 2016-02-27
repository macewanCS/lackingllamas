<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BusinessPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('businessPlans')->insert([
            [
                'name' => 'Business Plan 2012 - 2016',
                'created' => Carbon::createFromDate(2012, 1, 1, 'America/Toronto'),
                'ending' => Carbon::createFromDate(2016, 12 , 31, 'America/Toronto')
            ]
        ]);
    }
}
