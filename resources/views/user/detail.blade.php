@extends('layouts.backend.master')

@section('base.title', 'Users')

@section('master.content')
    @if(session()->has('message'))
        <div class="col-sm-4 offset-sm-2 alert">
            {{ session()->get('message') }}
        </div>
    @endif

    <div style=" margin-left: 50%; margin-top: 10px;">
        <a target="_blank" href="" class="btn btn-info" style= " border: 2px; width: 70px">PDF <i class="fa fa-eye"></i></a>
        <a href="" class="btn btn-primary" style= "border: 2px; width: 70px">PDF <i class="fa fa-download"></i></a>
    </div>

    <div class="card">
        <div class="card-header">
            <a
                class="btn btn-outline-info" href=""><i class="fa fa-plus"></i> User</a>
        </div>

        <div class="card-body">
            <div class="col-md-6 offset-3">
                <div class="card card-widget widget-user-2">
                    <div class="widget-user-header bg-secondary">
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="{{url('files/'.$user->profile->image )}}" alt="User Avatar">
                        </div>
                        <h3 class="widget-user-username" style="text-transform: uppercase;">{{ $user->name }}</h3>
                        <small style="margin-left: 10px">{{ $user->profile->designation }} <b>(Dept. {{ $user->department->name }})</b></small>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Projects <span class="float-right badge bg-primary">31</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Tasks <span class="float-right badge bg-info">5</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Completed Projects <span class="float-right badge bg-success">12</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Followers <span class="float-right badge bg-danger">842</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

