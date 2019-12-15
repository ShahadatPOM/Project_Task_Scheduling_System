<?php

namespace App\Providers;

use App\Requirement;
use App\Team;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'layouts.backend.partial.header',
            function ($view) {
                $view->with('currentTime', Carbon::now());
            }
        );

        view()->composer(
          'layouts.backend.partial.header',
          function ($view) {
              $view->with('submittedModule', Requirement::where('status', 3)->get());
          }
      );
        /*view()->composer(
            'layouts.backend.partial.header',
            function ($view) {
                $view->with('pending', Post::where('status', 0)->with('user')->whereHas('user', function ($q) {
                    $q->where('role_id', 2);
                })->get());
            }
        );*/
    }
}
