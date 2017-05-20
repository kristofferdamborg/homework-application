@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default col-md-8 col-md-offset-2">
            <div class="panel-heading">
               <h1>Profil</h1>
            </div>
            <div class="panel-body" style="padding-top: 40px;">
                <form class="profile-form" method="POST" action="{{ route('profile.update', $user->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="theme-picker pull-right">
                        <div class="theme-heading">
                            <h4>Vælg tema: </h4>
                        </div>
                        <div class="btn-group pull-right" data-toggle="buttons">
                            <label class="btn btn-success active">
                                <input type="radio" name="options" id="option2" autocomplete="off" 
                                @if (Auth::user()->theme == NULL)
                                chacked
                                @endif>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>

                            <label class="btn btn-primary pink-theme-btn">
                                <input type="radio" name="theme" id="option1" value="{{ asset('css/pink-theme.css') }}" autocomplete="off"
                                @if (Auth::user()->theme == 'http://localhost:8000/css/pink-theme.css')chacked @endif>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>

                    {{-- <img class="dashboard-avatar" id="profile-img" src="{{ str_replace('sz=50', 'sz=300', Auth::user()->avatar) }}" height="200"><br><br>
                    <input style="width: 36%;" class="btn btn-primary" type="file" name="photo" onchange="onFileSelected(event)"> --}}
            
                <button style="margin-top: 100px" type="submit" class="btn btn-success dashboard-box-btn">
                        Gem ændringer
                    </button>
                </form>
                </div>
                </div>
        </div>
    </div>

   {{--  <script>

        function onFileSelected(event) {
        var selectedFile = event.target.files[0];
        var reader = new FileReader();

        var imgtag = document.getElementById("profile-img");
        imgtag.title = selectedFile.name;

        reader.onload = function(event) {
            imgtag.src = event.target.result;
        };

        reader.readAsDataURL(selectedFile);
        }

    </script> --}}

@endsection