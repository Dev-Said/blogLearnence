<!doctype html>
<html lang="{{ app()->getLocale() }}" class="h-full bg-gray-50">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>{{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="h-full">
    @include('admin.layouts.nav')
    <header class="bg-white shadow-sm">
        <div class="mx-auto max-w-7xl py-4 px-4 sm:px-6 lg:px-8">
            <h1 class="text-lg font-semibold leading-6 text-gray-900">@yield('title')</h1>
        </div>
    </header>
    @yield('content')
</body>

</html>