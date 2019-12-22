@extends('layouts.backend.master')

@section('base.title', 'Admin')

@section('master.content')
    @if(session()->has('message'))
        <div class="col-sm-4 offset-sm-2 alert">
            {{ session()->get('message') }}
        </div>
    @endif
    <style>
    form {
        padding: 15px;
        border: 1px solid #666;
        background: #fff;
        display: none;
    }
</style>
    <div class="card">
        <div class="card-header">
            Assigned Task List
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered">
                <thead>
                <tr>
                    <th rowspan="2">
                        #
                    </th>
                    <th rowspan="2">
                        Description
                    </th>
                    <th colspan="4">
                        Requirements
                    </th>
                </tr>
                <tr class="bg-gray">
                        <th>Description</th>
                        <th>File</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($project->tasks as $key=> $task)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td style="text-align: center;">{{$task->description}}</td>
                            @foreach($task->requirementSubmissions as $submit)
                            <td>{{$submit->description}}</td>
                            <td>{{$submit->file}}</td>
                            <td>{{$submit->link}}</td>
                            @php
                            $requirement = App\Requirement::where('id',$submit->requirement_id)->first();
                            @endphp
                            @if($requirement->status == 1)
                            <td><a href="{{route('project.accept',$submit->id)}}" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you waant to submit?')"><i class="fa fa-check"></i></a>
                            <button type="button" id="formButton" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button> 
                            <form id="form1" method="post" action="{{route('project.reject',$submit->id)}}">@csrf
                                <p style="color: #0c5460">Please leave a comment for rejecting this work</p>
                                <b>Comment:</b>
                                <br>
                                <textarea name="comment" rows="2" cols="50" placeholder="Enter Your Comment Here" required=""></textarea>
                                <br><br>
                                <input type="submit" id="submit"></input>
                            </form>
                        </td>
                            @endif
                            @endforeach
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @push('base.js')
    <script type="text/javascript">
    
        </script>
    @endpush
@endsection
