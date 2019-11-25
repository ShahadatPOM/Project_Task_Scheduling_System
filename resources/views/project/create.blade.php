@extends('layouts.backend.master')

@section('base.title', 'Admin')


@section('master.content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Add</h1>
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
        <form action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>

                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Title</label>
                                <input type="text" name="title" id="inputName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Requirements</label>
                                <div class="select2-blue">
                                    <select class="select2" multiple="multiple" name="requirements[]"
                                            data-placeholder="Select user requirements" style="width: 100%;">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Required Files</label>
                                <input type="file" class="form-control" name="photos[]" multiple/>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Budget</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputDescription">Client</label>
                                <input type="text" name="client" id="inputName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Estimated budget</label>
                                <input type="number" name="estimated_budget" id="inputEstimatedBudget"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedDuration">Estimated project duration</label>
                                <input type="number" name="estimated_project_duration" id="inputEstimatedDuration"
                                       class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-1">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Project Description</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <textarea name="description" class="textarea"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                </textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div>
                                <a href="#" class="btn btn-secondary">Cancel</a>
                                <input type="submit" value="Create" class="btn btn-success float-right">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </section>

    <!-- /.content -->

    <!-- /.content-wrapper -->
@endsection
@push('base.js')
    <!-- Select2 -->
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2({
                'tags': true,
            });
        })
    </script>
@endpush
