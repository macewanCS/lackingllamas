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
        db::table('Users')->insert([
            [
                'name' => 'VickyVarga',
                'email' => 'VickyVarga@epl.ca',
                'password' => Hash::make( 'password' ),
            ],
            [
                'name' => 'root',
                'email' => 'root',
                'password' => Hash::make ('alpine' ),
            ]
        ]);
    }
}
