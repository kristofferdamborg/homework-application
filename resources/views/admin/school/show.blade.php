@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3>
                    {{ $school->name }}
                </h3>
                </div>
                <div class="panel-body">
                    <table class="table roles-table table-hover">
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th class="text-right">Actions</th>
                        </tr>

                        @forelse ($school->users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="role-actions"></td>
                            </tr>
                        @empty
                        <tr>
                            <td>No schools.</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection