@extends('layouts.backend.master')

@section('base.title', 'Admin')


@section('master.content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            {{--            admin began--}}
            {{-- @if(Auth::user()->role->id==1)--}}
            <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-maroon">
                            <div class="inner">
                                <h5>Project</h5>
                                <h4 style="margin-left: 30px">{{count($projects)}}</h4>
                            </div>
                            <div class="icon">
                                <i class="ion ion-document"></i>
                            </div>
                            <a href="{{ route('project.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5>Team</h5>
                            <h4 style="margin-left: 30px">{{count($teams)}}</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{ route('team.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h5>Departments</h5>
                            <h4 style="margin-left: 30px">{{count($departments)}}</h4>

                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route("department.index") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h5>Completed Project</h5>
                            <h4 style="margin-left: 30px">{{count($completedProjects)}}</h4>

                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box" style="background: #c7b5e7">
                        <div class="inner">
                            <h5>Pending Project</h5>
                            <h4 style="margin-left: 30px">{{count($pendingProjects)}}</h4>

                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            {{--                activity--}}
            @if(Auth::user()->role_id == 1)
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 20%">
                        User name
                    </th>
                    <th style="width: 20%">
                        Login Time
                    </th>
                    <th style="width: 20%">
                        Logout Time
                    </th>
                </tr>
                <tbody>
                @foreach($activities as $activity)
                    <tr>
                        <td>
                            {{ $activity->user->name }}
                        </td>
                        <td>
                            {{ $activity->login_time }}
                        </td>
                        <td>
                            {{ $activity->logout_time ? $activity->logout_time : 'active'  }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                @endif
            @if(Auth::user()->role_id == 3)
                <table class="table table-striped projects">
                    <caption>Your Team Members</caption>
                    <thead>
                    <tr>
                        <th style="width: 20%">
                            Serial
                        </th>
                        <th style="width: 20%">
                        Name
                        </th>
                        <th style="width: 20%">
                            Action
                        </th>
                    </tr>
                    <tbody>
                    @foreach($team->users->where('role_id','!=',3) as $key => $user)
                        <tr>
                            <td>
                                {{ $key }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                @php
                                $id='';
                                foreach ($team->projects as $project)
                                {
                                    $id = $project->id;
                                }
                                $task = \App\Task::where('project_id',$id)->where('member_id',$user->id)->first();
                                @endphp

                            @if($task)
                                    <a href="{{route('task.edit',$task->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                                    @else
                                <a href="{{route('task.assignForm',$user->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o"></i></a>
                                    @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>
@endsection
