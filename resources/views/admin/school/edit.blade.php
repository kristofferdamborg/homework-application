@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3>
                    Edit School
                </h3>
                <a href="{{ route('school.create') }}">
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('school.update', $school->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $school->name }}">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="location" placeholder="location" value="{{ $school->location }}">
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