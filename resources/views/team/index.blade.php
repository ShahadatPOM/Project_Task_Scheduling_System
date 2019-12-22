@extends('layouts.backend.master')

@section('base.title', 'Admin')

@section('master.content')
    @if(session()->has('message'))
        <div class="col-sm-4 offset-sm-2 alert">
            {{ session()->get('message') }}
        </div>
    @endif
    <div style=" margin-left: 50%; margin-top: 10px;">
        <a href="{{ route('viewTeams') }}" class="btn btn-info" style= " border: 2px; width: 70px">PDF <i class="fa fa-eye"></i></a>
        <a href="{{ route('downloadTeams') }}" class="btn btn-primary" style= "border: 2px; width: 70px">PDF <i class="fa fa-download"></i></a>
    </div>
    <div class="card">
        <div class="card-header">
            <a
                class="btn btn-sm btn-outline-info" href="{{ route('team.create') }}">Add New Team</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="25%">Team Name</th>
                    <th width="25%">Department Name</th>
                    <th width="25%">Satus</th>
                    <th width="35%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->department->name }}</td>

                        <td>
                            @if($team->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a title="edit" class="btn btn-sm btn-warning" href="{{ route('team.edit', $team->id) }}"><i class="fa fa-pencil"></i></a>
                            <a title="delete" onclick="return confirm('Are you sure to delete this')" class="btn btn-sm btn-danger" href="{{ route('team.delete', $team->id) }}"><i class="fa fa-trash"></i></a>
                            <a title="view" class="btn btn-sm btn-primary" href="{{ route('team.member.list', $team->id) }}"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th width="25%">Team Name</th>
                    <th width="25%">Department Name</th>
                    <th width="25%">Satus</th>
                    <th width="35%">Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection

