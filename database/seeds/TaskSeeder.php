<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            ['description' => 'Implement approved recommendations from the 2015 Public Computing Report',
                'date' => Carbon::createFromDate(2012, 3, 1, 'America/Toronto'),
                'collaborators' => 'IT Project Team',
                'budget' => 0,
                'successMeasured' => '',
                'progress' => 0,
                'action_id' => 1,
                'group' => 1,
                'userId' => 1
            ],
            ['description' => 'Upgrade LibOnline to the latest version (4.9)',
                'date' => Carbon::createFromDate(2012, 1, 1, 'America/Toronto'),
                'collaborators' => 'Active Networks',
                'budget' => 0,
                'successMeasured' => '',
                'progress' => 0,
                'action_id' => 1,
                'group' => 1,
                'userId' => 2
            ],
            ['description' => 'Provide planning assistance to the Customer Payments team to implement the necessary changes to support a Fine Free day',
                'date' => Carbon::createFromDate(2012, 3, 1, 'America/Toronto'),
                'collaborators' => '',
                'budget' => 0,
                'successMeasured' => '',
                'progress' => 0,
                'action_id' => 2,
                'group' => 1,
                'userId' => 2
            ],
            ['description' => 'Aid in the selection, purchase, and configuration of equipment for the fourth literacy van',
                'date' => Carbon::createFromDate(2012, 9, 9, 'America/Toronto'),
                'collaborators' => 'Kalil, Robin, Any',
                'budget' => 0,
                'successMeasured' => '',
                'progress' => 0,
                'action_id' => 3,
                'group' => 1,
                'userId' => 1
            ]
        ]);

        for ($j = 1; $j <= App\Action::All()->Count(); $j++){
            global $act;
            $act = DB::table('actions')->where('id', $j)->first();
            for ($i = 1, $k = 1; $i <= App\Task::All()->Count(); $i++) {
                $task = DB::table('tasks')
                    ->where('id', $i)
                    ->first();
                if ($task->action_id == $act->id) {
                    DB::table('tasks')
                        ->where('id', $i)
                        ->update(array('ident' => $act->ident . '.' . $k));
                    $k++;
                }
            }
        }
    }
}
