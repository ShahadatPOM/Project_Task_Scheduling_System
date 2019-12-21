<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('assets/backend/dist/img/avatar04.png')}}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"><b >Datatrix</b> Soft </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/backend/dist/img/avatar5.png')}}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('profile.index', Auth::id()) }}" class="d-block" >{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Developers</li>
                    {{--@if(Auth::user()->role->id == 1)--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Manage User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">
                                <i class="fa fa-user-plus nav-icon"></i>
                                <p>Create New</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <i class="fa fa-list nav-icon"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-institution"></i>
                        <p>
                            Manage Department
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('department.create') }}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Create New</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('department.index') }}" class="nav-link">
                                <i class="fa fa-list nav-icon"></i>
                                <p>All Departments</p>
                            </a>
                        </li>
                    </ul>
                </li>
               {{-- @endif--}}
{{--                admin specific end--}}
{{--                admin and project manager--}}
          {{--      @if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2)--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-object-group"></i>
                        <p>
                            Manage Team
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('team.create') }}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Create New</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('team.index') }}" class="nav-link">
                                <i class="fa fa-list nav-icon"></i>
                                <p>All Teams</p>
                            </a>
                        </li>
                    </ul>
                </li>
                    <li class="nav-item">
                        <a href="{{ url('permissions') }}" class="nav-link">
                            <i class="fa fa-plus nav-icon"></i>
                            <p>Permissions</p>
                        </a>

                <li class="nav-header">Projects & Tasks</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-tasks"></i>
                        <p>
                            Manage Project
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('project.create') }}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Create New</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('project.index') }}" class="nav-link">
                                <i class="fa fa-list nav-icon"></i>
                                <p>All Project</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-tasks"></i>
                        <p>
                            Manage Task
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Create New</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-list nav-icon"></i>
                                <p>Assign Task</p>
                            </a>
                        </li>
                    </ul>
                </li>
                  {{--  @endif--}}
{{--                team leader began--}}
               {{-- @if(Auth::user()->role->id == 3)--}}
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link">
                            <i class="fa fa-list nav-icon"></i>
                            <p>All Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('project.index') }}" class="nav-link">
                            <i class="fa fa-list nav-icon"></i>
                            <p>Projects</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('team.index') }}" class="nav-link">
                            <i class="fa fa-list nav-icon"></i>
                            <p>Teams</p>
                        </a>
                    </li>
           {{--     @endif--}}
{{--                team members began--}}
              {{--  @if(Auth::user()->role->id == 4)--}}
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <i class="fa fa-list nav-icon"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                    <li class="nav-item">
                        <a href="{{ route('project.index') }}" class="nav-link">
                            <i class="fa fa-list nav-icon"></i>
                            <p>Projects</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('task.index') }}" class="nav-link">
                            <i class="fa fa-list nav-icon"></i>
                            <p>Tasks</p>
                        </a>
                    </li>

              {{--  @endif--}}
            </ul>
        </nav>
    </div>
</aside>

