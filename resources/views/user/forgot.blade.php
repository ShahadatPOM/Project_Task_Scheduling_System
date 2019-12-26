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
                            <p class="login-box-msg">Enter your Eamil to reset</p>

                            <form action="{{ route('user.reset') }}" method="post">
                                @csrf

                                <div class="input-group mb-3">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Sent Link</button>
                                </div>
                                <!-- /.col -->
                            </form>
                        </div>
                        <!-- /.login-card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
