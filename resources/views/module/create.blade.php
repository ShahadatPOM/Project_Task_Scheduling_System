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
                            <h3 class="card-title">Module Create</h3>
                        </div>
                        <form action="{{ route('module.store', $project->id) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div>
                                    <label for="tagName">Project Title</label>
                                    <input id="name" type="text" hidden
                                           class="form-control @error('project_id') is-invalid @enderror" name="project_id"
                                           value="{{ $project->id }}" >

                                    <input id="name" type="text" readonly
                                           class="form-control @error('title') is-invalid @enderror" name="title"
                                           value="{{ $project->title }}" >

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Project Module</label>
                                    <div class="select2-blue">
                                        <select class="select2" multiple="multiple" name="module[]" data-placeholder="Select a Member" style="width: 100%;">
                                                <option value="{{ $project->id }}"></option>
                                        </select>
                                    </div>
                                </div>
                                    <div>
                                        <label for="tagName">Status</label>
                                        <select class="form-control" name="status">
                                            <option disabled selected>Select Status</option>
                                                <option value="1">Done</option>
                                                <option value="0">Pending</option>
                                        </select>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                            <div class="card-footer">
                                <a href="{{ route('project.index') }}" class="btn btn-sm btn-danger">BACK</a>
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
