@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3>
                    Opret Hjemmearbejde
                </h3>
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('homework.store') }}">
                    {{ csrf_field() }}

                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Title">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="description" placeholder="Beskrivelse...">
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
                            <select class="form-control" name="subject_id" required>
                                <option value="" disabled selected>Vælg Fag                             
                                </option>
                                @foreach($school->subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            Hvornår skal det offentliggøres?
                            <input type="date" class="form-control" name="started_at" placeholder="">
                        </div>

                        <div class="form-group">
                            Hvornår skal det være færdigt?
                            <input type="date" class="form-control" name="due_at" placeholder="">
                        </div>

                    <div class="form-group">
                        <input type="submit" value="Register" class="btn btn-success pull-right">
                    </div>

                    </form>
                </div>  
                
            </div>
        </div>
    </div>
</div>
@endsection