@extends('layouts.backend.master')

@section('base.title', 'Admin')

@section('master.content')
    @if(session()->has('message'))
        <div class="col-sm-4 offset-sm-2 alert">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        Project Title
                    </th>
                    <th style="width: 20%">
                        Task Title
                    </th>
                    <th style="width: 15%">
                        Arrived
                    </th>
                    {{-- <th style="width: 15%">
                         Task Progress
                     </th>--}}
                    <th style="width: 8%" class="text-center">
                        Status
                    </th>
                    <th class="text-center" style="width: 20%">
                        Action
                    </th>
                </tr>
                </thead>
                @php
                    $projects=[];
                    $statuses = [];
                @endphp
                <tbody>
                @if(Auth::user()->role->id == 4)
                    @foreach($task->requirements as $key => $req)
                        <tr>
                            <td>{{ $key++ }}</td>
                            @if(!in_array($req->project->title,$projects))
                                @php
                                    $projects[] = $req->project->title;
                                @endphp
                                <td rowspan="{{ count($task->requirements) }}">{{ $req->project->title }}</td>
                            @endif
                            <td>
                                {{ $req->name }}
                            </td>
                            <td>
                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $task->created_at)->diffForHumans() }}
                            </td>
                            {{--  <td rowspan="{{ count($task->requirements) }}" class="project_progress">
                                  @if($task->status == 1)
                                      <small>
                                          <div class="progress progress-sm">
                                              <div class="progress-bar bg-red" role="progressbar" aria-volumenow="0" aria-volumemin="0" aria-volumemax="100" style="width: 100%">
                                              </div>
                                          </div>
                                          Pending
                                      </small>
                                  @elseif($task->status == 2)
                                      <small>
                                          <div class="progress progress-sm">
                                              <div class="progress-bar bg-yellow" role="progressbar" aria-volumenow="100"
                                                   aria-volumemin="0"
                                                   aria-volumemax="100" style="width: 100%">
                                              </div>
                                          </div>
                                          On Going
                                      </small>
                                  @elseif($task->status == 3)
                                      <small>
                                          <div class="progress progress-sm">
                                              <div class="progress-bar bg-green" role="progressbar" aria-volumenow="100"
                                                   aria-volumemin="0"
                                                   aria-volumemax="100" style="width: 100%">
                                              </div>
                                          </div>
                                          Completed
                                      </small>
                                  @endif
                              </td>--}}
                            @if(!in_array($task->status, $statuses))
                                @php
                                    $statuses[] = $task->status;
                                @endphp
                                <td rowspan="{{ count($task->requirements) }}" class="project-state">

                                    @if($task->status == 1 )
                                        <span class="badge badge-danger">Pending</span>
                                    @else
                                        <span class="badge badge-warning">Assigned</span>

                                    @endif

                                </td>
                            @endif

                            <td></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection


