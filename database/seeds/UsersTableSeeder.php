<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => '1',
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('000'),
        ]);

        User::create([
            'role_id' => '4',
            'name' => 'dev1',
            'username' => 'dev1',
            'email' => 'dev1@dev1.com',
            'department_id' => '1',
            'password' => bcrypt('000'),
        ]);

        User::create([
            'role_id' => '4',
            'name' => 'dev2',
            'username' => 'dev2',
            'email' => 'dev1@dev2.com',
            'department_id' => '1',
            'password' => bcrypt('000'),
        ]);

        User::create([
            'role_id' => '4',
            'name' => 'dev3',
            'username' => 'dev3',
            'email' => 'dev1@dev3.com',
            'department_id' => '1',
            'password' => bcrypt('000'),
        ]);

        User::create([
            'role_id' => '4',
            'name' => 'dev4',
            'username' => 'dev4',
            'email' => 'dev1@dev4.com',
            'department_id' => '1',
            'password' => bcrypt('000'),
        ]);

        User::create([
            'role_id' => '4',
            'name' => 'dev5',
            'username' => 'dev5',
            'email' => 'dev1@dev5.com',
            'department_id' => '1',
            'password' => bcrypt('000'),
        ]);

        User::create([
            'role_id' => '4',
            'name' => 'dev6',
            'username' => 'dev6',
            'email' => 'dev1@dev6.com',
            'department_id' => '2',
            'password' => bcrypt('000'),
        ]);

        User::create([
            'role_id' => '4',
            'name' => 'dev7',
            'username' => 'dev7',
            'email' => 'dev1@dev7.com',
            'department_id' => '2',
            'password' => bcrypt('000'),
        ]);

        User::create([
            'role_id' => '4',
            'name' => 'dev8',
            'username' => 'dev8',
            'email' => 'dev1@dev8.com',
            'department_id' => '2',
            'password' => bcrypt('000'),
        ]);

        User::create([
            'role_id' => '4',
            'name' => 'dev9',
            'username' => 'dev9',
            'email' => 'dev1@dev9.com',
            'department_id' => '2',
            'password' => bcrypt('000'),
        ]);

        User::create([
            'role_id' => '4',
            'name' => 'dev10',
            'username' => 'dev10',
            'email' => 'dev1@dev10.com',
            'department_id' => '2',
            'password' => bcrypt('000'),
        ]);
    }
}
