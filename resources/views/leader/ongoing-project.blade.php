@extends('layouts.backend.master')
@section('base.title', 'Admin')
@section('master.content')
    <div class="card">
        <div class="card-header">

        </div>
        <!-- /.card-header -->
        <div class="card-body">

                @php
                foreach($team->projects as $project){
                $ids=$project->id;
            }
                @endphp
                <p>Your Team Members, Assign Task for <font color="red">{{$project->title}}</font></p>
            <table id="" class="table table-bordered table-striped">

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
        </div>
   </div>
@endsection
