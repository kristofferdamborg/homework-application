@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3>
                    Create User
                </h3>
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('user.store') }}">
                    {{ csrf_field() }}

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>

                         <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="role" required>
                            <option disabled selected>Vælg rolle</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="school_id" required>
                            <option disabled selected>Vælg skole</option>
                                @foreach ($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                                @endforeach
                            </select>
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