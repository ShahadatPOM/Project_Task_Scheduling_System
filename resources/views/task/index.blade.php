@extends('layouts.backend.master')

@section('base.title', 'Admin')

@section('master.content')
    @if(session()->has('message'))
        <div class="col-sm-4 offset-sm-2 alert">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            Assigned Task List
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        Project Title
                    </th>
                    <th style="width: 20%">
                        Modules
                    </th>
                    <th style="width: 15%">
                        Arrived
                    </th>
                    <th style="width: 15%">
                        Task Progress
                    </th>
                    <th style="width: 8%">
                        Status
                    </th>
                    <th style="width: 20%">
                        Action
                    </th>
                </tr>
                </thead>

                <tbody>
                {{--@if(Auth::user()->role->id == 4)--}}
                   {{----}}
                        <tr>
                            <td>#</td>
                            <td style="text-align: center;">{{$task->project->title}}</td>
                            <td>
                                @foreach($task->requirements as $key => $req)
                                    <ul>
                                        <li> {{ $req->name }}</li>
                                    </ul>

                                    @endforeach
                            </td>
                            <td>
                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $task->created_at)->diffForHumans() }}
                            </td>
                            <td class="project_progress">
                                <small>
                                    <div class="progress progress-sm">
                                        <div @if($task->status == 0) class="progress-bar bg-red"
                                             @endif role="progressbar" aria-volumenow="0" aria-volumemin="0"
                                             aria-volumemax="100"
                                             style="width: {{ $task->status == 0 ? 100 : $task->progress }}%">
                                        </div>
                                    </div>
                                    {{ $task->status == 1 ? $task->progress : 0 }}% Completed
                                </small>
                            </td>

                            <td class="project-state">
                                @if($task->status == 0 )
                                    <span class="badge badge-danger">Pending</span>
                                @elseif($task->status == 1)
                                    <span class="badge badge-warning">On progress</span>
                                @endif
                            </td>

                            <td class="project-actions text-center">
                                <a title="view" class="btn btn-sm btn-primary"
                                   href="{{ route('task.detail', $task->id) }}"><i class="fa fa-eye"></i></a>
                                @if($task->status == 0)
                                    <a title="startProgress" class="btn btn-sm btn-primary"
                                       href="{{ route('task.progress',$task->id) }}" onclick="return confirm('Are you sure you wnat to start your work?')"><i class="fa fa-toggle-on">
                                            start</i></a>
                                @else
                                    <a title="updateProgress" class="btn btn-sm btn-info"
                                       href="{{ route('task.progressUpdate', $task->id) }}"><i class="fa fa-toggle-on">
                                            update</i></a>
                                @endif
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
