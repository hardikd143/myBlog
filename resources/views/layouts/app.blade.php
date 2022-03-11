<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>@yield('title')</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontAwesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <!-- Left Side Of Navbar -->

            <div class="nav-left">

                <a class="navbar-brand h-40 lh-40 p-0" href="{{ url('/') }}">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                    myBlog
                </a>
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->
            </div>


            <!-- Right Side Of Navbar -->
            <div class="nav-right">
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    <div class="btns d-flex h-40 align-items-center">
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="customBtn me-1 loginBtn"> {{ __('Login') }}</a>
                        </li>
                        @endif
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="customBtn registerBtn">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <div class=" profile_dropdown position-relative">
                            <!-- <button class="fas fa-user profileBtn"></button> -->
                            <div class="profileBtn">
                                <img src="https://img.icons8.com/color/48/000000/circled-user-{{Auth::user()->gender}}-skin-type-7--v1.png" alt="">
                            </div>
                            <!--  -->
                            <div class="profileDropDown bg-white">
                                <a class="dropDown_item" class="nav-link " href="/home/{{ Auth::user()->username }}">
                                    <!-- {{ Auth::user()->username }} -->
                                    Profile
                                </a>
                                <a class="dropDown_item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </>
                        @endguest
                    </div>
                </ul>
            </div>
        </nav>

        <main class="container py-4">
            @yield('content')
        </main>
        @yield('footer');


    </div>

    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="{{asset('/js/fontawesome.js')}}"></script>
    <script src="{{asset('/js/nav.js')}}"></script>
    <script src="{{asset('/js/custom.js')}}"></script>
    
</body>

</html>