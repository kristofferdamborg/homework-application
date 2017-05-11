@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3>
                    Lectie Oversigt For {{ $schoolclass->name }}
                </h3>
                </div>
                <div class="panel-body">
		<table style="width:100%; font-size: large;">
			<tr style="text-align: center;">
				<th>Title</th>
				<th>Beskrivelse</th> 
				<th>Fag</th>
				<th>Offentliggøres</th>
				<th>Afsluttes</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			@foreach ($schoolclass->homeworks as $homework)
			<tr style="border-bottom: 2px solid gray; height: 35px;">
				<td>{{ $homework->title }}</td>
		    		<td>{{ $homework->description }}</td> 
		    		<td>{{ $arr[$homework->subject_id] }}</td>
		    		<td>{{ $homework->started_at }}</td> 
		    		<td>{{ $homework->due_at }}</td>

		    		<a href="{{ route('homework.edit', $homework->id) }}"><td style="color: lightgreen; text-align: center;"><a href=""><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></td></a>
		    		<a href="{{ route('homework.destroy', $homework->id) }}"><td style="color: red; text-align: center;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></td></a>
			</tr>
			@endforeach
		</table>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection