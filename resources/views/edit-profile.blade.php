<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>edit-profile</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blogs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontAwesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <!-- Left Side Of Navbar -->
            <div class="nav-left d-flex align-items-center">
                <a href="/home/{{$user->username}}" class="fa fa-arrow-left h-40 w-40 lh-40 text-center"></a>
                <h2 class="m-0">edit profile</h2>
            </div>

            <!-- Right Side Of Navbar -->
            <div class="nav-right">
            </div>
        </nav>

        <main class="container py-4">
            <div class="relative flex flex-column items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0">
                <!-- <h6>Profile Picture</h6> -->
                <div class="profile_picture">
                    <img src="https://img.icons8.com/color/100/000000/circled-user-{{$user->gender}}-skin-type-7--v1.png" alt="">
                </div>
                <!-- <form action="App\Http\Controllers\BlogController@updateProfile" > -->
                <div class="form-wrapper shadow-none mt-20">
                    {!! Form::open(['method' => 'put','action'=>['App\Http\Controllers\ProfileController@updateProfile','username'=>$user->username]]) !!}
                    @csrf

                    <div class="edit_input_wrapper">
                        <label class="" for="name">name</label>
                        <input type="text" class="edit_input" name="name" id="name" value="{{$user->name}}">
                    </div>
                    <div class="edit_input_wrapper">
                        <label for="username">username</label>
                        <input type="text" class="edit_input" name="username" id="username" value="{{$user->username}}" disabled>
                    </div>
                    <div class="edit_input_wrapper">
                        <label for="email">email</label>
                        <input type="email" class="edit_input" name="email" id="email" value="{{$user->email}}" disabled>
                    </div>
                    <div class="edit_input_wrapper flex-row">
                        <label for="gender">Gender &nbsp;&nbsp;: </label>
                        <span class="ms-3">Male</span>
                    </div>
                    <div class="edit_input_wrapper">
                        <label for="bio">bio</label>
                        <textarea name="bio" class="edit_input" id="bio" cols="40" rows="2">{{$user->bio}}</textarea>
                    </div>
                    <button type="submit" class="customBtn">Save changes</button>
                    </form>
                </div>

            </div>
        </main>
        @yield('footer');


    </div>

    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="{{asset('/js/fontawesome.js')}}"></script>
    <script src="{{asset('/js/nav.js')}}"></script>
    <script src="{{asset('/js/custom.js')}}"></script>
</body>

</html>