<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
@extends('admin.app')

@section('title', 'Dashboard')

@section('content')
<p>{{ app()->getLocale() }}  @lang('auth.dashboard')</p>
@endsection
