@extends('layouts.backend.master')

@section('base.title', 'Admin')


@section('master.content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Submit Task</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Submit Task</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('task.task-submit', $requirement->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Submit "{{$requirement->name}}" Requirement</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description" placeholder="description">
                                @if ($errors->has('description'))
                                    <span style="color: red">{{ $errors->first('description') }}</span><br>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" class="form-control" name="file" multiple>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Prefarable Link</label>
                                    <input type="text" class="form-control" name="link" placeholder="e.g. github.com/ShahadatPOM">
                                    @if ($errors->has('description'))
                                        <span style="color: red">{{ $errors->first('description') }}</span><br>
                                    @endif
                                </div>
                            <div class="card-footer">
                                <a href="{{ route('project.index') }}" class="btn btn-sm btn-danger">BACK</a>
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
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
