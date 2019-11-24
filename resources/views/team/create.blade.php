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
                            <h3 class="card-title">Team Create</h3>
                        </div>
                        <form action="{{ route('team.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div>
                                    <label for="tagName">Team Name</label>
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           placeholder="enter team name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <div>
                                        <label for="tagName">Department Name</label>
                                        <input id="id" type="text" hidden
                                               class="form-control @error('department_id') is-invalid @enderror" name="department_id"
                                               value="{{ $department->id }}" >
                                        <input id="name" type="text" readonly
                                               class="form-control @error('department_name') is-invalid @enderror" value="{{ $department->name }}" >

                                        @error('department_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                <div class="form-group">
                                    <label>Team Members</label>
                                    <div class="select2-blue">
                                    <select class="select2" multiple="multiple" name="members[]" data-placeholder="Select a Member" style="width: 100%;">
                                       @foreach($users as  $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>

                                {{--<div>
                                    <label for="tagName">Team Members</label>
                                    <select style="width: 100%;"  class="select2" multiple="multiple"  name="members">
                                        <option disabled selected>Select Member</option>
                                        @foreach($users as $user)
                                            <option class="form-control"  value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('members')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>--}}
                                <div>
                                    <label for="tagName">Project Title</label>
                                    <select class="form-control @error('project_id') is-invalid @enderror"  name="project_id" id="">
                                        <option disabled selected>Select Project</option>
                                        @foreach($projects as $project)
                                        <option class="form-control"  value="{{ $project->id }}">{{ $project->title }}</option>
                                            @endforeach
                                    </select>

                                    @error('project_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <div>
                                        <label for="tagName">Status</label>
                                        <select class="form-control" name="status">
                                            <option disabled selected>Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                        </select>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                            <div class="card-footer">
                                <a href="{{ route('team.index') }}" class="btn btn-sm btn-danger">BACK</a>
                                <button type="submit" class="btn btn-primary btn-sm">Done</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.card -->
@endsection
@push('base.js')
    <!-- Select2 -->
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2({
                'tags':true,
            });
        })
   </script>
    @endpush
