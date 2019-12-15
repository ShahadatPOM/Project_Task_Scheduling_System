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
                        <a href="" class="btn btn-info" style=" border: 2px; width: 70px">PDF <i class="fa fa-eye"></i></a>
                        <a href="" class="btn btn-primary" style="border: 2px; width: 70px">PDF <i
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

            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="card card-outline card-orange col-4 offset-1" style="min-height: 70px">
                                <small style="text-align: center; font-size: 14px">Estimated Project Duration</small>
                                <strong style="text-align: center">{{ $project->estimated_project_duration }}
                                    Days</strong>
                            </div>
                            <div class="card card-outline card-orange col-4 offset-1" style="min-height: 70px">
                                <small style="text-align: center; font-size: 14px">Estimated Budget</small>
                                <strong style="text-align: center">{{ $project->estimated_budget }}/=</strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10 offset-1">
                                <small style="text-align: center; font-size: 16px; font-weight: bold">Description</small>
                                <p style="font-family: 'Times New Roman'; font-size: 14px ">{{ $project->description }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8 offset-1">
                                <caption>Required Files</caption>
                                <table class="table" style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Requirement</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($project->files as $key => $file)
                                        <tr>
                                            <td>{{ $key++ }}</td>
                                            <td>{{ $file->filename }}</td>
                                            <td><i class="fa fa-download"></i></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <caption>Requirements</caption>
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
                    </div>
                </div>
                <div class="row">
                    <div class="card card-outline card-orange col-6 offset-3" style="min-height: 100px; max-width: 300px;" >
                        project progress pie chart
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card -->

    </section>

@endsection
@push('base.js')

@endpush
