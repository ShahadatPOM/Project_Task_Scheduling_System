@extends('layouts.backend.master')

@section('base.title', 'Admin')


@section('master.content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
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
                    <div class="small-box" style="background: #f7e1b9 ; color: #000">
                        <div class="inner">
                            <h5>Users</h5>
                            <h4 style="margin-left: 30px">{{count($users)}}</h4>
                        </div>
                        <div class="icon">
                            <i><img src="{{ asset('assets/icon/t6.png') }}" height="70px"
                                    style="margin-bottom: 100%"></i>
                        </div>
                        <a href="{{ route('user.index') }}" class="small-box-footer" style="color: #000">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background: #87adbd ; color: #000">
                        <div class="inner">
                            <h5>Projects</h5>
                            <h4 style="margin-left: 30px">{{count($projects)}}</h4>
                        </div>
                        <div class="icon">
                            <i><img src="{{ asset('assets/icon/pro3.png') }}" height="70px" style="margin-bottom: 100%"></i>
                        </div>
                        <a href="{{ route('project.index') }}" class="small-box-footer" style="color: #000">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background: lightcoral; color: #000">
                        <div class="inner">
                            <h5>Teams</h5>
                            <h4 style="margin-left: 30px">{{count($teams)}}</h4>
                        </div>
                        <div class="icon">
                            <i><img src="{{ asset('assets/icon/team5.png') }}" height="70px"
                                    style="margin-bottom: 100%"></i>

                        </div>
                        <a href="{{ route('team.index') }}" class="small-box-footer" style="color: #000">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box" style="background:  #22c3a1 ; color: #000">
                        <div class="inner">
                            <h5>Departments</h5>
                            <h4 style="margin-left: 30px">{{count($departments)}}</h4>
                        </div>
                        <div class="icon">
                            <i><img src="{{ asset('assets/icon/d1.png') }}" height="70px"
                                    style="margin-bottom: 100%"></i>
                        </div>
                        <a href="{{ route("department.index") }}" class="small-box-footer" style="color: #000">More info
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            {{--activity--}}
            @if(Auth::user()->role_id == 1)

                <div class="row">
                    @foreach($projects as $project)
                        <div class="col-6 text-center">
                            <input type="text" readonly class="knob" value="{{$project->requirements->sum('progress')}}"
                                   data-skin="tron" data-thickness="0.1"
                                   data-width="120"
                                   data-height="120" data-fgColor="#f56954">

                            <div class="knob-label"><span style="color: #da4453; font-size: 18px"><b>Out of {{ $project->requirements->sum('percentage') }}%</b></span>
                                <p><a href="{{ route('project.show', $project->id) }}">{{ $project->title }}</a>
                                @foreach($project->departments as $department)
                                ({{ $department->name }})</p>
                                    @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>
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
                                    <a href="{{route('task.edit',$task->id)}}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-pencil-square-o"></i></a>
                                @else
                                    <a href="{{route('task.assignForm',$user->id)}}" class="btn btn-primary btn-sm"><i
                                            class="fa fa-check-square-o"></i></a>
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
