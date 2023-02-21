@extends('app')
@section('content')

<div class="flex flex-col justify-center py-4 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">

        @include('layouts.errors')


        <div class="bg-white p-6 shadow sm:rounded-lg">
            {!! Form::model($post, ['route' => 'posts.store']) !!}
            <div class="space-y-6">

                @include('fields.text', ['name' => 'title', 'label' => 'Titre'])
                @include('fields.textarea', ['name' => 'content', 'label' => 'Texte'])
                @include('fields.select', ['name' => 'publish', 'options' => [false => 'False', true => 'True'], 'label' => 'Publier'])

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Ajouter</button>
                </div>
            </div>

            {!! Form::close() !!}


        </div>
    </div>
</div>
@endsection