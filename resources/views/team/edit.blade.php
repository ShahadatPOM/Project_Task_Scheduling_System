@extends('layouts.backend.master')

@section('base.title', 'Admin')


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
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8 offset-sm-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Department Edit Form</h3>
                        </div>
                        <form action="{{ route('team.update', $team->id) }}" method="post">
                            @csrf
                            <div class="card-body">

                                <div>
                                    <label for="tagName">Department</label>
                                    <select class="form-control" name="department_id" id="">
                                        <option selected>Select Department</option>
                                        <option value="{{$team->department->id}}"
                                                selected>{{$team->department->name}}</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('department_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="tagName">Team Name</label>
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           placeholder="enter team name" value="{{$team->name}}">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Team Members</label>
                                    <div class="select2-blue">
                                        <select class="select2" multiple="multiple" name="members[]"
                                                data-placeholder="Select a Member" style="width: 100%;">
                                            @foreach($team->users as  $user)
                                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                            @endforeach
                                                @foreach($users as  $user)
                                                    <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label for="tagName">Status</label>
                                    <select class="form-control" name="status">
                                        <option disabled selected>Select Status</option>
                                        <option value="1" {{$team->status == 1 ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$team->status == 0 ? 'selected' : ''}}>Inactive</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="card-footer">
                                    <a href="{{ route('team.index') }}" class="btn btn-sm btn-danger">BACK</a>
                                    <button onclick="return confirm('Are you sure to update this')" type="submit"
                                            class="btn btn-primary btn-sm">Update
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
