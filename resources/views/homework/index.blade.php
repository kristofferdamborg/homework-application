@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <div class="row">
                <div class="col-xs-6">
                <h3 >
                    Lectie Oversigt
                </h3>
                <p>Vælg Klasse</p>
                </div>
                <div class="col-xs-6">
                    <h3><a style="float: right;" class="btn btn-primary btn-lg" href="{{ route('homework.create') }}">Opret Lektie</a></h3>
                </div>
                </div></div>

                <div class="panel-body">

                @foreach($school->classes as $class)
                                    <a class="col-xs-12" style="text-align: center; padding: 15px; margin-bottom:5px; margin-top:5px; font-size: large; color: gray; background-color:#f5f5f5;" href="{{ route('homework.show', $class->id) }}">{{$class->name}}</a>
                @endforeach
                </div>  
                
            </div>
        </div>
    </div>
</div>
@endsection