<?php

use App\Profile;
use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'user_id' => '1',
        ]);

        Profile::create([
            'user_id' => '2',
        ]);

        Profile::create([
            'user_id' => '3',
        ]);
        Profile::create([
            'user_id' => '4',
        ]);

        Profile::create([
            'user_id' => '5',
        ]);

        Profile::create([
            'user_id' => '6',
        ]);

        Profile::create([
            'user_id' => '7',
        ]);

        Profile::create([
            'user_id' => '8',
        ]);

        Profile::create([
            'user_id' => '9',
        ]);

        Profile::create([
            'user_id' => '10',
        ]);

        Profile::create([
            'user_id' => '11',
        ]);
    }
}
