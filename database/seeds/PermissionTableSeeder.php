<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use App\Permission;
use App\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::find(1);
        $permissions = array(
            array('id' => 1, 'name' => 'user_create'),
            array('id' => 2, 'name' => 'role_create'),
            array('id' => 3, 'name' => 'department_create'),
            array('id' => 4, 'name' => 'team_create'),
            array('id' => 5, 'name' => 'leader_create'),
            array('id' => 6, 'name' => 'member_create'),
            array('id' => 7, 'name' => 'project_create'),
            array('id' => 8, 'name' => 'requirement_create'),
            array('id' => 9, 'name' => 'task_create'),
            array('id' => 10, 'name' => 'user_view'),
            array('id' => 11, 'name' => 'role_view'),
            array('id' => 12, 'name' => 'department_view'),
            array('id' => 13, 'name' => 'team_view'),
            array('id' => 14, 'name' => 'leader_view'),
            array('id' => 15, 'name' => 'member_view'),
            array('id' => 16, 'name' => 'project_view'),
            array('id' => 17, 'name' => 'requirement_view'),
            array('id' => 18, 'name' => 'task_view'),
            array('id' => 19, 'name' => 'user_edit'),
            array('id' => 20, 'name' => 'role_edit'),
            array('id' => 21, 'name' => 'department_edit'),
            array('id' => 22, 'name' => 'team_edit'),
            array('id' => 23, 'name' => 'leader_edit'),
            array('id' => 24, 'name' => 'member_edit'),
            array('id' => 25, 'name' => 'project_edit'),
            array('id' => 26, 'name' => 'requirement_edit'),
            array('id' => 27, 'name' => 'task_edit'),
            array('id' => 28, 'name' => 'user_delete'),
            array('id' => 29, 'name' => 'role_delete'),
            array('id' => 30, 'name' => 'department_delete'),
            array('id' => 31, 'name' => 'team_delete'),
            array('id' => 32, 'name' => 'leader_delete'),
            array('id' => 33, 'name' => 'member_delete'),
            array('id' => 34, 'name' => 'project_delete'),
            array('id' => 35, 'name' => 'requirement_delete'),
            array('id' => 36, 'name' => 'task_delete'),

        );
        Permission::insert($permissions);
        $all_permissions = Permission::all();
        foreach ($all_permissions as $key => $perm) {
            $admin->permissions()->attach($perm->id);
        }


    }
}
