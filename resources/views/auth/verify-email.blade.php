@extends('app')
@section('content')

<div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
        <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Verfication email account</h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        @if ( session('status') === 'verification-link-sent' )
        <div class="">A new email verification link has been emailed to you!</div>
        @else
        <div class="w-full flex justify-center">Email envoyé</div>
        @endif
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            {!! Form::open(['route' => 'verification.send', 'class' => 'space-y-6']) !!}
            <div>
                <button type="submit" class="flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Resend email</button>
            </div>
            {!! Form::close() !!}


        </div>
    </div>
</div>
@endsection