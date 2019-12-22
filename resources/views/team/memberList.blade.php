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
    <div style=" margin-left: 50%; margin-top: 10px;">
        <a href="" class="btn btn-info" style= " border: 2px; width: 70px">PDF <i class="fa fa-eye"></i></a>
        <a href="" class="btn btn-primary" style= "border: 2px; width: 70px">PDF <i class="fa fa-download"></i></a>
    </div>
    {{--member for each team--}}
    <div class="card">
        <div class="card-header">
            <h4 style="text-align: center">Team Members of <a href="">{{ $team->name }}</a></h4>
            <h4 style="text-align: center">Department <a href="">{{$team->department ?  $team->department->name : ''}}</a></h4>
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

                @foreach($team->users as $member)
                    <tr>
                        <td>{{ $member->name }} @if($member->role_id == 3) (Leader) @endif</td>
                        <td>
                            @if($member->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-warning">Inactive</span>
                            @endif
                        </td>

                        <td>
                            <a title="delete" onclick="return confirm('Are you sure to delete this')" class="btn btn-sm btn-danger" href="{{ route('team.remove.member', $member->id) }}"><i class="fa fa-trash"></i></a>
                            <a title="view" class="btn btn-sm btn-info" href="{{ route('team.show', $team->id) }}"><i class="fa fa-eye"></i></a>
                            {{--                            <a title="member list" class="btn btn-sm btn-info" href="{{ route('team.member.list', $team->id) }}"><i class="fa fa-plus"></i></a>--}}

                            @if ( $member->role_id == 3)
                                <a class="btn btn-sm btn-warning pull-right" href="{{ route('team.leader.change', $member->id) }}"><i class="fa fa-edit"></i>Change Leader</a>
                            @endif

                            @if ( !(in_array(3,$roles)))
                                <a class="btn btn-sm btn-success pull-right" href="{{ route('team.leader', $member->id) }}"><i class="fa fa-edit"></i>Make Leader</a>

                            @endif
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

        });
    </script>
@endpush
