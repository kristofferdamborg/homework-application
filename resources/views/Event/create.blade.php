@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3>
                    Opret Event
                </h3>
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('event.store') }}">
                    {{ csrf_field() }}

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Navn">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="type" placeholder="Type"></input>
                        </div>

                        <div class="form-group">
                            <input type="hidden" class="form-control" name="school_id" value="{{ $school->id }}"></input>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="description" placeholder="Beskrivelse..."></textarea>
                        </div>
                        
                        <div class="form-group">
                            <select class="form-control" name="school_class_id" required>
                                <option value="" disabled selected>Vælg Klasse                             
                                </option>
                                @foreach($school->classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            Hvornår starter det?
                            <input type="date" class="form-control" name="start_time" placeholder="">
                        </div>

                        <div class="form-group">
                            Hvornår slutter det?
                            <input type="date" class="form-control" name="end_time" placeholder="">
                        </div>

                    <div class="form-group">
                        <input type="submit" value="Opret" class="btn btn-success pull-right">
                    </div>

                    </form>
                </div>  
                
            </div>
        </div>
    </div>
</div>
@endsection