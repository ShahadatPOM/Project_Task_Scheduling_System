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
            <table class="table table-borderless projects text-center">
                <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        Project Title
                    </th>
                    <th style="width: 20%">
                        Task Title
                    </th>
                    <th style="width: 15%">
                        Arrived
                    </th>
                     <th style="width: 15%">
                         Task Progress
                     </th>
                    <th style="width: 8%" >
                        Status
                    </th>
                    <th style="width: 20%">
                        Action
                    </th>
                </tr>
                </thead>

                @php
                    $projects=[];
                    $statuses = [];
                    $tasks = [];
                @endphp
                <tbody>
                @if(Auth::user()->role->id == 4)
                    @foreach($task->requirements as $key => $req)
                        <tr>
                            <td>{{ $key++ }}</td>
                            @if(!in_array($req->project->title,$projects))
                                @php
                                    $projects[] = $req->project->title;
                                @endphp
                                <td rowspan="{{ count($task->requirements) }}">{{ $req->project->title }}</td>
                            @endif
                            <td>
                                {{ $req->name }}
                            </td>

                            <td>
                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $task->created_at)->diffForHumans() }}
                            </td>


                             <td class="project_progress">

                                         <small>
                                             <div class="progress progress-sm">
                                                 <div @if($req->status == 0) class="progress-bar bg-red" @endif role="progressbar" aria-volumenow="0" aria-volumemin="0" aria-volumemax="100"
                                                      style="width: {{ $req->status == 0 ? 100 : $req->progress }}%">
                                                 </div>
                                             </div>
                                             {{ $req->status == 1 ? $req->progress : '' }}% Completed
                                         </small>

                              </td>


                                <td class="project-state">
                                    @if($req->status == 0 )
                                        <span class="badge badge-danger">Pending</span>
                                    @elseif($req->status == 1)
                                        <span class="badge badge-warning">On progress</span>
                                    @elseif($req->status == 2)
                                        <span class="badge badge-warning">Done</span>
                                    @elseif($req->status == 3)
                                        <span class="badge badge-warning">Rejected</span>
                                    @endif
                                </td>

                            <td class="project-actions text-center">

                                <a title="view" class="btn btn-sm btn-primary" href="{{ route('task.detail', $req->id) }}"><i class="fa fa-eye"></i></a>
                                @if($req->status == 0)
                                <a title="startProgress" class="btn btn-sm btn-info" href="{{ route('task.progress', $req->id) }}"><i class="fa fa-toggle-on"> start</i></a>
                                @else
                                <a title="updateProgress" class="btn btn-sm btn-info" href="{{ route('task.progressUpdate', $req->id) }}"><i class="fa fa-toggle-on"> update</i></a>
                                    @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection


