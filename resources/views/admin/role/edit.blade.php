@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3>
                    Edit Role
                </h3>
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('role.update', $role->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $role->name }}">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="display_name" placeholder="Display Name" value="{{ $role->display_name }}">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="description" placeholder="Description" value="{{ $role->description }}">
                        </div>

                        <div class="form-group">
                            <h4>Permissions</h4><br>

                            @foreach($permissions as $permission)

                            <div class="permission-checkbox form-group">
                            
                                <input type="checkbox" {{in_array($permission->id, $role_permissions)?"checked":""}} name="permission[]" value="{{ $permission->id }}">
                                <div>
                                    {{ $permission->display_name }}
                                </div>
                                
                            </div>

                            @endforeach
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