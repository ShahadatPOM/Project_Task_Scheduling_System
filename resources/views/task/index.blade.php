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
               {{-- @if(Auth::user()->role->id == 4)--}}
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
                                    {{ $task->status == 1 ? $task->progress : '' }}% Completed
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
                                @if($req->status == 0)
                                    <a title="startProgress" class="btn btn-sm btn-info"
                                       href="{{ route('task.progress', $req->id) }}"><i class="fa fa-toggle-on">
                                            start</i></a>
                                @else
                                    <a title="updateProgress" class="btn btn-sm btn-info"
                                       href="{{ route('task.progressUpdate', $req->id) }}"><i class="fa fa-toggle-on">
                                            update</i></a>
                                @endif
                            </td>
                        </tr>
                       @else
                            <tr>
                                <td>no</td>
                            </tr>
                  {{--     @endif--}}
                </tbody>
            </table>
        </div>
    </div>
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
