@extends('admin.layout.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3>
                    Create Role
                </h3>
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('role.store') }}">
                    {{ csrf_field() }}

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="display_name" placeholder="Display Name">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="description" placeholder="Description">
                        </div>

                        <div class="form-group">
                            <h4>Permissions</h4><br>

                            @foreach($permissions as $permission)

                            <div class="permission-checkbox form-group">
                            
                                <input type="checkbox" name="permission[]" value="{{ $permission->id }}">
                                <div>
                                    {{ $permission->display_name }}
                                </div>
                                
                            </div>

                            @endforeach
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