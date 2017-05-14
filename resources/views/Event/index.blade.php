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
                    Event Oversigt
                </h3>
                <p>Her kan du som underviser oprette events, dette kan række sig fra unikke events for klasserne eller lektiecafe</p>
                </div>
                <div class="col-xs-6">
                    <h3><a style="float: right;" class="btn btn-primary btn-lg" href="{{ route('event.create') }}">Opret event</a></h3>
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
                            <th>Klasse</th>
                            <th>Sidst opdateret</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($school->events as $event)
                        <tr style="border-bottom: 1px solid gray; height: 35px;">
                                <td><a href="{{ route('event.show', $event->id)}}"> {{ $event->name }} </a></td>
                                <td>{{ $event->type }}</td> 
                                <td>{{ $event->description }}</td>
                                <td>{{ $event->start_time }}</td> 
                                <td>{{ $event->end_time }}</td>
                                <td>{{ $arr[$event->school_class_id] }}</td>
                                <td>{{ $event->updated_at }}</td>

                                <td style=" text-align: center;"><a class="btn btn-default btn-lg" href="{{ route('event.edit', $event->id) }}"><span style="color: lightgreen;" class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a></td>
                                <td style="text-align: center;"><form action="{{ URL::route('event.destroy', $event->id) }}" method="POST"><input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class="btn btn-default btn-lg"><span style="color: red;" class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></form></td>
                        </tr>
                         @endforeach
                        </table>
                </div>  
                
            </div>
        </div>
    </div>
</div>
@endsection