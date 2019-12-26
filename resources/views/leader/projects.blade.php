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
                    <th style="width: 20%">
                        Status
                    </th>
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
                        <td>
                            @foreach($project->tasks as $task)
                                @if($task->first()->status == 1)
                                <p class="badge badge-warning">On Progress </p>
                                    @elseif($project->status == 3)
                                <p class="badge badge-success">Done </p>
                                @endif
                            @endforeach
                        </td>

                        <td>
                            <a href="{{route('project.show',$project->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
   </div>

@endsection
