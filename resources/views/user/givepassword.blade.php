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
                            <p class="login-box-msg">Change Password</p>

                            <form action="{{ route('user.changePassword',$user->id) }}" method="post">
                                @csrf
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
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control"
                                           name="password_confirmation" placeholder="Password">
                                </div>
                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block">Change Password</button>
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
