@extends('layouts.backend.master')

@section('base.title', 'Admin')

@section('master.content')
    @if(session()->has('message'))
        <div class="col-sm-4 offset-sm-2 alert">
            {{ session()->get('message') }}
        </div>
    @endif

    <div style=" margin-left: 50%; margin-top: 10px;">
        <a target="_blank" href="{{ route('viewDepartment') }}" class="btn btn-info" style=" border: 2px; width: 70px">PDF
            <i class="fa fa-eye"></i></a>
        <a target="_blank" href="{{ route('downloadDepartment') }}" class="btn btn-primary"
           style="border: 2px; width: 70px">PDF <i class="fa fa-download"></i></a>
    </div>
    <div class="card">
        <div class="card-header">
            <a
                class="btn btn-outline-info" href="{{ route('department.create') }}"><i class="fa fa-plus"></i>
                Department</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="35%">Department Name</th>
                    <th width="35%">Satus</th>
                    <th width="30%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $department)
                    <tr>
                        <td>{{ $department->name }}</td>
                        <td>
                            @if($department->status == 1)
                                Active
                            @else
                                Inactive
                            @endif
                        </td>
                        <td>
                            <a title="edit" class="btn btn-sm btn-info"
                               href="{{ route('department.edit', $department->id) }}"><i class="fa fa-pencil"></i></a>
                            <a title="delete" onclick="return confirm('Are you sure to delete this')"
                               class="btn btn-sm btn-danger" href="{{ route('department.delete', $department->id) }}"><i
                                    class="fa fa-trash"></i></a>
                            <a title="create team" class="btn btn-sm btn-primary"
                               href="{{ route('team.create', $department->id) }}"><i class="fa fa-plus"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th width="35%">Department Name</th>
                    <th width="35%">Satus</th>
                    <th width="30%">Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
