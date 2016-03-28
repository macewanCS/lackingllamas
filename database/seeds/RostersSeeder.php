<?php

use Illuminate\Database\Seeder;

class RostersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rosters')->insert([

            ['user_ID' => 1,
                'group_ID' => 1,],

            ['user_ID' => 2,
                'group_ID' => 1,],

            ['user_ID' => 3,
                'group_ID' => 1,],

            ['user_ID' => 4,
                'group_ID' => 1,],

            ['user_ID' => 5,
                'group_ID' => 1,],

            ['user_ID' => 6,
                'group_ID' => 1,],

            ['user_ID' => 2,
                'group_ID' => 2,],

            ['user_ID' => 4,
                'group_ID' => 2,],

            ['user_ID' => 3,
                'group_ID' => 3,],

            ['user_ID' => 6,
                'group_ID' => 3,],

            ['user _ID' => 1,
                'group_ID' => 4,],

            ['user_ID' => 3,
                'group_ID' => 4,],

            ['user_ID' => 4,
                'group_ID' => 4,],

            ['user_ID' => 5,
                'group_ID' => 5,],

            ['user_ID' => 6,
                'group_ID' => 6,],

            ['user_ID' => 4,
                'group_ID' => 7,],

            ['user_ID' => 5,
                'group_ID' => 7,],

            ['user_ID' => 5,
                'group_ID' => 8,],

            ['user_ID' => 1,
                'group_ID' => 9,],

            ['user_ID' => 2,
                'group_ID' => 9,],

            ['user_ID' => 3,
                'group_ID' => 9,],

            ['user_ID' => 4,
                'group_ID' => 9,],

            ['user_ID' => 5,
                'group_ID' => 9,],

            ['user_ID' => 6,
                'group_ID' => 9,]


        ]);
    }
}
