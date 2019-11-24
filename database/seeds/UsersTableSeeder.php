<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'mobile' => '01950734237',
            'address' => 'uttara, Dhaka-1230',
            'designation' => 'CEO',
            'education' => 'Bsc in CSE',
            'specialist_in' => 'PHP',
            'password' => bcrypt('000'),
        ]);
    }
}
