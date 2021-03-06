@extends('layouts.backend.master')

@section('base.title', 'Admin')
@push('base.css')

@endpush
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
                            <h3 class="card-title">Department Create</h3>
                        </div>
                        <form action="{{ route('department.store') }}" method="post">
                            @csrf
                            <div class="card-body">

                                    <div>
                                        <label for="tagName">Department Name</label>
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" >

                                        @error('name')
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
                                <a href="{{ route('department.index') }}" class="btn btn-sm btn-danger">BACK</a>
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

@endpush
