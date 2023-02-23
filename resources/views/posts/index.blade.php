@extends('app')
@section('content')
<div class="w-[70%] min-h-full px-8 mt-10 mx-auto">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Articles</h1>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            @can('create-post-quota')
            <a href="{{ route('posts.create') }}">
                <button type="button" class="block rounded-md bg-indigo-600 py-1.5 px-3 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajouter un article</button>
            </a>
            @endcan
        </div>
    </div>
    @if(session()->has('message'))
    <div class="bg-green-100 w-full p-4 flex justify-center items-center my-4">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="mt-8 flow-root">
        <div class="-my-2 -mx-6 overflow-x-auto lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Title</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Slug</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Plublished</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">User Id</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Date</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-6 sm:pr-0">
                                <span class="sr-only">Edit</span>
                            </th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-6 sm:pr-0">
                                <span class="sr-only">Delete</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($posts as $post)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-6 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                <a href="{{ route('posts.show', ['post' => $post->slug]) }}" class="text-indigo-600 hover:text-indigo-900">{{ $post->title }}</a>
                                </td>
                            <td class="whitespace-nowrap py-4 pl-6 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $post->slug }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $post->publish }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $post->user_id }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $post->created_at }}</td>
                            @can('update', $post)
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-6 text-right text-sm font-medium sm:pr-0">
                                    <a href="{{ route('posts.edit', ['post' => $post->slug]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-6 text-right text-sm font-medium sm:pr-0">
                                    <a href="{{ route('post.confirm-delete', ['post' => $post->slug]) }}" class="text-indigo-600 hover:text-indigo-900">Delete</a>
                                </td>
                            @endcan
                        </tr>
                        @endforeach

                        <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="w-[70%] absolute bottom-10 ml-[-32px]">
        {{ $posts->links() }}
    </div>
</div>
@endsection