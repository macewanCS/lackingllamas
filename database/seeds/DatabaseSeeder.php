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
        $this->call(TeamsAndDepartmentsSeeder::class);
        $this->call(GroupsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GoalsSeeder::class);
        $this->call(ObjectivesSeeder::class);
        $this->call(ActionSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(PermissionSeeder::class);
    }
}
