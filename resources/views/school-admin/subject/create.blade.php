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
                        <br>
                            <h4>Choose Icon</h4>

                            <div class="btn-group" data-toggle="buttons">
			
                                <label class="btn btn-default active">
                                    <input type="radio" name="icon" id="option2" value="glyphicon glyphicon-book" autocomplete="off" chacked>
                                    <span class="glyphicon glyphicon-book"></span>
                                </label>

                                <label class="btn btn-default">
                                    <input type="radio" name="icon" id="option1" value="glyphicon glyphicon-file" autocomplete="off">
                                    <span class="glyphicon glyphicon-file"></span>
                                </label>

                                <label class="btn btn-default">
                                    <input type="radio" name="icon" id="option2" value="glyphicon glyphicon-stats" autocomplete="off">
                                    <span class="glyphicon glyphicon-stats"></span>
                                </label>

                                <label class="btn btn-default">
                                    <input type="radio" name="icon" id="option2" value="glyphicon glyphicon-globe" autocomplete="off">
                                    <span class="glyphicon glyphicon-globe"></span>
                                </label>

                                <label class="btn btn-default">
                                    <input type="radio" name="icon" id="option2" value="glyphicon glyphicon-font" autocomplete="off">
                                    <span class="glyphicon glyphicon-font"></span>
                                </label>

                                <label class="btn btn-default">
                                    <input type="radio" name="icon" id="option2" value="glyphicon glyphicon-music" autocomplete="off">
                                    <span class="glyphicon glyphicon-music"></span>
                                </label>
                            
                            </div>
                        </div>

                        <div class="form-group">
                            <h4>Choose Background Color</h4>
                            <div class="btn-group btn-group-2" data-toggle="buttons">
			
                                <label class="btn btn-success active bg-color-1">
                                    <input type="radio" name="bg_color" id="bg-color-1" value="#9ECEAD" autocomplete="off" chacked>
                                    <span class="glyphicon glyphicon-ok"></span>
                                </label>

                                <label class="btn btn-primary bg-color-2">
                                    <input type="radio" name="bg_color" id="bg-color-2" value="#FFE2C4" autocomplete="off">
                                    <span class="glyphicon glyphicon-ok"></span>
                                </label>

                                <label class="btn btn-info bg-color-3">
                                    <input type="radio" name="bg_color" id="bg-color-3" value="#E1ADC4" autocomplete="off">
                                    <span class="glyphicon glyphicon-ok"></span>
                                </label>

                                <label class="btn btn-default bg-color-4">
                                    <input type="radio" name="bg_color" id="bg-color-4" value="#8EAFB8" autocomplete="off">
                                    <span class="glyphicon glyphicon-ok"></span>
                                </label>

                                <label class="btn btn-default bg-color-5">
                                    <input type="radio" name="bg_color" id="bg-color-5" value="#FFDFC4" autocomplete="off">
                                    <span class="glyphicon glyphicon-ok"></span>
                                </label>
                            
                            </div>
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