@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3>
                    Edit Lektie
                </h3>
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('homework.update', $homework->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="{{$homework->title}}">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="description" placeholder="{{$homework->description}}">
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
                            <input type="date" class="form-control" name="started_at" placeholder="{{$homework->started_at}}">
                        </div>

                        <div class="form-group">
                            Hvornår skal det være færdigt?
                            <input type="date" class="form-control" name="due_at" placeholder="{{$homework->due_at}}" >
                        </div>

                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-success pull-right">
                    </div>

                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection