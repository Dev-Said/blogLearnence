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
    @include('layouts.nav')
    @yield('content')
</body>

</html>
