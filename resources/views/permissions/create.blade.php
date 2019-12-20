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
                    <th>Action</th>
                    <th>User</th>
                    <th>Project</th>
                    <th>Team</th>
                </tr>
                <form action="{{url('permissions/store',$role->id)}}" method='post'>
                    @csrf
                    <tr>
                        <td>Create</td>
                        @foreach($creates as $create)
                            <td><input type="checkbox" name="id[]" value="{{$create->id}}">{{$create->name}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>View</td>
                        @foreach($views as $view)
                            <td><input type="checkbox" name="id[]" value="{{$view->id}}">{{$view->name}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Edit</td>
                        @foreach($edits as $edit)
                            <td><input type="checkbox" name="id[]" value="{{$edit->id}}">{{$edit->name}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Delete</td>
                        @foreach($deletes as $delete)
                            <td><input type="checkbox" name="id[]" value="{{$delete->id}}">{{$delete->name}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td></td><td></td>
                        <td><button type="submit" class="btn btn-success">Save</button></td>
                    </tr>
                </form>
            </table>
        </div></div>
    </section>
    <!-- /.card -->
@endsection
@push('base.js')

@endpush
