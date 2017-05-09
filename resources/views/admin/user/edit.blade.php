@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3>
                    Edit User
                </h3>
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <input type="type" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
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