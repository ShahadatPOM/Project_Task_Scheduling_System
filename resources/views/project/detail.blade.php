@extends('layouts.backend.master')

@section('base.title', 'Project|Detail')


@push('base.css')

@endpush
@section('master.content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Detail</h1>
                    <div style=" margin-left: 50%; margin-top: 10px;">
                        <a target=_blank href="{{ route('viewProjectDetails', $project->id) }}" class="btn btn-info" style=" border: 2px; width: 70px">PDF <i class="fa fa-eye"></i></a>
                        <a target="_blank" href={{ route('downloadProjectDetails', $project->id) }}"" class="btn btn-primary" style="border: 2px; width: 70px">PDF <i
                                class="fa fa-download"></i></a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Project Detail</li>
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
                <h3 class="card-title">Detail of <strong>{{ $project->title }}</strong> Project</h3>
            </div>
            @php
                use Carbon\Carbon;
                $date = Carbon::parse($project->created_at);
                $now = Carbon::now();
                $diff = $date->diffInDays($now);
            @endphp
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="card card-outline card-orange col-4 offset-1" style="min-height: 70px">
                                <small style="text-align: center; font-size: 14px">Estimated Project Duration</small>
                                <strong style="text-align: center">{{ $project->estimated_project_duration }} days
                                    <br> <b>Gone:</b> ({{ $diff}}) days
                                    <br> <b>Left:</b> ({{$project->estimated_project_duration - $diff  }}) days
                                </strong>
                            </div>
                            <div class="card card-outline card-orange col-4 offset-1" style="min-height: 70px">
                                <small style="text-align: center; font-size: 14px">Estimated Budget</small>
                                <strong style="text-align: center">{{ $project->estimated_budget }}/=</strong>
                            </div>
                            <div class="card card-outline card-orange col-4 offset-1" style="min-height: 70px">
                                <small style="text-align: center; font-size: 14px">Departments</small>
                                @foreach($project->departments as $department)
                                    <strong style="text-align: center"><a href="{{ route('department.detail', $department->id) }}">{{ $department->name }}</a></strong>
                                @endforeach
                            </div>
                            <div class="card card-outline card-orange col-4 offset-1" style="min-height: 70px">
                                <small style="text-align: center; font-size: 14px">Teams</small>
                                @foreach($project->teams as $team)
                                    <strong style="text-align: center"><a
                                            href="{{route('team.member.list',$team->id)}}">{{ $team->name }}</a></strong>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10 offset-1">
                                <small
                                    style="text-align: center; font-size: 16px; font-weight: bold">Description</small>
                                <p style="font-family: 'Times New Roman'; font-size: 14px ">{{ $project->description }}</p>
                            </div>
                            <div class="col-6 text-center">
                                <input type="text" readonly class="knob" value="{{$project->requirements->sum('progress')}}" data-skin="tron" data-thickness="0.2"
                                       data-width="120"
                                       data-height="120" data-fgColor="#f56954">

                                <div class="knob-label">data-width="120"</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p style="font-weight: bold;">Requirements</p>
                        <table class="table" style="text-align: center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Requirement</th>
                                <th scope="col">Percentage</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($project->requirements as $key => $requirement)
                                <tr>
                                    <th scope="row">{{ $key++ }}</th>
                                    <td>{{ $requirement->name }}</td>
                                    <td>{{ $requirement->percentage }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <p style="font-weight: bold;">Files</p>
                        <table class="table" style="text-align: center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Filename</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($project->files as $key => $file)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $file->filename }}</td>
                                    <td><a href="{{route('project.projectFile',$file->id)}}"><i
                                                class="fa fa-download"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('base.js')

@endpush
