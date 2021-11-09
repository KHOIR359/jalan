<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @livewireStyles()
    <!-- akhir dari Bagian js -->
    <script></script>
    @if ($attributes['useMap'])
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW_u3PHV3bRsMPlcR3ikqH9NFRfeccLQ8&sensor=false&callback"
            type="text/javascript"></script> <!-- Key Api  -->
    @endif
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="shortcut icon" href="{{asset('img/pancacita.png')}}" type="image/x-icon">
</head>

<body class="bg-blue-50 h-screen antialiased leading-none font-sans {!!$attributes['class']!!}">

    <div id="app" class="relative min-h-full">
        <header class="py-6 bg-green-700">
            <div class="container flex items-center justify-between px-6 mx-auto" x-data="{show:false}" >
                <div>
                    <div class="flex items-center">
                        <img src="{{asset('img/pancacita.png')}}" alt="icon" class="h-8 mr-5">
                        <a href="{{ url('/') }}" class="text-xl font-bold text-gray-100 no-underline">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                </div>
                <button class="p-2 border border-gray-300 rounded shadow outline-none cursor-pointer focus:ring-none focus:outline-none ring-none md:hidden" @click="show=!show"><i class="text-gray-300 fa-fw fa fa-bars md:hidden"></i></button>

                <nav   @click.away="show=false" x-show="show" class="absolute z-50 px-4 py-3 space-y-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg shadow lg:block sm:text-base top-20 right-4 md:hidden"
                x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-60 skew-x-6"
        x-transition:enter-end="opacity-100 transform scale-100 skew-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100 skew-x-0"
        x-transition:leave-end="opacity-0 transform scale-90 skew-x-6"
        >
                    @guest
                    <a class="block no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                    <a class="block no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                    @else

                    @if(Auth::user()->role == 1)
                    <p class="block px-2 text-lg font-semibold no-underline capitalize hover:underline">{{ Auth::user()->name }}</p>
                    <hr>
                    <a href="{{ route('home') }}" class="block no-underline hover:underline">{{ __('Home') }}</a>
                    <a href="{{ route('admin') }}" class="block no-underline hover:underline">{{ __('Dashboard') }}</a>
                    @endif
                    <a href="{{ route('logout') }}"
                       class="block no-underline hover:underline"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                    @endguest
                </nav>
                <nav   class="hidden space-x-2 text-sm text-gray-300 md:block sm:text-base top-20 right-4"
                x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-60 skew-x-6"
        x-transition:enter-end="opacity-100 transform scale-100 skew-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100 skew-x-0"
        x-transition:leave-end="opacity-0 transform scale-90 skew-x-6"
        >
                    @guest
                    <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                    <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                    @else

                    @if(Auth::user()->role == 1)

                    <a href="{{ route('home') }}" class="no-underline hover:underline">{{ __('Home') }}</a>
                    <a href="{{ route('admin') }}" class="no-underline hover:underline">{{ __('Dashboard') }}</a>
                    @endif
                    <a href="{{ route('logout') }}"
                       class="no-underline hover:underline"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                    @endguest
                </nav>
            </div>
        </header>
        {{$slot}}
        @livewireScripts()
    </div>
            <footer class="w-full py-4 mt-5 text-center text-gray-600 bg-white shadow ">
                &copy; Copyright 2021
            </footer>
</body>

</html>
