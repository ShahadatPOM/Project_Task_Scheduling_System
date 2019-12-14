@extends('layouts.backend.master')

@section('base.title', 'Users')

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
        <a target="_blank" href="{{ route('viewUsers') }}" class="btn btn-info" style= " border: 2px; width: 70px">PDF <i class="fa fa-eye"></i></a>
        <a href="{{ route('downloadUsers') }}" class="btn btn-primary" style= "border: 2px; width: 70px">PDF <i class="fa fa-download"></i></a>
    </div>

    <div class="card">
        <div class="card-header">
            <a
                class="btn btn-outline-info" href="{{ route('register') }}"><i class="fa fa-plus"></i> User</a>
        </div>


        <!-- /.card-header -->
        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="10%">Name</th>
                    <th width="10%">Email</th>
                    <th width="15%">Department</th>
                    <th width="15%">Role</th>
                    <th width="10%">Status</th>
                    <th width="15%">Action</th>

                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->department_id }}</td>
                        <td>{{ $user->role->name }}</td>
                        {{--  <td>{{ Carbon\Carbon::createFromFormat("Y-m-d H:i:s",$user->created_at)->diffForHumans() }}</td>--}}
                        {{--<td>{{ Carbon\Carbon::createFromFormat("Y-m-d H:i:s",$user->created_at)->diff(Carbon\Carbon::now())->format('%y years') }}</td>--}}

                        <td>
                            @if($user->status == 1)
                               <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a title="edit user" class="btn btn-sm btn-warning" href="{{ route('user.edit', $user->id) }}"><i class="fa fa-pencil"></i></a>
                            <a title="delete user" onclick="return confirm('Are you sure to delete this post')" class="btn btn-sm btn-danger" href="{{ route('user.delete', $user->id) }}"><i class="fa fa-trash"></i></a>
                            <a title="view user" class="btn btn-sm btn-primary" href=""><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th width="10%">Name</th>
                    <th width="10%">Email</th>
                     <th width="15%">Department</th>
                    <th width="10%">Role</th>
                    <th width="10%">Status</th>
                    <th width="15%">Action</th>
                </tr>
                </tfoot>
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

