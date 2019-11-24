@extends('layouts.backend.base')

@section('base.content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="login-box">
                    <div class="login-logo">
                        <a href=""><b style="color: red">Datatrix</b>Soft</a>
                    </div>
                    <!-- /.login-logo -->
                    <div class="card">
                        <div class="card-body login-card-body">
                            <p class="login-box-msg">Sign in to start your session</p>

                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           placeholder="Email"
                                           name="email" value="{{ old('email') }}
                                        ">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="remember"
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="remember">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                        <!-- /.login-card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
