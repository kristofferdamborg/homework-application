@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3>
                    Edit Class
                </h3>
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('class.update', $class->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $class->name }}">
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