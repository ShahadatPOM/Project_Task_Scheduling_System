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
                    <th class="text-center" style="width: 20%" >
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
                                <img alt="Avatar" class="table-avatar" src="{{url('files/'.$user->image )}}">
                            </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                            {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $project->created_at)->diffForHumans() }}
                        <br/>
                    </td>
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-volumenow="77" aria-volumemin="0"
                                 aria-volumemax="100" style="width: 77%">
                            </div>
                        </div>
                        <small>
                            77% Complete
                        </small>
                    </td>

                    <td class="project-state">

                        @if($project->status == 1)
                        <span class="badge badge-success">Success</span>

                            @elseif(DB::table('project_assigns')->where('project_id', $project->id )->first())
                            <span class="badge badge-info">On Progress</span>
                            @else
                            <span class="badge badge-danger">Pending</span>
                        @endif
                    </td>
                    <td class="project-actions text-right">
                        <a title="edit" class="btn btn-sm btn-warning" href="{{ route('project.edit', $project->id) }}"><i class="fa fa-pencil"></i></a>
                        @if(Auth::user()->role_id == 1)
                        <a title="delete" onclick="return confirm('Are you sure to delete this')" class="btn btn-sm btn-danger" href="{{ route('project.delete', $project->id) }}"><i class="fa fa-trash"></i></a>
                        @endif
                        <a title="view" class="btn btn-sm btn-primary" href="{{ route('project.show', $project->id) }}"><i class="fa fa-eye"></i></a>
                        <a title="assign" class="btn btn-sm btn-warning" href="{{ route('project.assignForm', $project->id) }}"><i class="fa fa-plus"></i></a>

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
