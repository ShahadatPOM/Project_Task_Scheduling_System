@extends('layouts.backend.master')

@section('base.title', 'Admin')

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

        <div class="card-body">
            <table id="example1" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Action</th>
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
                                    <a href="{{url('permissions/create',$role->id)}}" class="btn btn-primary btn-sm"><i
                                            class="fa fa-eye"></i></a>
                                @else
                                    <a href="{{url('permissions/edit',$role->id)}}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>
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
