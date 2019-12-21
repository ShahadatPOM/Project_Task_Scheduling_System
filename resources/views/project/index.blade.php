@extends('layouts.backend.master')

@section('base.title', 'Admin')

@section('master.content')
    @if(session()->has('message'))
        <div class="col-sm-4 offset-sm-2 alert">
            {{ session()->get('message') }}
        </div>
    @endif
    <div style=" margin-left: 50%; margin-top: 10px;">
        <a href="" class="btn btn-info" style=" border: 2px; width: 70px">PDF <i class="fa fa-eye"></i></a>
        <a href="" class="btn btn-primary" style="border: 2px; width: 70px">PDF <i class="fa fa-download"></i></a>
    </div>
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body p-0">

            <table id="example1" class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        Project Title
                    </th>
                    <th style="width: 15%">
                        Arrived
                    </th>
                    <th style="width: 15%">
                        Project Progress
                    </th>
                    <th style="width: 8%" class="text-center">
                        Status
                    </th>
                    <th class="text-center" style="width: 20%">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                {{--@if(Auth::user()->role->id == 1)--}}
                    @foreach($projects as $project)
                        <tr>
                            <td>
                                {{ $project->id }}
                            </td>
                            <td>
                                <a>
                                    {{ $project->title }}
                                </a>
                                <br/>
                            </td>
                            <td>
                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $project->created_at)->diffForHumans() }}
                                <br/>
                            </td>
                            <td class="project_progress">
                                @if($project->status == 0)
                                    <small>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-red" role="progressbar" aria-volumenow="0"
                                                 aria-volumemin="0" aria-volumemax="100" style="width: 100%">
                                            </div>
                                        </div>
                                        Not assigned yet
                                    </small>
                                @elseif($project->status == 1)
                                    <small>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-orange" role="progressbar" aria-volumenow="100"
                                                 aria-volumemin="0"
                                                 aria-volumemax="100" style="width: 100%">
                                            </div>
                                        </div>
                                        Not started yet
                                    </small>
                                @endif
                            </td>

                            <td class="project-state">

                                @if($project->status == 0 && $project->team_id == null)
                                    <span class="badge badge-danger">Pending</span>
                                @else
                                    <span class="badge badge-warning">Assigned</span>

                                @endif
                            </td>

                            <td class="project-actions text-center">
                                <a title="view" class="btn btn-sm btn-primary"
                                   href="{{ route('project.show', $project->id) }}"><i class="fa fa-eye"></i></a>
                                <a title="edit" class="btn btn-sm btn-warning"
                                   href="{{ route('project.edit', $project->id) }}"><i class="fa fa-pencil"></i></a>
                                <a title="delete" onclick="return confirm('Are you sure to delete this')"
                                   class="btn btn-sm btn-danger" href="{{ route('project.delete', $project->id) }}"><i
                                        class="fa fa-trash"></i></a>
                                @if($project->status == 0 && $project->team_id == null)
                                    <a href="{{ route('project.assignForm', $project->id) }}">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>Assign
                                        </button>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
             {{--   @endif--}}
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection
