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
                'name' => 'J McPhee',
                'email' => 'JMcPhee@epl.ca',
                'password' => Hash::make ('password' ),
            ],
            [
                'name' => 'Jody Crilly',
                'email' => 'JodyCrilly@epl.ca',
                'password' => Hash::make ('password' ),
            ],
            [
                'name' => 'Elaine Jones',
                'email' => 'ElaineJones@epl.ca',
                'password' => Hash::make ('password' ),
            ],
            [
                'name' => 'Alex Carruthers',
                'email' => 'AlexCarruthers@epl.ca',
                'password' => Hash::make ('password' ),
            ],
            [
                'name' => 'root',
                'email' => 'root@root.ca',
                'password' => Hash::make ('alpine' ),
            ],
            [
                'name' => 'Sharon Karr',
                'email' => 'SharonKarr@epl.ca',
                'password' => Hash::make ('password')
            ]
        ]);
    }
}
