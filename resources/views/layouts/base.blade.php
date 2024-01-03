<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {!! seo($seo ?? null) !!}

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Caveat&display=swap"
            rel="stylesheet"
        />

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles
        @livewireScripts

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
        <livewire:nav-bar/>

        @yield('body')

        <livewire:optin-form/>

        <footer class="bg-white dark:bg-gray-900 m-4">
            <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <a href="{{ route('home_page') }}" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                        <img src="{{ asset('img/logo-artinama.png') }}" class="h-8 invert" alt="Logo {{ config('app.name') }}" />
                    </a>
                    <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                        @foreach(['contact', 'copyright', 'dmca', 'privacy-policy'] as $page)
                            <li>
                                <a href="{{ route('page', $page) }}" class="hover:underline me-4 md:me-6">{{ ucwords($page) }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">Script Arti Nama © 2023 by <a href="https://dojo.cc/" class="hover:underline" target="_blank">Internet Marketing Dojo</a></span>
            </div>
        </footer>


    </body>
</html>
