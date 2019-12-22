@extends('layouts.backend.master')
@section('base.title', 'Admin')
@section('master.content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 20%">
                        Project Title
                    </th>
                    <th style="width: 20%">
                        Description
                    </th>
                    <th style="width: 20%">
                        Client
                    </th>
                    <th style="width: 20%">
                        Estimated Budget
                    </th>
                    <th style="width: 20%">
                        Estimated Project Duration
                    </th>
                </tr>
                </thead>

                <tbody>
                @foreach($team->projects as $project)
                    <tr>
                        <td>
                            {{ $project->title }}
                        </td>
                        <td>
                            {{ $project->duration }}
                        </td>
                        <td>
                            {{ $project->client  }}
                        </td>
                        <td>
                            {{ $project->estimated_budget  }}
                        </td>
                        <td>
                            {{ $project->estimated_project_duration  }}
                        </td>
                        <td>
                            <a href="{{route('project.show',$project->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
   </div>
    </section>
@endsection
