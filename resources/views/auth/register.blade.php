@extends('layouts.auth')

@section('content')

<div class="login-container">
    <h1 class="text-center">Tilmeld dig</h1>
    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
    
                        @if (! session('user') == NULL)
                        <input type="hidden" name="google_id" value="{{ session('user')->id }}">
                        @endif

                        @if (! session('user') == NULL)
                            <input type="hidden" name="avatar" value="{{ session('user')->avatar }}">
                        @endif

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">Navn</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="name" value="@if (! session('user') == NULL){{ session('user')-> name}}@else{{ old('name') }}@endif" 
                                required autofocus
                                 @if (! session('user') == NULL)
                                readonly
                                @endif>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-3 control-label">E-mail</label>

                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control" name="email" value="@if (! session('user') == NULL){{ session('user')->email }}@else{{ old('email') }}@endif" 
                                required
                                 @if (! session('user') == NULL)
                                readonly
                                @endif>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                  

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <select class="form-control" name="school_id" id="school" required>
                                    <option value="" disabled selected>Vælg skole</option>
                                    @foreach($schools as $school)
                                        <option value="{{$school->id}}">{{$school->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <select class="form-control" name="class_id" id="my-class" required>
                                    <option value="" disabled selected>Vælg klasse</option>
                                </select>
                            </div>
                        </div>

                        @if (session('user') == NULL)
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
                            <label id="pass-confirm-label" for="password-confirm" class="col-md-3 control-label">Bekræft kodeord</label>

                            <div class="col-md-9">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        @else
                            <input type="hidden" name="password" value="">
                            <input type="hidden" name="password_confirmation" value="">
                        @endif

                        <div class="form-group">
                            <div class="register-btn pull-right">
                                <button type="submit" class="btn btn-primary">
                                    Tilmeld
                                </button>
                            </div>
                        </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('change','#school', function() {

			var school_id = $(this).val();

			var op =" ";

			$.ajax({
				type:'get',
				url:'{!!URL::to('findClass')!!}',
				data:{'id' : school_id},
				success:function(data) {
	
					op+='<option value="" selected disabled>Vælg klasse</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
				   }

				   $(document).find('#my-class').html(" ");
				   $(document).find('#my-class').append(op);
				},
				error:function(){

				}
			});
		});
	});
</script>



@endsection
