<?php

namespace App\Providers;

use App\Department;
use App\Permission;
use App\Policies\DepartmentPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\ProjectPolicy;
use App\Policies\RequirementPolicy;
use App\Policies\TaskPolicy;
use App\Policies\TeamPolicy;
use App\Project;
use App\Requirement;
use App\Task;
use App\Team;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Policies\UsersPolicy;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Department::class => DepartmentPolicy::class,
        Permission::class => PermissionPolicy::class,
        Project::class => ProjectPolicy::class,
        Requirement::class => RequirementPolicy::class,
        Task::class => TaskPolicy::class,
        Team::class => TeamPolicy::class,
        User::class => UsersPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
