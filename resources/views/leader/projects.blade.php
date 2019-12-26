@extends('layouts.backend.master')

@section('base.title', 'Admin')

@section('master.content')
    <div class="card">
        <div class="card-header">

        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th style="width: 20%">
                        Project Title
                    </th>
                    <th style="width: 20%">
                        Client
                    </th>
                    <th style="width: 20%">
                        Department
                    </th>
                    @foreach($team->projects as $project)
                    @if($project->status == 1)
                    <th style="width: 20%">
                        Progress
                    </th>
                    @elseif($project->status == 2)
                        <th style="width: 20%">
                            Status
                        </th>
                    @endif
                    @endforeach
                    <th style="width: 20%">Action</th>
                </tr>
                </thead>

                <tbody>

                @foreach($team->projects as $project)
                    <tr>
                        <td>
                            {{ $project->title }}
                        </td>
                        <td>
                            {{ $project->client }}
                        </td>
                        <td>
                            @foreach($project->departments as $department)
                            {{ $department->name }}
                                @endforeach
                        </td>
                        <td class="project_progress">
                            @if($project->status == 0)
                                <small>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-red" role="progressbar" aria-volumenow="0"
                                             aria-volumemin="0" aria-volumemax="100" style="width: 100%">
                                        </div>
                                    </div>
                                    Not assigned yet
                                </small>
                            @elseif($project->status == 1)
                                <small>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" aria-volumenow="100"
                                             aria-volumemin="0"
                                             aria-volumemax="100" style="width: {{$project->requirements->sum('progress')}}%">
                                        </div>
                                    </div>
                                    {{$project->requirements->sum('progress')}}% completed
                                </small>
                            @elseif($project->status == 2)
                                <span class="badge badge-success">Completed</span>
                            @endif
                        </td>


                        <td>
                            <a href="{{route('project.show',$project->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                            @if($project->status == 1)
                            <a href="{{route('project.finalUpdate',$project->id)}}" class="btn btn-info btn-sm"><i class="fa fa-toggle-on"></i>update</a>
                                @endif

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
   </div>

@endsection
