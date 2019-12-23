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
                    <th >
                        #
                    </th>
                    <th>
                        Description
                    </th>
                        <th >Description</th>
                        <th >File</th>
                        <th >Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @php
                    $tasks = [];
                @endphp
                <tbody>
                    @foreach($project->tasks as $key=> $task)
                        @foreach($task->requirementSubmissions as $submit)
                            <tr>
                                <td>{{$key+1}}</td>
                                @if (!in_array($task->id, $tasks))
                                @php $tasks[] = $task->id; @endphp
                                <td style="text-align: center;" rowspan="{{count($task->requirementSubmissions)}}">{{$task->description}}</td>
                                @endif
                                        <td>{{$submit->description}}</td>
                                        <td><a href="{{route('project.download',$submit->id)}}">{{$submit->file}}</a></td>
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
                                                    <input type="submit" id="submit">
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
@endsection
@push('base.js')
    <script>
        $(function () {
            $("#formButton").click(function () {
                $("#form1").toggle();
            });
        });
    </script>
@endpush
