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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail of {{ $project->title }} Project</h3>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-md-6 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-6 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Estimated budget</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{ $project->estimated_budget }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Estimated project duration</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{ $project->estimated_project_duration }} </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <div class="col-6 col-md-6 col-lg-4 order-1 order-md-2">
                        <h3><i class="fas fa-file-text"></i> Description</h3>
                        <p class="text-muted">{{ $project->description }}</p>
                        <br>
                        <div class="text-muted">
                            <p class="text-sm">Client Company
                                <b class="d-block">{{ $project->client }}</b>
                            </p>
                            <p class="text-sm">Project Leader
                                <b class="d-block">Tony Chicken</b>
                            </p>
                        </div>
                    </div>
                        <div class="col-md-6 offset-sm-2">
                            <div class="info-box ">
                                <div class="info-box-content">
                                    <span>Estimated project duration</span>
                                    @foreach($project->tasks as $task)
                                        <ul>
                                            <li>{{ $task->name }}</li>
                                        </ul>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-lg-4 order-1 order-md-2">

                        <h5 class="mt-5 text-muted">Project files</h5>
                        @foreach($project->files as $file)
                        <ul class="list-unstyled">
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> {{ $file->filename }}</a>
                            </li>
                        </ul>
                        @endforeach
                        <div class="text-center mt-5 mb-3">
                            <a href="#" class="btn btn-sm btn-primary">Add files</a>
                            <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                        </div>
                    </div>
                    </div>
                </div>


            </div>
            <!-- /.card-body -->
            </div>

            <!-- /.card -->
        </div>
    </section>

    @endsection
@push('base.js')

    @endpush
