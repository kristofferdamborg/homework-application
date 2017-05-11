@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="roles-heading panel-heading">
                    <h3>Subjects</h3>
                    <h5>Total subjects:  @if (! empty($school->subjects)){{ count($school->subjects) }}@else 0 @endif</h5>
                    <a class="btn btn-success" href="{{ route('subject.create') }}">Create Subject</a>
                </div>
                <div class="panel-body">
                    <table class="table roles-table table-hover">
                        <tr>
                            <th>Name</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        @if (! empty($school->subjects))
                        @foreach ($school->subjects as $subject)
                            <tr>
                                <td>{{ $subject->name }}</td>
                                <td class="role-actions">

                                    <form action="{{ route('subject.destroy', $subject->id) }}" method="POST">
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