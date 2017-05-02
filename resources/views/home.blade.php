@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
        <h1>All users:</h1>
          @forelse($users as $user)
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $user->name }}
                    <img src="{{ $user->avatar }}">
                </div>

                <div class="panel-body">
                    {{ $user->email }}
                </div>
            </div>
          @empty
            No users.
          @endforelse
        </div>
    </div>
</div>
@endsection
