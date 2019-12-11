<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => 'Web',
            'status' => '0',
        ]);
        DB::table('departments')->insert([
            'name' => 'Android',
            'status' => '0',

        ]);
    }
}
