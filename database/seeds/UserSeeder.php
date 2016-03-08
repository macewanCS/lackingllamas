<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        db::table('users')->insert([
            [
                'name' => 'Vicky Varga',
                'email' => 'VickyVarga@epl.ca',
                'password' => Hash::make( 'password' ),
            ],
            [
                'name' => 'root',
                'email' => 'root@root.ca',
                'password' => Hash::make ('alpine' ),
            ]
        ]);
    }
}
