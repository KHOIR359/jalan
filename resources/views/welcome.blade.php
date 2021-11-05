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
    <link rel="shortcut icon" href="{{asset('img/pancacita.png')}}" type="image/x-icon">
</head>

<body class="h-screen font-sans antialiased leading-none ">
    <div class="flex flex-col bg-background">
        @if(Route::has('login'))
        <div class="absolute top-0 right-0 mt-4 mr-4 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6">
            @auth
            <a href="{{ url('/home') }}" class="text-sm font-normal text-white no-underline uppercase hover:underline">{{ __('Home') }}</a>
            @else
            <a href="{{ route('login') }}" class="text-sm font-normal text-white no-underline uppercase hover:underline">{{ __('Login') }}</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="text-sm font-normal text-white no-underline uppercase hover:underline">{{ __('Register') }}</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="flex items-center justify-center h-60 bg-black-50">
            <div class="flex flex-col justify-around h-full">
                <div class="p-5 px-10 rounded-lg">
                    <h1 class="mb-6 text-4xl font-light tracking-wider text-center text-gray-100 sm:mb-8 sm:text-6xl">
                        {{ config('app.name', 'Laravel') }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center py-2 text-xl text-white bg-green-500">
<a target="_blank" href="https://www.facebook.com/pupr.aceh.9/" class="mx-2 fab fa-facebook"></a>
<a target="_blank" href="https://twitter.com/pupr_aceh" class="mx-2 fab fa-twitter"></a>
<p class="mx-2 font-semibold">Ikuti Kami</p>
<a target="_blank" href="https://www.instagram.com/humaspupraceh/?hl=id" class="mx-2 fab fa-instagram"></a>
<a target="_blank" href="https://www.youtube.com/channel/UC3LtxmMXw7DaJX69XG9XWCg" class="mx-2 fab fa-youtube"></a>
    </div>
    <div class="">
        <div class="grid w-full grid-cols-1 lg:grid-cols-2 ">
            <div class="col-span-1 lg:p-10 justify-self-end">
                <img src="{{asset('img/background.jpg')}}" alt="gambar" class="object-cover w-full h-full p-4 lg:bg-10 lg:max-w-lg rounded-3xl">
            </div>
            <div class="col-span-1 p-4 text-gray-900 lg:p-10">
                <h4 class="mb-4 text-lg font-bold">Laporkan dengan mudah</h4>
                <h3 class="text-2xl font-bold">Ambil Gambar Jalanan Rusak</h3>
                <h3 class="mb-4 text-2xl font-bold">Laporkan Kesini</h3>
                <p class="mb-4 text-md">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem, in distinctio consequatur quam atque sunt. Dolorum ipsam , assumenda non voluptas minima voluptatibus? Nemo dolorem doloremque quo aliquid dolore repudiandae corrupti ea nihil, dolorum veritatis?</p>
                <div class="mb-4">
                    <div class="flex mb-1 font-semibold">
                        <i class="w-10 mr-2 fa fa-fw fa-book"></i>
                        <p>Lorem ipsum</p>
                    </div>
                    <div class="flex">
                        <i class="w-10 mr-2 fa-fw"></i>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, quisquam. adsasd jalsdkj</p>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="flex mb-1 font-semibold">
                        <i class="w-10 mr-2 fa fa-fw fa-clock"></i>
                        <p>Lorem ipsum</p>
                    </div>
                    <div class="flex">
                        <i class="w-10 mr-2 fa-fw"></i>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, quisquam.</p>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="flex mb-1 font-semibold">
                        <i class="w-10 mr-2 fa fa-fw fa-bolt"></i>
                        <p>Lorem ipsum</p>
                    </div>
                    <div class="flex">
                        <i class="w-10 mr-2 fa-fw"></i>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, quisquam. adsasd jalsdkj</p>
                    </div>
                </div>
            </div>
            @guest

            @endguest
        </div>
    </div>
</body>

</html>
