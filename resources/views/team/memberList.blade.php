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
    {{--member for each team--}}
    <div class="card">
        <div class="card-header">
            <a
                class="btn" href="">Members of {{ $team->name }}</a>
        </div>
        <div class="card-body">

            <table id="example2" class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th width="30%">Member Name</th>
                    <th width="20%">Satus</th>
                    <th width="30%">Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($memberNames as $member)

                    <tr>
                        <td>{{ $member->name }}</td>

                        <td>
                            @if($member->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a title="edit" class="btn btn-sm btn-warning" href="{{ route('team.edit', $team->id) }}"><i class="fa fa-pencil"></i></a>
                            <a title="delete" onclick="return confirm('Are you sure to delete this')" class="btn btn-sm btn-danger" href="{{ route('team.delete', $team->id) }}"><i class="fa fa-trash"></i></a>
                            <a title="view" class="btn btn-sm btn-primary" href="{{ route('team.show', $team->id) }}"><i class="fa fa-eye"></i></a>
                            <a title="member list" class="btn btn-sm btn-info" href="{{ route('team.member.list', $team->id) }}"><i class="fa fa-plus"></i></a>
                            <a class="btn btn-sm btn-light" href="{{ route('team.leader', $member->id) }}"><i class="fa fa-user-plus"></i>Make Leader</a>

                        </td>
                    </tr>
                    @endforeach


                </tbody>
                <tfoot>
                <tr>
                    <th width="30%">Member Name</th>
                    <th width="20%">Satus</th>
                    <th width="30%">Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
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
