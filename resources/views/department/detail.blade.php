@extends('layouts.backend.master')

@section('base.title', 'Project|Detail')


@push('base.css')

@endpush
@section('master.content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div style=" margin-left: 50%; margin-top: 10px;">
                        <a target="_blank" href="{{ route('viewDepartmentDetail', $department->id) }}" class="btn btn-info" style=" border: 2px; width: 70px">PDF <i class="fa fa-eye"></i></a>
                        <a target="_blank" href="{{ route('viewDepartmentDetail', $department->id) }}" class="btn btn-primary" style="border: 2px; width: 70px">PDF <i
                                class="fa fa-download"></i></a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Department Detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-outline card-red">
            <div class="card-header">
                <h3 class="card-title">Detail of <strong>{{ $department->name }}</strong> Department</h3>
            </div>
            @php
                use Carbon\Carbon;
                $date = Carbon::parse($department->created_at);
            @endphp


            <div class="card-body">
                <div class="row offset-2" >
                <div class="card card-outline card-orange col-2" style="min-height: 80px; margin-right: 10px">
                    <small style="text-align: center; font-size: 16px; color: darkorange"><i class="fa fa-star" style="color: #985f0d"></i> Total Team</small>
                    <strong style="text-align: center"> {{ count($department->teams) }}</strong>
                </div>
                <div class="float-right card card-outline card-orange col-2" style="min-height: 80px; margin-right: 10px">
                    <small style="text-align: center; font-size: 16px; color: darkorange"><i class="fa fa-star" style="color: #985f0d"></i> Total Project</small>
                    <strong style="text-align: center">{{ count($department->projects) }}</strong>
                </div>
                <div class="float-right card card-outline card-orange col-2" style="min-height: 70px; margin-right: 10px">
                    <small style="text-align: center; font-size: 16px; color: darkorange"><i class="fa fa-star" style="color: #985f0d"></i> Pending Project</small>
                    <strong style="text-align: center">{{ count($department->projects->where('status', 0)) }}</strong>
                </div>
                <div class="float-right card card-outline card-orange col-2" style="min-height: 80px; margin-right: 10px">
                    <small style="text-align: center; font-size: 16px; color: darkorange"><i class="fa fa-star" style="color: #985f0d"></i> Completed Project</small>
                    <strong style="text-align: center">{{ count($department->projects->where('status', 2)) }}</strong>
                </div>
                </div>
                <div class="row col-md-12">

                        <div class="col-6">
                        <p style="font-weight: bold;">Teams</p>
                        <table class="table" style="text-align: center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Team</th>
                                <th scope="col">Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($department->teams) != 0)
                            @foreach($department->teams as $key => $team)
                                <tr>
                                    <th scope="row">{{ $key++ }}</th>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->created_at }}</td>
                                </tr>
                            @endforeach
                                @else
                            <tr>
                               <td colspan="3"> Has no Team Yet </td>
                            </tr>
                                @endif
                            </tbody>
                        </table>
                        </div>
                        <div class="col-6 float-right">
                        <p style="font-weight: bold;">Projects</p>
                        <table class="table" style="text-align: center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Projects</th>
                                <th scope="col">Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($department->projects as $key => $project)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $project->title  }}</td>
                                    <td>{{ $project->created_at  }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('base.js')

@endpush
