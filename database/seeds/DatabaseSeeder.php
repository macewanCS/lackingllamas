<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BusinessPlanSeeder::class);
        $this->call(GoalsSeeder::class);
        $this->call(ObjectivesSeeder::class);
        $this->call(ActionSeeder::class);
        $this->call(TaskSeeder::class);
    }
}
