@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Session oversigt</h2>
                </div>
                <div class="panel-body">
                    <table class="table roles-table table-hover">
                        <tr>
                            <th>Tjek ind</th>
                            <th>Tjek ud</th>
                            <th>Antal timer</th>
                            <th>Beskrivelse</th>
                        </tr>

                        @forelse ($sessions as $session)
                            <tr>
                                <td><a class="session-click" data-toggle="modal" data-target="#{{ $session->id }}">{{ $session->created_at }}</a></td>
                                <td><a class="session-click" data-toggle="modal" data-target="#{{ $session->id }}">{{ $session->updated_at }}</a></td>
                                <td><a class="session-click" data-toggle="modal" data-target="#{{ $session->id }}">{{ $session->created_at->diffInHours(Carbon\Carbon::parse($session->ended_at)) }} timer</a></td>
                                <td><a class="session-click" data-toggle="modal" data-target="#{{ $session->id }}">{{ $session->description }}</a></td>
                            </tr>
                           </a>
                        @empty
                        <tr>
                            <td>No sessions.</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
                @foreach ($sessions as $session)
                        
                        <div id="{{ $session->id }}" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title">{{ $session->id }}</h3>
                              </div>
                              <div class="modal-body">
                               {{ $session->description }}
                              </div>
                            </div>

                          </div>
                        </div>
                        @endforeach
            </div>
        </div>
    </div>
</div>
@endsection