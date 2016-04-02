<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ObjectivesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('objectives')->insert([
            ['name' => 'We Identify and meet community needs', 'goal_id' => 1, 'group' => 1],
            ['name' => 'We Reduce barriers to accessing library services', 'goal_id' => 1, 'group' => 1],
            ['name' => 'Online services are highly used and valued', 'goal_id' => 2, 'group' => 1, 'bp' => true],
            ['name' => 'Together with our community we provide successful, meaningful services that are highly rates and heavily used', 'goal_id' => 1, 'group' => 2],
            ['name' => 'Edmontonians view EPL as integral to their lifelong formal and informal learning.', 'goal_id' => 3, 'group' => 2],
            ['name' => 'Promote upcoming technology', 'goal_id' => 2, 'group' => 3],
            ['name' => 'Increase eBook availability', 'goal_id' => 2, 'group' => 7],
            ['name' => 'Design new EPL logo for 2017', 'goal_id'=> 4, 'group' => 3],

            ['name' => 'Entice high end speakers to come at no or low cost', 'goal_id' => 5, 'group' => 4],
            ['name' => 'Incentives for employees with good service', 'goal_id'=> 6, 'group' => 5]
        ]);

        //Generate Idents for Objectives.
        for ($j = 1; $j <= App\Goal::All()->Count(); $j++){
            global $goal;
            $goal = DB::table('goals')->where('id', $j)->first();
            for ($i = 1, $k = 1; $i <= App\Objective::All()->Count(); $i++) {
                $obj = DB::table('objectives')
                    ->where('id', $i)
                    ->first();
                if ($obj->goal_id == $goal->id) {
                    DB::table('objectives')
                        ->where('id', $i)
                        ->update(array('ident' => $j . '.' . $k));
                    $k++;
                }
            }
        }
    }
}
