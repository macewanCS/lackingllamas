<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsAndDepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teamsAndDepartments')->insert([
            [
                'name' => 'IT Services Department',
                'description' => 'Provides technology related services',
                'Budget' => 435670,
                'team' => false,
            ],
            [
                'name' => 'Events Team',
                'description' => 'Provides events planning services',
                'Budget' => 10000,
                'team' => true,
            ],
            [
                'name' => 'Marketing',
                'description' => 'Provides marketing services',
                'Budget' => 23444,
                'team' => false,
            ],
            [
                'name' => 'Audit Services',
                'description' => 'Provides audit services',
                'Budget' => 23423,
                'team' => false,
            ],
            [
                'name' => 'Fund Development',
                'description' => 'Provides fund development services',
                'Budget' => 12500,
                'team' => true,
            ],
            [
                'name' => 'Volunteers',
                'description' => 'Provides volunteering services',
                'Budget' => 0,
                'team' => true,
            ],
            [
                'name' => 'Purchasing',
                'description' => 'Provides purchasing services',
                'Budget' => 102234,
                'team' => false,
            ],
            [
                'name' => 'DLI',
                'description' => 'Provides distance services',
                'Budget' => 105434,
                'team' => false,
            ],
            [
                'name' => 'Active Networks',
                'description' => 'Provides network services',
                'Budget' => 45000,
                'team' => false,
            ],
        ]);
    }
}
