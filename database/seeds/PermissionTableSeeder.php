<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use App\Permission;
use DB;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Route::getRoutes()->getRoutes() as $route) {
            $action = $route->getAction();
            if (array_key_exists('as', $action)) {
                $controllers = $action['as'];
                DB::table('permissions')->insert($controllers);
            }
        }
    }
}
