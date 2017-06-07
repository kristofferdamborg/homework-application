@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <div class="row">
                <div class="col-xs-6">
                <h3 >
                    Kalender for {{ $class->name }}
                </h3>
                </div>
                <div class="col-xs-6">
                </div>
                </div></div>

                <div class="panel-body">
                        <table class="table table-responsive table-hover" style="width:100%; font-size: large;">
                        <tr style="text-align: center;">
                            <th>Navn</th>
                            <th>Type</th> 
                            <th>Beskrivelse</th>
                            <th>Start tid</th>
                            <th>Slut tid</th>
                        </tr>
                        @foreach($class->events as $event)
                        <tr style="border-bottom: 1px solid gray; height: 35px;">
                                <td><a href="{{ route('events.show', $event->id)}}"> {{ $event->name }} </a></td>
                                <td>{{ $event->type }}</td> 
                                <td>{{ $event->description }}</td>
                                <td>{{ $event->start_time }}</td> 
                                <td>{{ $event->end_time }}</td>
                        </tr>
                         @endforeach
                        </table>
                </div>  
                
            </div>
        </div>
    </div>
</div>
@endsection