<?php

namespace App\Providers;

use App\Project;
use App\Requirement;
use App\Team;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Auth;
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
        Schema::defaultStringLength(191);
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
        view()->composer(
            'layouts.backend.partial.header',
            function ($day) {
                $team = Team::where('leader_id', Auth::id())->first();
                if ($team){
                    foreach ($team->department->projects as $project) {
                        $latest_project = $project;
                    }
                $date = Carbon::parse($project->created_at);
                $now = Carbon::now();

                $diff = $date->diffInDays($now);
                $day->with('deadline', Project::where('estimated_project_duration', $diff)->first());
            }
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
