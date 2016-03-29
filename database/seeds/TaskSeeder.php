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
                'date' => Carbon::createFromDate(2016, 3, 1, 'America/Toronto'),
                'collaborators' => 'IT Project Team',
                'budget' => 0,
                'successMeasured' => '',
                'progress' => 0,
                'action_id' => 1,
                'group' => 1,
                'userId' => 1
            ],
            ['description' => 'Upgrade LibOnline to the latest version (4.9)',
                'date' => Carbon::createFromDate(2016, 1, 1, 'America/Toronto'),
                'collaborators' => 'Active Networks',
                'budget' => 0,
                'successMeasured' => '',
                'progress' => 0,
                'action_id' => 1,
                'group' => 1,
                'userId' => 2
            ],
            ['description' => 'Provide planning assistance to the Customer Payments team to implement the necessary changes to support a Fine Free day',
                'date' => Carbon::createFromDate(2016, 3, 1, 'America/Toronto'),
                'collaborators' => '',
                'budget' => 0,
                'successMeasured' => '',
                'progress' => 0,
                'action_id' => 2,
                'group' => 1,
                'userId' => 2
            ],
            ['description' => 'Aid in the selection, purchase, and configuration of equipment for the fourth literacy van',
                'date' => Carbon::createFromDate(2016, 9, 9, 'America/Toronto'),
                'collaborators' => 'Alex Carruters, Elaine Jones',
                'budget' => 0,
                'successMeasured' => '',
                'progress' => 0,
                'action_id' => 3,
                'group' => 1,
                'userId' => 1
            ],

            ['description' => 'Get speaker for TED talk',
                'date' => Carbon::createFromDate(2016, 8, 9, 'America/Toronto'),
                'collaborators' => 'Alex Carruters, Elaine Jones',
                'budget' => 0,
                'successMeasured' => 'A speaker has agreed to speak at EPL',
                'progress' => 0,
                'action_id' => 9,
                'group' => 2,
                'userId' => 4
            ],

            ['description' => 'Promote TED talk',
                'date' => Carbon::createFromDate(2016, 8, 9, 'America/Toronto'),
                'collaborators' => 'Alex Carruters, Elaine Jones',
                'budget' => 0,
                'successMeasured' => 'A speaker has agreed to speak at EPL',
                'progress' => 0,
                'action_id' => 9,
                'group' => 3,
                'userId' => 6
            ],

            ['description' => 'Review Q3 financial status',
                'date' => Carbon::createFromDate(2016, 7, 12, 'America/Toronto'),
                'collaborators' => 'Purchasing',
                'budget' => 0,
                'successMeasured' => 'Q3 Financial Status section in document is completed',
                'progress' => 0,
                'action_id' => 10,
                'group' => 5,
                'userId' => 4
            ],

            ['description' => 'Review Q4 financial status',
                'date' => Carbon::createFromDate(2016, 7, 13, 'America/Toronto'),
                'collaborators' => 'Purchasing',
                'budget' => 0,
                'successMeasured' => 'Q4 Financial Status section in document is completed',
                'progress' => 0,
                'action_id' => 10,
                'group' => 5,
                'userId' => 4
            ],

            ['description' => 'Purchase VR kits',
                'date' => Carbon::createFromDate(2016, 5, 12, 'America/Toronto'),
                'collaborators' => 'Vicky Varga',
                'budget' => 1,
                'successMeasured' => '10 VR units have been acquired',
                'progress' => 1,
                'action_id' => 11,
                'group' => 7,
                'userId' => 5
            ],

            ['description' => 'Promote VR Event',
                'date' => Carbon::createFromDate(2016, 4, 21, 'America/Toronto'),
                'collaborators' => 'Vicky Varga',
                'budget' => 1,
                'successMeasured' => '10 VR units have been acquired',
                'progress' => 1,
                'action_id' => 11,
                'group' => 3,
                'userId' => 5
            ],




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
