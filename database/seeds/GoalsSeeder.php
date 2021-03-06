<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GoalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goals')->insert([
            ['name' => 'Transform Communities', 'bpid' => 2, 'group' => 1, 'bp' => true],
            ['name' => 'Evolve our Digital Environment', 'bpid' => 2, 'group' => 1, 'bp' => true],
            ['name' => 'Act as a catalyst for learning, discovery, and creating', 'bpid' => 2, 'group' => 1, 'bp' => true],
            ['name' => 'Evolve the EPL brand', 'bpid' => 2, 'group' => 3, 'bp' => true],
            ['name' => 'Transition the way we do Business', 'bpid' => 1, 'group' => 1, 'bp' => true],
            ['name' => 'Develop Better Customer Service', 'bpid' => 1, 'group' => 2, 'bp' => true],
            ['name' => 'IT Services Departmental Goals', 'bpid' => 2, 'group' => 1, 'bp' => false]
        ]);

        for ($i = 1; $i <= App\Goal::All()->Count(); $i++){
            DB::table('goals')
                ->where('id', $i)
                ->update(array('ident' => $i));
        }
    }
}
