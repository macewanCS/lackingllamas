<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        db::table('roles')->insert([
            [
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'A regular user. Able to update actions created by or assigned to them, in addition to viewing the entirety of the Business Plan'
            ],
            [
                'name' => 'leader',
                'display_name' => 'Leader',
                'description' => 'A Leader of a team or Department. Able to create, modify, and delete actions and tasks of their respective team or department as well as the rights of a basic user.'
            ],
            [
                'name' => 'bpLead',
                'display_name' => 'Business Plan Lead',
                'description' => 'A business executive who can create new business plans as well as Goals and Objectives for the current business plan. They also have the permissions of leaders and users.'
            ],
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'A system administrator who can make changes to any part of the system. Most importantly however, sets user up with user roles'
            ]
        ]);

        $user = User::where('name', '=', 'BpLead')->first();
        $role = Role::where('name', '=', 'bpLead')->first();
        $user->attachRole($role);

        $user = User::where('name', '=', 'Vicky Varga')->first();
        $role = Role::where('name', '=', 'leader')->first();
        $user->attachRole($role);

        $user = User::where('name', '=', 'Elaine Jones')->first();
        $role = Role::where('name', '=', 'user')->first();
        $user->attachRole($role);

        $user = User::where('name', '=', 'J McPhee')->first();
        $role = Role::where('name', '=', 'user')->first();
        $user->attachRole($role);

        $user = User::where('name', '=', 'Alex Carruthers')->first();
        $user->attachRole($role);

    }
}
