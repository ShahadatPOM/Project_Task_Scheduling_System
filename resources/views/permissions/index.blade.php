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
        <a href="" class="btn btn-info" style=" border: 2px; width: 70px">PDF <i class="fa fa-eye"></i></a>
        <a href="" class="btn btn-primary" style="border: 2px; width: 70px">PDF <i class="fa fa-download"></i></a>
    </div>
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body p-0">

            <table id="example1" class="table table-striped projects">
                <thead>
                <tr>
                      <th style="width: 15%">
                        Serial
                    </th>
                    <th style="width: 8%" class="text-center">
                        Name
                    </th>
                    <th class="text-center" style="width: 20%">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @if(Auth::user()->role->id == 1)
                    @foreach($roles as $key => $role)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                <a>
                                    {{ $role->name }}
                                </a>
                            </td>
                            <td>
                                @if(! $role->permissions()->exists())
                                <a href="{{url('permissions/create',$role->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                @else
                                <a href="{{url('permissions',$role->id.'/edit')}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                @endif
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

        });
    </script>
@endpush
