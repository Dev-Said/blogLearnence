<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
@extends('admin.app')
@section('title', 'Users')
@section('content')
  <div class="min-h-full">
    <main>
      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <!-- List -->
<div class="px-6 lg:px-8">
  <div class="sm:flex sm:items-center justify-end">
   <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
      <a href="{{ route('admin.users.create') }}">
        <button type="button" class="block rounded-md bg-indigo-600 py-1.5 px-3 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add user</button>
      </a>
    </div>
  </div>
  {{-- {{ $users = App\Models\User::all() }} --}}
  <div class="mt-8 flow-root">
    <div class="-my-2 -mx-6 overflow-x-auto lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <table class="min-w-full divide-y divide-gray-300">
          <thead>
            <tr>
              <th scope="col" class="py-3.5 pl-6 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Name</th>
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Email</th>
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Role</th>
              <th scope="col" class="relative py-3.5 pl-3 pr-6 sm:pr-0">
                <span class="sr-only">Edit</span>
              </th>
              <th scope="col" class="relative py-3.5 pl-3 pr-6 sm:pr-0">
                <span class="sr-only">Delete</span>
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            @foreach($users as $user)
            <tr>
              <td class="whitespace-nowrap py-4 pl-6 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $user->name }}</td>
              <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $user->email }}</td>
              <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $user->role }}</td>
              <td class="relative whitespace-nowrap py-4 pl-3 pr-6 text-right text-sm font-medium sm:pr-0">
                <a href="{{ route('admin.users.edit', ['user' => $user->email]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>
              <td class="relative whitespace-nowrap py-4 pl-3 pr-6 text-right text-sm font-medium sm:pr-0">
                <a href="{{ route('admin.users.confirm-delete', ['user' => $user->email]) }}" class="text-indigo-600 hover:text-indigo-900">Delete</a>
              </td>
            </tr>
            @endforeach

            <!-- End list... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="w-full max-w-6xl absolute bottom-10">
      {{ $users->links() }}
    </div>
</div>

        <!-- /End replace -->
      </div>
    </main>

  </div>
@endsection