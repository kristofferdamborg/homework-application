@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <div class="row">
                <div class="col-xs-6">
                <h3>
                    Lectie Oversigt For {{ $schoolclass->name }}
                </h3>
                <p style="font-size: large;"><a href="{{ route('homework.index') }}"> <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Tilbage til klasse oversigt</a></p>
                </div><div class="col-xs-6">
                <h3><a style="float: right;" class="btn btn-primary btn-lg" href="{{ route('homework.create') }}">Opret Lektie</a></h3>
                </div>
                
                </div>	
                </div>

                <div class="panel-body">
		<table class="table table-responsive table-hover" style="width:100%; font-size: large;">
			<tr style="text-align: center;">
				<th>Title</th>
				<th>Beskrivelse</th> 
				<th>Fag</th>
				<th>Offentliggøres</th>
				<th>Afsluttes</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			@foreach ($schoolclass->homeworks as $HW)
			<tr style="border-bottom: 1px solid gray; height: 35px;">
				<td>{{ $HW->title }}</td>
		    		<td>{{ $HW->description }}</td> 
		    		<td>{{ $arr[$HW->subject_id] }}</td>
		    		<td>{{ $HW->started_at }}</td> 
		    		<td>{{ $HW->due_at }}</td>

		    		<td style=" text-align: center;"><a class="btn btn-default btn-lg" href="{{ route('homework.edit', $HW->id) }}"><span style="color: lightgreen;" class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a></td>
		    		<td style="text-align: center;"><form action="{{ URL::route('homework.destroy', $HW->id) }}" method="POST"><input type="hidden" name="_method" value="DELETE">
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