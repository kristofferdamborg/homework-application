@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        @if (! session('user') == NULL)
                            <input type="hidden" name="google_id" value="{{ session('user')->id }}">
                        @endif

                        @if (! session('user') == NULL)
                            <input type="hidden" name="avatar" value="{{ session('user')->avatar }}">
                        @endif

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
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
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
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
                            <div class="col-md-6 col-md-offset-4">
                                <select class="form-control" name="school_id" id="school" required>
                                    <option value="" disabled selected>Vælg skole</option>
                                    @foreach($schools as $school)
                                        <option value="{{$school->id}}">{{$school->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <select class="form-control" name="class_id" id="my-class" required>
                                    <option value="" disabled selected>Vælg klasse</option>
                                </select>
                            </div>
                        </div>

                        @if (session('user') == NULL)
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        @else
                            <input type="hidden" name="password" value="">
                            <input type="hidden" name="password_confirmation" value="">
                        @endif

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
