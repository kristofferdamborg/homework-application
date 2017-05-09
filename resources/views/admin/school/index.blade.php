@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="roles-heading panel-heading">
                    <h3>Schools</h3>
                    <a class="btn btn-success" href="{{ route('school.create') }}">Create School</a>
                </div>
                <div class="panel-body">
                    <table class="table roles-table table-hover">
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th class="text-right">Actions</th>
                        </tr>

                        @forelse ($schools as $school)
                            <tr>
                                <td>{{ $school->name }}</td>
                                <td>{{ $school->location }}</td>
                                <td class="role-actions">
                                    
                                    <a class="btn btn-sm btn-info" href="{{ route('school.edit', $school->id) }}">Edit</a>

                                    <form action="{{ route('school.destroy', $school->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <input class="role-delete-btn btn btn-sm btn-danger" type="submit" value="Delete">

                                    </form>

                                </td>
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