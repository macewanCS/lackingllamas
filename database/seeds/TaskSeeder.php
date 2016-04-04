-<?php

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
                'budget' => 1000,
                'successMeasured' => 'Relevant recommendations have been implemented',
                'progress' => 0,
                'action_id' => 1,
                'group' => 1,
                'userId' => 1
            ],
            ['description' => 'Upgrade LibOnline to the latest version (4.9)',
                'date' => Carbon::createFromDate(2016, 1, 1, 'America/Toronto'),
                'collaborators' => 'Active Networks',
                'budget' => 500,
                'successMeasured' => 'All PCs are upgraded to LibOnline 4.9',
                'progress' => 0,
                'action_id' => 1,
                'group' => 1,
                'userId' => 2
            ],
            ['description' => 'Provide planning assistance to the Customer Payments team to implement the necessary changes to support a Fine Free day',
                'date' => Carbon::createFromDate(2016, 3, 1, 'America/Toronto'),
                'collaborators' => 'Fund Development, Audit Services',
                'budget' => 4300,
                'successMeasured' => 'Customer Payments team received assistance to implement changes to support a Fine Free day',
                'progress' => 0,
                'action_id' => 2,
                'group' => 1,
                'userId' => 2
            ],
            ['description' => 'Aid in the selection, purchase, and configuration of equipment for the fourth literacy van',
                'date' => Carbon::createFromDate(2016, 9, 9, 'America/Toronto'),
                'collaborators' => 'Alex Carruters, Elaine Jones',
                'budget' => 4300,
                'successMeasured' => 'Fourth literacy van equipment was purchased',
                'progress' => 0,
                'action_id' => 3,
                'group' => 1,
                'userId' => 1
            ],

            ['description' => 'Get speaker for TED talk',
                'date' => Carbon::createFromDate(2016, 8, 9, 'America/Toronto'),
                'collaborators' => 'Alex Carruters, Elaine Jones',
                'budget' => 10000,
                'successMeasured' => 'A speaker has agreed to speak at EPL',
                'progress' => 0,
                'action_id' => 9,
                'group' => 2,
                'userId' => 4
            ],

            ['description' => 'Promote TED talk',
                'date' => Carbon::createFromDate(2016, 8, 9, 'America/Toronto'),
                'collaborators' => 'Alex Carruters, Elaine Jones',
                'budget' => 10000,
                'successMeasured' => 'A speaker has agreed to speak at EPL',
                'progress' => 0,
                'action_id' => 9,
                'group' => 3,
                'userId' => 6
            ],

            ['description' => 'Review Q3 financial status',
                'date' => Carbon::createFromDate(2016, 7, 12, 'America/Toronto'),
                'collaborators' => 'Purchasing',
                'budget' => 150,
                'successMeasured' => 'Q3 Financial Status section in document is completed',
                'progress' => 0,
                'action_id' => 10,
                'group' => 5,
                'userId' => 4
            ],

            ['description' => 'Review Q4 financial status',
                'date' => Carbon::createFromDate(2016, 7, 13, 'America/Toronto'),
                'collaborators' => 'Purchasing',
                'budget' => 150,
                'successMeasured' => 'Q4 Financial Status section in document is completed',
                'progress' => 0,
                'action_id' => 10,
                'group' => 5,
                'userId' => 4
            ],

            ['description' => 'Purchase VR kits',
                'date' => Carbon::createFromDate(2016, 5, 12, 'America/Toronto'),
                'collaborators' => 'Vicky Varga',
                'budget' => 25000,
                'successMeasured' => '10 VR units have been acquired',
                'progress' => 1,
                'action_id' => 11,
                'group' => 7,
                'userId' => 5
            ],

            ['description' => 'Promote VR Event',
                'date' => Carbon::createFromDate(2016, 4, 21, 'America/Toronto'),
                'collaborators' => 'Vicky Varga',
                'budget' => 10000,
                'successMeasured' => '10 VR units have been acquired',
                'progress' => 1,
                'action_id' => 11,
                'group' => 3,
                'userId' => 5
            ],

            ['description' => 'Create internal documentation for each profile (i.e. Early literacy and Mini-makerspace) applied to EPL iPads',
                'date' => Carbon::createFromDate(2016, 6, 21, 'America/Toronto'),
                'collaborators' => 'Purchasing, DLI',
                'budget' => 4000,
                'successMeasured' => 'Documentation is created and shared with the IT department',
                'progress' => 0,
                'action_id' => 17,
                'group' => 1,
                'userId' => 1
            ],

            ['description' => 'Develop and implement an implementation plan for rolling EPL\'s Mobile Device Management tool out to all pre-existing kit iPads',
                'date' => Carbon::createFromDate(2016, 7, 11, 'America/Toronto'),
                'collaborators' => 'Volunteers',
                'budget' => 5000,
                'successMeasured' => 'MDM implemented on all kit laptops',
                'progress' => 0,
                'action_id' => 17,
                'group' => 1,
                'userId' => 1
            ],

            ['description' => 'Complete a cost/benefit analysis of using EPL\'s MDM to secure manager iPads',
                'date' => Carbon::createFromDate(2016, 7, 11, 'America/Toronto'),
                'collaborators' => 'Volunteers',
                'budget' => 3000,
                'successMeasured' => 'Report Completed',
                'progress' => 0,
                'action_id' => 17,
                'group' => 1,
                'userId' => 1
            ],

            ['description' => 'Develop a test plan to determine if EPL is ready to move to Windows 10',
                'date' => Carbon::createFromDate(2016, 4, 11, 'America/Toronto'),
                'collaborators' => 'Volunteers, DLI',
                'budget' => 1200,
                'successMeasured' => 'Test plan completed and recommendation forwarded',
                'progress' => 1,
                'action_id' => 18,
                'group' => 1,
                'userId' => 1
            ],

            ['description' => 'Determine the budget implications of upgrading to Windows 10',
                'date' => Carbon::createFromDate(2016, 4, 11, 'America/Toronto'),
                'collaborators' => 'DLI, J McPhee',
                'budget' => 100,
                'successMeasured' => 'Analysis completed',
                'progress' => 1,
                'action_id' => 18,
                'group' => 1,
                'userId' => 1
            ],

            ['description' => 'Develop a deployment/upgrade plan to migrate to Windows 10 if appropriate',
                'date' => Carbon::createFromDate(2016, 4, 11, 'America/Toronto'),
                'collaborators' => 'Project Team, Jody Crilly, Elaine Jones',
                'budget' => 100,
                'successMeasured' => 'Plan completed',
                'progress' => 1,
                'action_id' => 18,
                'group' => 1,
                'userId' => 1
            ],

            ['description' => 'Order monitors, PCs, and laptops due for replacement in 2016',
                'date' => Carbon::createFromDate(2016, 3, 31, 'America/Toronto'),
                'collaborators' => 'Active Networks, Marketing',
                'budget' => 40000,
                'successMeasured' => 'Equipment ordered',
                'progress' => 2,
                'action_id' => 19,
                'group' => 1,
                'userId' => 1
            ],

            ['description' => 'Replace 184 monitors ',
                'date' => Carbon::createFromDate(2016, 3, 31, 'America/Toronto'),
                'collaborators' => 'Fund Development, Active Networks',
                'budget' => 20000,
                'successMeasured' => 'Monitors deployed',
                'progress' => 2,
                'action_id' => 19,
                'group' => 1,
                'userId' => 1
            ],

            ['description' => 'Replace 237 PCs',
                'date' => Carbon::createFromDate(2016, 5, 31, 'America/Toronto'),
                'collaborators' => 'Fund Development',
                'budget' => 20000,
                'successMeasured' => 'PCs deployed',
                'progress' => 1,
                'action_id' => 19,
                'group' => 1,
                'userId' => 1
            ],

            ['description' => 'Replace 32 laptops',
                'date' => Carbon::createFromDate(2016, 7, 31, 'America/Toronto'),
                'collaborators' => 'DLI, Fund Development',
                'budget' => 10000,
                'successMeasured' => 'Laptops deployed',
                'progress' => 0,
                'action_id' => 19,
                'group' => 1,
                'userId' => 1
            ],

            ['description' => 'Collaborate with DLI on how to expend the $5356 allocated for replacing aging sandbox devices',
                'date' => Carbon::createFromDate(2016, 9, 31, 'America/Toronto'),
                'collaborators' => 'DLI, Audit Services',
                'budget' => 100,
                'successMeasured' => 'Equipment selected and deployed',
                'progress' => 0,
                'action_id' => 19,
                'group' => 1,
                'userId' => 1
            ],

            ['description' => 'Determine how to expend the $4848 allotted for projector upgrades in IT’s capital budget',
                'date' => Carbon::createFromDate(2016, 10, 31, 'America/Toronto'),
                'collaborators' => 'Purchasing, Fund Development',
                'budget' => 100,
                'successMeasured' => 'Equipment selected and deployed',
                'progress' => 0,
                'action_id' => 19,
                'group' => 1,
                'userId' => 1
            ],

            ['description' => 'Support the ELF team\'s evaluation of the early literacy iPad pilot and purchase hardware to replace AWE\'s',
                'date' => Carbon::createFromDate(2016, 4, 31, 'America/Toronto'),
                'collaborators' => 'Project Team, Events Team',
                'budget' => 235,
                'successMeasured' => 'Hardware purchased and deployed',
                'progress' => 1,
                'action_id' => 20,
                'group' => 1,
                'userId' => 1
            ],

            ['description' => 'Upgrade Minecraft EDU on the public PCs to match the version used on the kit laptops',
                'date' => Carbon::createFromDate(2016, 2, 31, 'America/Toronto'),
                'collaborators' => 'DLI, Active Networks',
                'budget' => 5000,
                'successMeasured' => 'Minecraft upgraded',
                'progress' => 2,
                'action_id' => 20,
                'group' => 1,
                'userId' => 1
            ],

            ['description' => 'Complete configurations to allow access to gaming via Steam over WiFi',
                'date' => Carbon::createFromDate(2016, 10, 31, 'America/Toronto'),
                'collaborators' => 'DLI',
                'budget' => 100,
                'successMeasured' => 'Steam access allowed',
                'progress' => 0,
                'action_id' => 20,
                'group' => 1,
                'userId' => 1
            ],

            ['description' => 'Provide support for DLI\'s League of Legends tournament pilot',
                'date' => Carbon::createFromDate(2016, 8, 31, 'America/Toronto'),
                'collaborators' => 'Audit Services',
                'budget' => 4000,
                'successMeasured' => 'Equipment selected and deployed',
                'progress' => 0,
                'action_id' => 20,
                'group' => 1,
                'userId' => 1
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
