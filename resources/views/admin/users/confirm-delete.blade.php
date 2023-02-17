@extends('app')
@section('content')

<div class="w-full h-full flex flex-col justify-center items-center">
   
    <h1>Confirmation delete user</h1>
    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.users.destroy', $user->email]]) !!}
    <div>
        <button type="submit" class="text-indigo-600 hover:text-indigo-900">Delete user</button>
    </div>
    {!! Form::close() !!}

</div>

@endsection