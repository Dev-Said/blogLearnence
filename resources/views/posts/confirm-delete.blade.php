@extends('app')
@section('content')

<div class="w-full h-full flex flex-col justify-center items-center">
   
    <h1>Confirmation delete post</h1>
    {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->slug]]) !!}
    <div>
        <button type="submit" class="text-indigo-600 hover:text-indigo-900">Delete post</button>
    </div>
    {!! Form::close() !!}

</div>

@endsection