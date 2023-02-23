@extends('app')
@section('content')
<div class="overflow-hidden bg-white py-16">
    <div class="w-[70%] mx-auto px-6 lg:px-8">
        <div class="mx-auto max-w-prose text-lg">
            <h1>
                <span class="block text-center text-lg font-semibold text-indigo-600">{{ $post->title }}</span>
            </h1>
        </div>
        <div class="prose prose-lg prose-indigo mx-auto mt-6 text-gray-500">
            <p>{{ $post->content }}</p>
        </div>
    </div>
</div>
@endsection