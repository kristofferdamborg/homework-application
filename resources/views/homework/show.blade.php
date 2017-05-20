@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <div class="row">
                @if (Auth::user()->hasRole('pupil'))
                <div class="col-xs-6">
                <h2>Dine lektier</h2>
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Alle fag
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Dansk</a></li>
                    <li><a href="#">Matematik</a></li>
                    <li><a href="#">Engelsk</a></li>
                  </ul>
                </div>
                </div>
                @else
                <div class="col-xs-6">
                <h3>
                    Lectie Oversigt For {{ $schoolclass->name }}
                </h3>
                
                <p style="font-size: large; display: block;"><a href="{{ route('homework.index') }}"> <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Tilbage til klasse oversigt</a></p>
                </div>
                <div class="col-xs-6">
                <h3><a style="float: right;" class="btn btn-primary btn-lg" href="{{ route('homework.create') }}">Opret Lektie</a></h3>
                </div>
                @endif
                </div>	
                </div>

                <div class="panel-body">


                        <h4>Denne uge</h4>
                        {{-- <div class="form-group">
                            <select class="form-control btn-primary btn" name="school_class_id" required>
                                <option value="0" selected>Alle fag                             
                                </option>
                                @foreach($school->subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="row">

                        @foreach ($schoolclass->homeworks as $HW)
                        <a style="color: #0f0f0f; cursor: pointer;" class="btn-link" type="button" class="" data-toggle="modal" data-target="#{{ $HW->id }}"><div class="col-xs-12">
                        <div style="height: 85px; background-color: #f4f4f4; margin-bottom: 15px;">
                            <div style="width: 85px; float: left; line-height: 85px; text-align: center; background-color: {{ $carr[$HW->subject_id] }};" >
                            {{ $narr[$HW->subject_id] }}
                            </div>
                            <div style="line-height: 85px; padding-right: 10px;">
                             <p style="padding-left: 10px; height: 100%; float: left;">{{ $HW->title }}</p>
                            <p style="float: right; height: 100%;">{{ $HW->due_at }}</p></div>
                        </div></div></a>
                        <div id="{{ $HW->id }}" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title">{{ $HW->title }}</h3>
                              </div>
                              <div class="modal-body">
                                <h4><strong>Fag:</strong> {{ $narr[$HW->subject_id] }}</h4>
                                <h4><strong>Beskrivelse:</strong></h4>
                                <p>{{ $HW->description }}</p>
                                <hr>
                                <h4><strong>Dato & tid</strong></h4>
                                <p>Opgaven startede: {{ $HW->started_at }}</p> 
                                <p>Opgaven afsluttes: {{ $HW->due_at }}</p>
                                <hr>
                                <p>Sidst opdateret: {{ $HW->updated_at }}</p>
                              </div>
                              <div class="modal-footer">
                              @role('teacher')
                                <a style="min-width: 100px; float: left; margin-right: 5px;" class="btn btn-primary btn-lg" href="{{ route('homework.edit', $HW->id) }}"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Edit</a>

                                <form action="{{ URL::route('homework.destroy', $HW->id) }}" method="POST"><input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                                <button style="min-width: 100px; float: left;" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                                <button style="min-width: 100px; float: right;" type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
                                @endrole
                              </div>
                            </div>

                          </div>
                        </div>
                        @endforeach
                        </div>
                        <h4>Senere</h4>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection