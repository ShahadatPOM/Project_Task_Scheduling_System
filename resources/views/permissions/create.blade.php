@extends('layouts.backend.master')

@section('base.title', 'Admin')
@push('base.css')

@endpush
@section('master.content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">

                </div>
            </div>
        </div>
    </section>

    <section class="content">
       <h3>Give Permission To {{$role->rolename}}</h3>
    <div class="box">
        <div class="box-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Module</th>
                    <th>Create</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
                <form action="{{url('permissions/store',$role->id)}}" method='post'>
                    @csrf
                    <tr>
                        <td>User</td>
                        @foreach($users as $user)
                            <td><input type="checkbox" name="id[]" value="{{$user->id}}">{{$user->name}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Role</td>
                        @foreach($roles as $role)
                            <td><input type="checkbox" name="id[]" value="{{$role->id}}">{{$role->name}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Department</td>
                        @foreach($departments as $department)
                            <td><input type="checkbox" name="id[]" value="{{$department->id}}">{{$department->name}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Team</td>
                        @foreach($teams as $team)
                            <td><input type="checkbox" name="id[]" value="{{$team->id}}">{{$team->name}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Leader</td>
                        @foreach($leaders as $leader)
                            <td><input type="checkbox" name="id[]" value="{{$leader->id}}">{{$leader->name}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Member</td>
                        @foreach($members as $member)
                            <td><input type="checkbox" name="id[]" value="{{$member->id}}">{{$member->name}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Project</td>
                        @foreach($projects as $project)
                            <td><input type="checkbox" name="id[]" value="{{$project->id}}">{{$project->name}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Requirement</td>
                        @foreach($requirements as $requirement)
                            <td><input type="checkbox" name="id[]" value="{{$requirement->id}}">{{$requirement->name}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Task</td>
                        @foreach($tasks as $task)
                            <td><input type="checkbox" name="id[]" value="{{$task->id}}">{{$task->name}}</td>
                        @endforeach
                    </tr>


                    <tr>
                        <td colspan="5" style="text-align: center"><button type="submit" class="btn btn-success">Save</button></td>
                    </tr>
                </form>
            </table>
        </div></div>
    </section>
    <!-- /.card -->
@endsection
@push('base.js')

@endpush
