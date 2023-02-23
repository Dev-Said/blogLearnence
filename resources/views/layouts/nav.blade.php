<header class="bg-indigo-600">
    <nav class="mx-auto max-w-7xl px-6 lg:px-8" aria-label="Top">
        <div class="flex w-full items-center justify-between border-b border-indigo-500 py-6 lg:border-none">
            <div class="flex items-center">
                <a href="#">
                    <span class="sr-only">Your Company</span>
                    <img class="h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="">
                </a>
                <div class="ml-10 hidden space-x-8 lg:block">
                    <a href="{{ route('posts.index') }}" class="text-base font-medium text-white hover:text-indigo-50">Articles</a>
                </div>
            </div>
            <div>
                <a href="{{ route('change-locale', 'fr') }}">Fr</a>
                <a href="{{ route('change-locale', 'en') }}">En</a>
            </div>
            @auth
            <div class="ml-10 space-x-4">
                <a href="{{ route('admin.dashboard') }}" class="inline-block rounded-md border border-transparent bg-indigo-500 py-2 px-4 text-base font-medium text-white hover:bg-opacity-75">{{ auth()->user()->name }}</a>
                <a href="{{ route('logout') }}" class="inline-block rounded-md border border-transparent bg-white py-2 px-4 text-base font-medium text-indigo-600 hover:bg-indigo-50">logout</a>
            </div>
            @else
            <div class="ml-10 space-x-4">
                <a href="{{ route('login') }}" class="inline-block rounded-md border border-transparent bg-indigo-500 py-2 px-4 text-base font-medium text-white hover:bg-opacity-75">Sign in</a>
                <a href="{{ route('register') }}" class="inline-block rounded-md border border-transparent bg-white py-2 px-4 text-base font-medium text-indigo-600 hover:bg-indigo-50">Sign up</a>
            </div>
            @endauth
        </div>
    </nav>
</header>