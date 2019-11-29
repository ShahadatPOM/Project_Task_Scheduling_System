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
                                <label>Departments</label>
                                <div class="select2-blue">
                                    <select class="select2" multiple="multiple" name="departments[]" data-placeholder="Select departments" style="width: 100%;">
                                        @foreach($departments as  $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Requirements</label>
                                <div class="select2-blue">
                                    <select class="select2" multiple="multiple" name="requirements[]" data-placeholder="Select user requirements" style="width: 100%;">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            {{--<div class="col-lg-12 input-group control-group increment">
                                <input type="file" name="filenames[]" class="form-control @error('file') is-invalid @enderror"
                                       multiple
                                       accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"/>
                                <div class="input-group-btn">
                                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add
                                    </button>
                                </div>
                            </div>--}}
                            <div class="form-group">
                            <label for="">Require Files</label>

                            <div class="col-lg-12 input-group control-group increment">
                                <input type="file" class="form-control"  name="photos[]" multiple/>
                                <div class="form-group input_fields_wrap input-group-btn">
                                <button class="add_field_button btn btn-info" type="button"><i class="fa fa-plus"></i></button>
                                </div>
                             </div>
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


    $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
    x++; //text box increment
    $(wrapper).append('<div class="form-group">'+'<br>'+ '<div class="col-lg-12 input-group control-group increment">' +
        '<input type="file" name="photos[]" class="form-control"/>' +
        ' <a href="#"><div class="form-group remove_field input-group-btn">' +
        '<button class=" btn btn-info" type="button"><i class="fa fa-minus"></i></button></a></div></div></div>'); //add input box
    }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
    })
    });
    </script>
@endpush
