@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="roles-heading panel-heading">
                    <h3>Classes</h3>
                    <h5>Total classes:  @if (! empty($school->classes)){{ count($school->classes) }}@else 0 @endif</h5>
                    <a class="btn btn-success" href="{{ route('class.create') }}">Create Class</a>
                </div>
                <div class="panel-body">
                    <table class="table roles-table table-hover">
                        <tr>
                            <th>Name</th>
                            <th>Pupil #</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        @if (! empty($school->classes))
                        @foreach ($school->classes as $class)
                            <tr>
                                <td>{{ $class->name }}</td>
                                <td>{{ count($class->users) }}</td>
                                <td class="role-actions">
                                    
                                    <a class="btn btn-sm btn-info" href="{{ route('class.edit', $class->id) }}">Edit</a>

                                    <form action="{{ route('class.destroy', $class->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <input class="role-delete-btn btn btn-sm btn-danger" type="submit" value="Delete">

                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection