@extends('layouts.backend.master')

@section('base.title', 'Admin')


@section('master.content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Task Assign</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Assign Task</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('task.assign', $project->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Assign Task</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="inputDescription">Members</label>
                                <select class="form-control" name="member_id" id="">
                                    <option selected>Select member</option>
                                    @foreach($project->team->users->where('role_id','!=',3) as $member){
                                    <option class="form-control" value="{{ $member->id }}">{{ $member->name }}</option>
                                    }
                                    @endforeach
                                </select>
                                @if ($errors->has('member_id'))
                                    <span style="color: red">{{ $errors->first('member_id') }}</span><br>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tasks</label>
                                <div class="select2-blue">
                                    <select class="select2" multiple="multiple" name="tasks[]"
                                            data-placeholder="Select tasks" style="width: 100%;">

                                        @if($project->requirements)
                                            @foreach($project->requirements as $requirement)
                                                <option value="{{ $requirement->id }}">{{ $requirement->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('tasks'))
                                        <span style="color: red">{{ $errors->first('tasks') }}</span><br>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description" placeholder="description">
                                @if ($errors->has('description'))
                                    <span style="color: red">{{ $errors->first('description') }}</span><br>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" class="form-control" name="files[]" multiple>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('project.index') }}" class="btn btn-sm btn-danger">BACK</a>
                                <button type="submit" class="btn btn-primary btn-sm">Assign</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
@push('base.js')
    <!-- Select2 -->
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
        })
    </script>
@endpush
