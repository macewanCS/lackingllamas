<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ObjectivesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('objectives')->insert([
            ['name' => 'We Identify and meet community needs', 'goal_id' => 1],
            ['name' => 'We Reduce barriers to accessing library services', 'goal_id' => 1],
            ['name' => 'Online services are highly used and valued', 'goal_id' => 2],
            ['name' => 'Together with our community we provide successful, meaningful services that are highly rates and heavily used', 'goal_id' => 1],
        ]);
    }
}
