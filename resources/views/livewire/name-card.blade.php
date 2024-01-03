<div class="@if(Route::currentRouteName() === 'single_post') max-w-full @else max-w-sm @endif p-6 bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 m-3 text-center format bg-gradient-to-r @if(str($name->gender)->lower()->contains(['fe', 'pe'])) from-purple-500 to-pink-500 @else from-blue-500 to-cyan-500 @endif">

    @if($logo)
        <img src="{{ asset('img/logo-artinama.png') }}" class="h-8 mx-auto" alt="Logo {{ config('app.name') }}" />
    @endif
    <a href="{{ route('single_post', $name) }}" class="no-underline not-format text-white">
        <h3 class="font-nama text-6xl font-bold">{{ ucwords($name->name) }}</h3>
    </a>
    <blockquote class="text-gray-50 before:text-white">
        <p>{{ $name->meaning }}</p>
    </blockquote>

    @unless($simple)
        @php
            $traits = collect(explode('. ', $name->content))->shuffle()->take(3);
        @endphp

        <ul class="text-gray-200 text-left marker:text-gray-200">
            @foreach($traits as $trait)
                <li>{{ $trait }}</li>
            @endforeach
        </ul>
    @endunless


    <p class="not-format">
        <a href="{{ route('alphabet_page', $name->first_char) }}" class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 hover:underline">Awalan {{ ucwords($name->first_char) }}</a>

        <a href="{{ route('gender_page', $name->gender) }}" class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 hover:underline">{{ ucwords($name->gender) }}</a>

        @foreach($name->religions as $religion)
            <a href="{{ route('religion_page', $religion) }}" class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 hover:underline">Agama {{ ucwords($religion) }}</a>
        @endforeach
        @foreach($name->origins as $origin)
            <a href="{{ route('origin_page', $origin) }}" class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 hover:underline">Asal {{ ucwords($origin) }}</a>
        @endforeach

    </p>

    @if($cta)
    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 no-underline">
        Selengkapnya
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
    </a>
    @endunless
</div>
