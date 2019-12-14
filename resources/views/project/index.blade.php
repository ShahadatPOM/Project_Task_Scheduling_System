@extends('layouts.backend.master')

@section('base.title', 'Admin')
@push('base.css')
    <link rel="stylesheet" href="{{asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@endpush

@section('master.content')
    @if(session()->has('message'))
        <div class="col-sm-4 offset-sm-2 alert">
            {{ session()->get('message') }}
        </div>
    @endif
    <div style=" margin-left: 50%; margin-top: 10px;">
        <a href="" class="btn btn-info" style= " border: 2px; width: 70px">PDF <i class="fa fa-eye"></i></a>
        <a href="" class="btn btn-primary" style= "border: 2px; width: 70px">PDF <i class="fa fa-download"></i></a>
    </div>
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body p-0">

            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        Project Title
                    </th>
                    <th style="width: 20%">
                        Team Members
                    </th>
                    <th style="width: 15%">
                        Arrived
                    </th>
                    <th style="width: 15%">
                        Project Progress
                    </th>
                    <th style="width: 8%" class="text-center">
                        Status
                    </th>
                    <th class="text-center" style="width: 20%">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @if(Auth::user()->role->id == 1)
                    @foreach($projects as $project)
                        <tr>
                            <td>
                                {{ $project->id }}
                            </td>
                            <td>
                                <a>
                                    {{ $project->title }}
                                </a>
                                <br/>
                            </td>

                            <td>
                                <ul class="list-inline">
                                    @foreach($users as $user)
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar"
                                                 src="{{url('files/'.$user->profile->image )}}">
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $project->created_at)->diffForHumans() }}
                                <br/>
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
                                            <div class="progress-bar bg-orange" role="progressbar" aria-volumenow="100"
                                                 aria-volumemin="0"
                                                 aria-volumemax="100" style="width: 100%">
                                            </div>
                                        </div>
                                        Not started yet
                                    </small>
                                @endif
                            </td>

                            <td class="project-state">

                                @if($project->status == 0 && $project->team_id == null)
                                    <span class="badge badge-danger">Pending</span>
                                @else
                                    <span class="badge badge-warning">Assigned</span>

                                @endif
                            </td>

                            <td class="project-actions text-center">
                                <a title="view" class="btn btn-sm btn-primary"
                                   href="{{ route('project.show', $project->id) }}"><i class="fa fa-eye"></i></a>
                                <a title="edit" class="btn btn-sm btn-warning"
                                   href="{{ route('project.edit', $project->id) }}"><i class="fa fa-pencil"></i></a>
                                <a title="delete" onclick="return confirm('Are you sure to delete this')"
                                   class="btn btn-sm btn-danger" href="{{ route('project.delete', $project->id) }}"><i
                                        class="fa fa-trash"></i></a>
                                @if($project->status == 0 && $project->team_id == null)
                                    <a href="{{ route('project.assignForm', $project->id) }}">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>Assign
                                        </button>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @elseif(Auth::user()->role->id == 3)

                    @foreach($leaderprojects as $leaderproject)
                        <tr>
                            <td>
                                {{ $leaderproject->id }}
                            </td>
                            <td>
                                <a>
                                    {{ $leaderproject->title }}
                                </a>
                                <br/>
                            </td>

                            <td>
                                <ul class="list-inline">
                                    @foreach($leaderproject->team->users as $user)
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar"
                                                 src="{{url('files/'.$user->image )}}">
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $leaderproject->created_at)->diffForHumans() }}
                                <br/>
                            </td>
                            <td class="project_progress">

                                @if($leaderproject->requirements)
                                    @php
                                        $all_requirements = [];
                                    @endphp
                                    @php
                                        $all_req[] = $leaderproject->requirements;
                                    @endphp

                                    @foreach($leaderproject->requirements as $requirement)
                                        @if(in_array($requirement->status == 1, $all_req))
                                            @foreach($requirement->tasks as $task)
                                                <small>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-red" role="progressbar"
                                                             aria-volumenow="0" aria-volumemin="0" aria-volumemax="100"
                                                             style="width:{{ $task->progress }}%">
                                                        </div>
                                                    </div>
                                                    {{ $task->progress }}% Completed
                                                </small>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            </td>

                            <td class="project-state">

                                @if($leaderproject->status == 1 )
                                    <span class="badge badge-danger">Pending</span>
                                @else
                                    <span class="badge badge-warning">Assigned</span>

                                @endif
                            </td>
                            <td class="project-actions text-center">
                                <a title="edit" class="btn btn-sm btn-warning"
                                   href="{{ route('project.edit', $leaderproject->id) }}"><i
                                        class="fa fa-pencil"></i></a>
                                <a title="view" class="btn btn-sm btn-primary"
                                   href="{{ route('project.show', $leaderproject->id) }}"><i class="fa fa-eye"></i></a>
                                @if($leaderproject->status == 1)
                                    <a href="{{ route('task.assignForm', $leaderproject->id) }}">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>
                                            Assign
                                        </button>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection

@push('base.js')
    <script src="{{asset('assets/backend/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
@endpush
