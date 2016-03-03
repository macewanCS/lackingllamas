<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        db::table('Permissions')->insert([
            [
                'name' => 'createAT',
                'display_name' => 'Create new Actions and Tasks',
                'description' => 'Create new Actions and Tasks'
            ],
            [
                'name' => 'updateAT',
                'display_name' => 'Update new Actions and Tasks',
                'description' => 'Update new Actions and Tasks'
            ],
            [
                'name' => 'deleteAT',
                'display_name' => 'Delete new Actions and Tasks',
                'description' => 'Delete new Actions and Tasks'
            ],
            [
                'name' => 'createGO',
                'display_name' => 'Create new Goals and Objectives',
                'description' => 'Create new Goals and Objectives'
            ],
            [
                'name' => 'updateGO',
                'display_name' => 'Update new Goals and Objectives',
                'description' => 'Update new Goals and Objectives'
            ],
            [
                'name' => 'deleteGO',
                'display_name' => 'Delete new Goals and Objectives',
                'description' => 'Delete new Goals and Objectives'
            ],
            [
                'name'=> 'createBP',
                'display_name' => 'Create new Business Plans',
                'description' => 'Create new Business Plans'
            ],
            [
                'name'=> 'setPerm',
                'display_name' => 'Set User Permissions',
                'description' => 'Set User Permissions'
            ]
        ]);

        $user = Role::where('name', '=', 'user')->first();
        $leader = Role::where('name', '=', 'leader')->first();
        $bplead = Role::where('name', '=', 'bpLead')->first();
        $admin = Role::where('name', '=', 'admin')->first();


        $perm = Permission::where('name', '=', 'createAT')->first();
        $user->attachPermission($perm);
        $leader->attachPermission($perm);
        $bplead->attachPermission($perm);
        $admin->attachPermission($perm);

        $perm = Permission::where('name', '=', 'updateAT')->first();
        $user->attachPermission($perm);
        $leader->attachPermission($perm);
        $bplead->attachPermission($perm);
        $admin->attachPermission($perm);

        $perm = Permission::where('name', '=', 'deleteAT')->first();
        $leader->attachPermission($perm);
        $bplead->attachPermission($perm);
        $admin->attachPermission($perm);

        $perm = Permission::where('name', '=', 'createGO')->first();
        $bplead->attachPermission($perm);
        $admin->attachPermission($perm);

        $perm = Permission::where('name', '=', 'updateGO')->first();
        $bplead->attachPermission($perm);
        $admin->attachPermission($perm);

        $perm = Permission::where('name', '=', 'deleteGO')->first();
        $bplead->attachPermission($perm);
        $admin->attachPermission($perm);

        $perm = Permission::where('name', '=', 'createBP')->first();
        $bplead->attachPermission($perm);
        $admin->attachPermission($perm);

        $perm = Permission::where('name', '=', 'setPerm')->first();
        $admin->attachPermission($perm);
    }
}
