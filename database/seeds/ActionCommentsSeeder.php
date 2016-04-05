<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ActionCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('action_comments')->insert([
            ['description' => 'Waiting for the go ahead from J McPhee before we begin',
                'date' => Carbon::createFromDate(2016, 1, 4, 'America/Toronto'),
                'user_ID' => 4,
                'action_ID' => 10,
                'created_at' => Carbon::now()
            ],
            ['description' => 'OK - We are good to go',
                'date' => Carbon::createFromDate(2016, 1, 17, 'America/Toronto'),
                'user_ID' => 2,
                'action_ID' => 10,
                'created_at' => Carbon::now()
            ],
            ['description' => 'I got responses from Tai Lopez, Elon Musk, Ken Robinson, and Susan Cain. Any Preferences?',
                'date' => Carbon::createFromDate(2016, 2, 4, 'America/Toronto'),
                'user_ID' => 5,
                'action_ID' => 9,
                'created_at' => Carbon::now()
            ],
            ['description' => 'Tai Lopez, easily',
                'date' => Carbon::createFromDate(2016, 2, 6, 'America/Toronto'),
                'user_ID' => 2,
                'action_ID' => 9,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
