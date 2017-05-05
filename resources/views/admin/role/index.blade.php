@extends('admin.layout.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="roles-heading panel-heading">
                    <h3>Roles</h3>
                    <a class="btn btn-success" href="{{ route('role.create') }}">Create Role</a>
                </div>
                <div class="panel-body">
                    <table class="table roles-table">
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>

                        @forelse ($roles as $role)
                            <tr>
                                <td>{{ $role->display_name }}</td>
                                <td>{{ $role->description }}</td>
                                <td class="role-actions">
                                    
                                    <a class="btn btn-sm btn-info" href="{{ route('role.edit', $role->id) }}">Edit</a>

                                    <form action="{{ route('role.destroy', $role->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <input class="role-delete-btn btn btn-sm btn-danger" type="submit" value="Delete">

                                    </form>

                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td>No roles.</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection