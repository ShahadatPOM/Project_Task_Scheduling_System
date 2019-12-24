@extends('layouts.backend.master')

@section('base.title', 'Admin')


@section('master.content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Assign</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Project Add</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('project.assign', $project->id) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Assign Project</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputDescription">Project Title</label>
                                <input readonly type="text" name="title" value="{{ $project->title }}"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Team</label>
                                <div class="select2-blue">
                                    <select class="form-control select2" name="team[]" id="" multiple="multiple">
                                        @foreach($project->departments as $department)
                                            <optgroup label="{{$department->name}}">
                                                @foreach($department->teams as $team)

                                                    <option class="form-control"
                                                            value="{{ $team->id }}">{{ $team->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('project.index') }}" class="btn btn-sm btn-danger">BACK</a>
                            <button type="submit" class="btn btn-primary btn-sm">Assign</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
