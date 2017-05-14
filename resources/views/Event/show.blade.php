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
                    Event: {{ $event->name }}
                </h3>
                </div>
                <div class="col-xs-6">
                <div style="float: right;">
                    <a style="min-width: 200px" class="btn btn-primary btn-lg" href="{{ route('event.edit', $event->id) }}"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Edit</a></h3>
                    <form action="{{ URL::route('event.destroy', $event->id) }}" method="POST"><input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                <button style="min-width: 200px" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button></form></div>
                </div>
                </div></div>

                <div class="panel-body">
                                <h4><strong>Tybe af event:</strong> {{ $event->type }}</h4> 
                                <h4><strong>Tilknyttet klasse:</strong> {{ $className }}</h4>
                                <h4><strong>Beskrivelse</strong></h4>
                                <p>{{ $event->description }}</p>
                                <hr>
                                <h4><strong>Dato & tid</strong></h4>
                                <p>Eventet starter: {{ $event->start_time }}</p> 
                                <p>Eventet slutter: {{ $event->end_time }}</p>
                                <hr>
                                <p>Sidst opdateret: {{ $event->updated_at }}</p>
                </div>  
                
            </div>
        </div>
    </div>
</div>
@endsection