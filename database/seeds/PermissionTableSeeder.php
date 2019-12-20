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
        array('id' => 1,'name' => 'user_create'),
        array('id' => 2,'name' => 'project_create'),
        array('id' => 3,'name' => 'team_create'),
        array('id' => 4,'name' => 'user_view'),
        array('id' => 5,'name' => 'team_view'),
        array('id' => 6,'name' => 'project_view'),
        array('id' => 7,'name' => 'user_edit'),
        array('id' => 8,'name' => 'project_edit'),
        array('id' => 9,'name' => 'team_edit'),
        array('id' => 10,'name' => 'user_delete'),
        array('id' => 11,'name' => 'project_delete'),
        array('id' => 12,'name' => 'team_delete'),
        );
     Permission::insert($permissions);
     $all_permissions = Permission::all();
     foreach ($all_permissions as $key => $perm) 
     {
         $admin->permissions()->attach($perm->id);
     }
       
       
    }
}
