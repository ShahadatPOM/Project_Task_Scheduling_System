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
                    <div class="card card-green">
                        <div class="card-header">
                            <h3 class="card-title">ADD NEW USER</h3>
                        </div>
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tagName">Name</label>
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label for="tagName">User Name</label>
                                    <input id="username" type="text"
                                           class="form-control @error('username') is-invalid @enderror" name="username"
                                           value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label for="tagName">Email</label>
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label for="tagName">Designation</label>
                                    <input id="designation" type="text"
                                           class="form-control @error('designation') is-invalid @enderror"
                                           name="designation"
                                           value="{{ old('designation') }}" required autocomplete="designation"
                                           autofocus>

                                    @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                    <label for="tagName">Password</label>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label for="tagName">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">

                                    <label for="tagName">User Role</label>
                                    <select class="form-control" name="category_id" id="">
                                        <option disabled selected>Select Role</option>

                                        <option value=""></option>

                                    </select>


                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="" class="btn btn-sm btn-danger">BACK</a>
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
