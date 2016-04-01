<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            [
                'name' => 'IT Services Department',
                'description' => 'Provides technology related services',
                'Budget' => 435670,
                'team' => false,
                'user_ID' => 1,
            ],
            [
                'name' => 'Events Team',
                'description' => 'Provides events planning services',
                'Budget' => 10000,
                'team' => true,
                'user_ID' => 2,
            ],
            [
                'name' => 'Marketing',
                'description' => 'Provides marketing services',
                'Budget' => 23444,
                'team' => false,
                'user_ID' => 3,
            ],
            [
                'name' => 'Audit Services',
                'description' => 'Provides audit services',
                'Budget' => 23423,
                'team' => false,
                'user_ID' => 4,
            ],
            [
                'name' => 'Fund Development',
                'description' => 'Provides fund development services',
                'Budget' => 12500,
                'team' => true,
                'user_ID' => 5,
            ],
            [
                'name' => 'Volunteers',
                'description' => 'Provides volunteering services',
                'Budget' => 0,
                'team' => true,
                'user_ID' => 6,
            ],
            [
                'name' => 'Purchasing',
                'description' => 'Provides purchasing services',
                'Budget' => 102234,
                'team' => false,
                'user_ID' => 4,
            ],
            [
                'name' => 'DLI',
                'description' => 'Provides distance services',
                'Budget' => 105434,
                'team' => false,
                'user_ID' => 5,
            ],
            [
                'name' => 'Active Networks',
                'description' => 'Provides network services',
                'Budget' => 45000,
                'team' => false,
                'user_ID' => 1,
            ],
            [
                'name' => 'Project Team',
                'description' => 'Provides project support',
                'budget' => 55000,
                'team' => true,
                'user_ID' => 3
            ],
        ]);
    }
}