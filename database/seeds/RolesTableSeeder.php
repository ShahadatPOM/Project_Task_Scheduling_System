<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'project manager',
        ]);
        DB::table('roles')->insert([
            'name' => 'team leader',
        ]);
        DB::table('roles')->insert([
            'name' => 'developer',
        ]);
    }
}
