<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actions')->insert([
            ['description' => 'Review public computing needs and develop strategies to meet those needs.',
                'date' => Carbon::createFromDate(2014, 1, 1, 'America/Toronto'),
                'collaborators' => 'IT Services Department, DLI',
                'budget' => 300,
                'successMeasured' => 'Achieve an 90% satisfaction rating; Increase computer usage by 20%',
                'progress' => 0,
                'objective_id' => 1,
                'group' => 1,
                'userId' => 1,
            ],
            ['description' => 'Establish a fine-free day to take place every second year.',
                'date' => Carbon::createFromDate(2016, 1, 1, 'America/Toronto'),
                'collaborators' => 'Marketing',
                'budget' => 500,
                'successMeasured' => 'The board has approved the proposed day',
                'progress' => 0,
                'objective_id' => 2,
                'group' => 1,
                'userId' => 1
            ],
             ['description' => 'Extend literacy van services to under served communities in Edmonton and surrounding areas.',
                 'date' => Carbon::createFromDate(2015, 1, 1, 'America/Toronto'),
                'collaborators' => 'Marketing',
                'budget' => 1200,
                'successMeasured' => 'Increased use and knowledge of EPL services in underserved communities',
                'progress' => 0,
                 'objective_id' => 2,
                 'group' => 1,
                 'userId' => 1
            ],
            ['description' => 'Live stream two forward thinking speaker series events in 2016',
                'date' => Carbon::createFromDate(2016, 1, 1, 'America/Toronto'),
                'collaborators' => 'Marketing, IT Services Department, DLI',
                'budget' => 5000,
                'successMeasured' => 'Over 500 people watching live and 5,000 video hits.',
                'progress' => 2,
                'objective_id' => 3,
                'group' => 1,
                'userId' => 1
            ],
            ['description' => 'Host EPL Day celebrations at all branches on March 13, 2016.',
                'date' => Carbon::createFromDate(2016, 3, 13, 'America/Toronto'),
                'collaborators' => 'Marketing, Purchasing',
                'budget' => 10000,
                'successMeasured' => 'Increase in customer visits year over year',
                'progress' => 2,
                'objective_id' => 4,
                'group' => 2,
                'userId' => 1
            ],
            ['description' => 'Evaluate the 2016 event and create a proposal for the 2017 by November 30, 2016.',
                'date' => Carbon::createFromDate(2017, 11, 30, 'America/Toronto'),
                'collaborators' => 'Marketing',
                'budget' => 100,
                'successMeasured' => 'A report consisting of the 2016 was created, and the proposal for the next event was created.',
                'progress' => 2,
                'objective_id' => 4,
                'group' => 2,
                'userId' => 2
            ],
            ['description' => 'Host a guest speaker during Freedom to Read Week related to intellectual freedom',
                'date' => Carbon::createFromDate(2016, 2, 25, 'America/Toronto'),
                'collaborators' => 'Marketing, Audit Services, Fund Development, Volunteers',
                'budget' => 2000,
                'successMeasured' => 'Sold out event, full venue and 100% sell through of fund development seats. ',
                'progress' => 1,
                'objective_id' => 5,
                'group' => 2,
                'userId' => 4
            ],
            ['description' => 'Host Reza Aslan to speak on confronting islamaphobia on May 18, 2016',
                'date' => Carbon::createFromDate(2016, 5, 18, 'America/Toronto'),
                'collaborators' => 'Marketing',
                'budget' => 15000,
                'successMeasured' => 'Sold out event, full venue and 100% sell through of fund development seats. ',
                'progress' => 3,
                'objective_id' => 5,
                'group' => 2,
                'userId' => 3
            ],

            ['description' => 'Host a TED talk to promote artistic freedom',
                'date' => Carbon::createFromDate(2016, 10, 23, 'America/Toronto'),
                'collaborators' => 'IT Services Department, Marketing',
                'budget' => 20000,
                'successMeasured' => 'All public PCs are upgraded to Windows 10 ',
                'progress' => 1,
                'objective_id' => 5,
                'group' => 2,
                'userId' => 5
            ],

            ['description' => 'Review Q3 and Q4 2015 financial status',
                'date' => Carbon::createFromDate(2016, 3, 4, 'America/Toronto'),
                'collaborators' => 'J McPhee',
                'budget' => 100,
                'successMeasured' => 'A report on Q3 and Q4 2015 finances of EPL was generated ',
                'progress' => 0,
                'objective_id' => 2,
                'group' => 4,
                'userId' => 4
            ],

            ['description' => 'Promote virtual reality by holding Oculus Rift & HTC Vive publicity events',
                'date' => Carbon::createFromDate(2016, 6, 2, 'America/Toronto'),
                'collaborators' => 'Jody Crilly',
                'budget' => 35000,
                'successMeasured' => 'Host 2 events in 2016 where people can demo virtual reality',
                'progress' => 0,
                'objective_id' => 6,
                'group' => 4,
                'userId' => 4
            ],

            ['description' => 'Ask public for feedback on possible logos',
                'date' => Carbon::createFromDate(2016, 5, 21, 'America/Toronto'),
                'collaborators' => 'Jody Crilly',
                'budget' => 200,
                'successMeasured' => 'Results of poll are in with at least 1000 participants',
                'progress' => 0,
                'objective_id' => 8,
                'group' => 4,
                'userId' => 4
            ],

            ['description' => 'Design possible EPL logos',
                'date' => Carbon::createFromDate(2016, 4, 2, 'America/Toronto'),
                'collaborators' => 'Fund Development',
                'budget' => 5000,
                'successMeasured' => '3 or 4 possible new logos are created',
                'progress' => 0,
                'objective_id' => 8,
                'group' => 4,
                'userId' => 4
            ],

            ['description' => 'Communicate with eBook distributors to gain access to new eBooks',
                'date' => Carbon::createFromDate(2016, 8, 2, 'America/Toronto'),
                'collaborators' => 'DLI, Purchasing',
                'budget' => 5000,
                'successMeasured' => '2 or more distributors have been successfully committed to providing eBooks',
                'progress' => 0,
                'objective_id' => 7,
                'group' => 4,
                'userId' => 4
            ],
           ['description' => 'Obtain $40,000 in sponsorships through the FTSS in 2016',
                'date' => Carbon::createFromDate(2016, 8, 2, 'America/Toronto'),
                'collaborators' => 'DLI, Purchasing',
                'budget' => 500,
                'successMeasured' => '$40,000 in event sponsorships.',
                'progress' => 0,
                'objective_id' => 9,
                'group' => 4,
                'userId' => 4
            ],

            ['description' => 'Bonus for individuals who display best service in the month',
                'date' => Carbon::createFromDate(2016, 4, 2, 'America/Toronto'),
                'collaborators' => 'Fund Development',
                'budget' => 12000,
                'successMeasured' => 'Individuals communicate their happiness with the service',
                'progress' => 0,
                'objective_id' => 10,
                'group' => 4,
                'userId' => 4
            ],

            ['description' => 'Mobile Device Management (MDM) documentation and roll out',
                'date' => Carbon::createFromDate(2016, 3, 15, 'America/Toronto'),
                'collaborators' => 'DLI',
                'budget' => 3400,
                'successMeasured' => 'MDM Fully rolled out and documented',
                'progress' => 2,
                'objective_id' => 11,
                'group' => 1,
                'userId' => 2
            ],
            ['description' => 'Test Windows 10 in EPL\'s environment and develop a deployment plan',
                'date' => Carbon::createFromDate(2016, 6, 1, 'America/Toronto'),
                'collaborators' => 'Active Networks',
                'budget' => 2300,
                'successMeasured' => 'Development plan created',
                'progress' => 1,
                'objective_id' => 11,
                'group' => 1,
                'userId' => 2
            ],
            ['description' => 'Replace aging equipment per the IT Infrastructure budget',
                'date' => Carbon::createFromDate(2016, 9, 30, 'America/Toronto'),
                'collaborators' => 'Project Team',
                'budget' => 50000,
                'successMeasured' => 'Development plan created',
                'progress' => 0,
                'objective_id' => 11,
                'group' => 1,
                'userId' => 2
            ],
            ['description' => 'Support and enhance gaming opportunities for customers at EPL',
                'date' => Carbon::createFromDate(2016, 12, 31, 'America/Toronto'),
                'collaborators' => 'DLI',
                'budget' => 12000,
                'successMeasured' => 'More gaming opportunities presented',
                'progress' => 0,
                'objective_id' => 12,
                'group' => 1,
                'userId' => 2
            ],
        ]);

        for ($j = 1; $j <= App\Objective::All()->Count(); $j++){
            global $obj;
            $obj = DB::table('objectives')->where('id', $j)->first();
            for ($i = 1, $k = 1; $i <= App\Action::All()->Count(); $i++) {
                $act = DB::table('actions')
                    ->where('id', $i)
                    ->first();
                if ($act->objective_id == $obj->id) {
                    DB::table('actions')
                        ->where('id', $i)
                        ->update(array('ident' => $obj->ident . '.' . $k));
                    $k++;
                }
             }
        }
    }
}
