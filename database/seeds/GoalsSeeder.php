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
            ['name' => 'Transform Communities', 'bpid' => 1],
            ['name' => 'Evolve our Digital Environment', 'bpid' => 1]
        ]);
    }
}
