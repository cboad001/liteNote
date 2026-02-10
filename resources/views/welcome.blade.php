<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />



        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased min-h-100 grid place-items-center ">
{{--        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">--}}
           <div class="absolute top-0 right-0">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
{{--                        have to make changes--}}
                        <a
                            href="{{ route('notebooks.index') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Notebooks
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth

                </nav>
           </div>
            @endif


        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif

    <div class="w-full h-screen bg-gradient-to-r from-blue-100 to-blue-200 flex items-center justify-center">
        <div class="text-center">
            <img src="{{asset('./images/logo.png')}}" alt="LiteNotes" class="mx-auto mb-8 rounded-lg shadow-lg">
            <h1 class="text-6xl font-bold text-blue-900 mb-4">Welcome to LiteNotes</h1>
            <p class="text-xl text-blue-700 mb-8">Your simple and elegant note-taking application</p>
            <div class="flex gap-4 justify-center">
                @auth
                    <a href="{{ route('notebooks.index') }}" class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold">Go to Notebooks</a>
                @else
                    <a href="{{ route('login') }}" class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold">Log In</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-8 py-3 bg-white text-blue-600 border-2 border-blue-600 rounded-lg hover:bg-blue-50 font-semibold">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    </body>
</html>
