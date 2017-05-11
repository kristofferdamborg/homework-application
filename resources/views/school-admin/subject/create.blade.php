@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3>
                    Create Subject
                </h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('subject.store') }}">
                    {{ csrf_field() }}

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
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