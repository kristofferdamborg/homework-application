@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="roles-heading panel-heading">
                    <h3>Teachers</h3>
                    <h5>Total teachers:  @if (! empty($users)){{ count($users) }}@else 0 @endif</h5>
                    <a class="btn btn-success" href="{{ route('user.create') }}">Register Teacher</a>
                </div>
                <div class="panel-body">
                    <table class="table roles-table table-hover">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="text-right">Actions</th>
                        </tr>

                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="role-actions">
                                    
                                    <a class="btn btn-sm btn-info" href="{{ route('user.edit', $user->id) }}">Edit</a>

                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <input class="role-delete-btn btn btn-sm btn-danger" type="submit" value="Delete">

                                    </form>

                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td>No user.</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection