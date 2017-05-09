@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3>
                    Create School
                </h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('school.store') }}">
                    {{ csrf_field() }}

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="location" placeholder="Location">
                        </div>

                    <div class="form-group">
                        <input type="submit" value="Create" class="btn btn-success pull-right">
                    </div>

                    </form>
                </div>  
                
            </div>
        </div>
    </div>
</div>
@endsection