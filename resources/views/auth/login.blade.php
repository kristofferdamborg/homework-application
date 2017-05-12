@extends('layouts.auth')

@section('content')

<div class="login-container">
    <h1 class="text-center">Velkommen</h1>
    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
    
    <div class="login-form-container">

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-3 control-label">Email</label>

            <div class="col-md-9">
                <input id="username" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-3 control-label">Kodeord</label>

            <div class="col-md-9">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="login-btn-container col-md-9 col-md-offset-3">
                <div class="checkbox">
                    <label>
                        <input id="remember-checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><p style="margin-left: 5px;">Husk mig</p>
                    </label>
                </div>
                <div class="login-btn">
                    <button type="submit" class="btn btn-primary">
                        Log ind
                    </button>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">

                <a style="text-decoration: none!important;" href="{{ URL::route('auth/google') }}">
                    <div class="google-login-btn">
                     <img src="/img/btn_google.svg">
                     <p>Log ind med Google+</p>
                    </div>
                </a>

                <div class="new-user-container">
                <p>Ny bruger?</p>
                <a class="btn btn-primary" href="{{ route('register') }}">
                    Tilmeld dig
                </a>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
              
@endsection