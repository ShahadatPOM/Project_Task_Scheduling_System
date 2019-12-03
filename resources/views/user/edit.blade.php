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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User Create</h3>
                        </div>
                        <form action="{{ route('user.update', $user->id) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="tagName">Name</label>
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ $user->name }}">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tagName">User Name</label>
                                        <input id="username" type="text"
                                               class="form-control @error('username') is-invalid @enderror"
                                               name="username"
                                               value="{{ $user->username }}">

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tagName">Email</label>
                                        <input id="email" type="text"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ $user->email }}">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="tagName">Department</label>
                                        <select class="form-control" name="department_id">
                                            <option selected value="{{ $user->department_id}}">{{ $user->department->name }}</option>
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tagName">Assign Role</label>
                                        <select class="form-control" name="role_id">
                                            <option selected value="{{ $user->role->id }}">{{ $user->role->name }}</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="tagName">Status</label>
                                        <select class="form-control" name="status">
                                            <option selected value="{{ $user->status == 'Active'?1 : 0 }}">{{ $user->status == 1? 'Active' : 'Inactive' }}</option>
                                            @if($user->status == 0)
                                            <option value="1">Active</option>
                                            @else
                                            <option value="0">Inactive</option>
                                                @endif
                                        </select>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-danger">BACK</a>
                                <button type="submit" class="btn btn-primary btn-sm">Done</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
