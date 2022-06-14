
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="h-screen font-sans antialiased leading-none ">
    <div class="flex flex-col">
        @if(Route::has('login'))
        <header class="fixed z-30 w-full transition duration-300 ease-in-out md:bg-opacity-90 false">
            <div class="max-w-6xl px-5 mx-auto sm:px-6">
                <div class="flex items-center justify-between h-16 md:h-20">
                    <div class="flex-shrink-0 mr-4"><a class="block" aria-label="Cruip" href="/">
                            <svg class="w-8 h-8" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <radialGradient cx="21.152%" cy="86.063%" fx="21.152%" fy="86.063%" r="79.941%" id="header-logo">
                                        <stop stop-color="#4FD1C5" offset="0%"></stop>
                                        <stop stop-color="#81E6D9" offset="25.871%"></stop>
                                        <stop stop-color="#338CF5" offset="100%"></stop>
                                    </radialGradient>
                                </defs>
                                <rect width="32" height="32" rx="16" fill="url(#header-logo)" fill-rule="nonzero"></rect>
                            </svg>
                        </a>
                    </div>
                    @auth
                    <ul class="flex flex-wrap items-center justify-end flex-grow">
                        <li>
                            <a class="flex px-4 py-3 ml-3 text-gray-200 bg-gray-900 rounded btn-sm hover:bg-gray-800" href="{{ url('/home') }}" style="align-items:center">
                                <span>Home</span>
                                <svg class="flex-shrink-0 w-3 h-3 ml-2 -mr-1 text-gray-400 fill-current" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.707 5.293L7 .586 5.586 2l3 3H0v2h8.586l-3 3L7 11.414l4.707-4.707a1 1 0 000-1.414z" fill-rule="nonzero"></path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                    </nav>
                    @else
                    <nav class="flex flex-grow">
                        <ul class="flex flex-wrap items-center justify-end flex-grow">
                            <li>
                                <a href="{{ url('/login') }}" class="flex items-center px-5 py-3 font-medium text-gray-600 transition duration-150 ease-in-out hover:text-gray-900">Sign in</a>
                            </li>
                            <li>
                                <a class="flex px-4 py-3 ml-3 text-gray-200 bg-gray-900 rounded btn-sm hover:bg-gray-800" href="/signup">
                                    <span>Sign up</span>
                                    <svg class="flex-shrink-0 w-3 h-3 ml-2 -mr-1 text-gray-400 fill-current" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.707 5.293L7 .586 5.586 2l3 3H0v2h8.586l-3 3L7 11.414l4.707-4.707a1 1 0 000-1.414z" fill-rule="nonzero"></path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    @endauth
                </div>
            </div>
        </header>
        @endif
        @auth
        <a class="text-sm font-normal text-white no-underline uppercase hover:underline">{{ __('Home') }}</a>
        @else
        <a href="{{ route('login') }}" class="text-sm font-normal text-white no-underline uppercase hover:underline">{{ __('Login') }}</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="text-sm font-normal text-white no-underline uppercase hover:underline">{{ __('Register') }}</a>
        @endif
        @endauth

        <main class="flex-grow">
            <section class="relative">

                <div class="max-w-6xl px-4 mx-auto sm:px-6">
                    <div class="pt-32 pb-12 md:pt-40 md:pb-20">
                        <div class="pb-12 text-center md:pb-16">
                            <h1 class="mb-4 text-5xl font-extrabold tracking-tighter md:text-6xl leading-tighter aos-init aos-animate" data-aos="zoom-y-out" style="font-size: 5.5rem">Make your Road <span class="text-transparent md:block bg-clip-text bg-gradient-to-r from-blue-500 to-teal-400">wonderful</span></h1>
                            <div class="max-w-3xl mx-auto">
                                <p class="mb-10 text-xl text-gray-600" style="line-height: 1.5">Kami siap melayani informasi jalanan rusak untuk warga Indonesia.</p>
                                <div class="max-w-xs mx-auto mt-5 sm:max-w-none sm:flex sm:justify-center aos-init aos-animate" data-aos="zoom-y-out" data-aos-delay="300">
                                    <div><a class="w-full px-6 py-3 mb-4 text-white bg-blue-600 rounded btn hover:bg-blue-700 sm:w-auto sm:mb-0" href="{{route('home')}}">Lanjutkan</a></div>
                                    <div><a class="w-full px-6 py-3 text-white bg-gray-900 rounded btn hover:bg-gray-800 sm:w-auto sm:ml-4" href="#0">Pelajari lebih lanjut</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

    </div>

</body>

</html>
