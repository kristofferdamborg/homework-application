@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <div class="row">
                <h3 class="col-xs-6">
                    Lectie Oversigt
                </h3>
                <div class="col-xs-6">
                    <h3><a style="float: right;" class="btn btn-primary btn-lg" href="{{ route('homework.create') }}">Opret Lektie</a></h3>
                </div>
                </div></div>

                <div class="panel-body">
                <button style="font-size: large;" class="col-xs-12" data-toggle="collapse" data-target="#open">Vis Klasser</button>

                <div id="open" class="collapse">
                @foreach($school->classes as $class)
                                    <a class="col-xs-12" style="text-align: center; padding: 15px; margin-bottom:5px; margin-top:5px; font-size: large; color: gray; background-color:#f5f5f5;" href="{{ route('homework.show', $class->id) }}">{{$class->name}}</a>
                @endforeach
                </div>



                	<!--
                	<table style="width:100%">
		  <tr>
		    <th>Title</th>
		    <th>Beskrivelse</th> 
		    <th>Fag</th>
		    <th>Klasse</th>
		    <th>Offentliggøres</th>
		    <th>Afsluttes</th>
		  </tr>
		  <tr>
		  </tr>
		</table>-->
                </div>  
                
            </div>
        </div>
    </div>
</div>
@endsection