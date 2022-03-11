<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>{{$user->username}}</title>


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
                <a href="/blogs" class="fa fa-arrow-left h-40 w-40 lh-40 text-center"></a>
                <h2 class="m-0">{{$user->username}}</h2>
            </div>

            <!-- Right Side Of Navbar -->
            <div class="nav-right">
            </div>
        </nav>

        <main class="container py-4">
            <div class="relative flex flex-column items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0">
                
            <div class="profile_picture">
                <img class="rounded-50" src="https://img.icons8.com/color/100/000000/circled-user-{{$user->gender}}-skin-type-7--v1.png" alt="">
            </div>    
                <h1 class="m-0 mb-2">{{$user->name}}</h1>
                @if(Auth::user()->username == $user->username)
                <span class="profile_email d-block mb-4">{{$user->email}}</span>
                @endif
                @if($user->bio != '')
                <div class="position-relative">
                    <!-- <h3 class="m-0 fw-bold">Bio</h3> -->
                    <p class="profile_bio m-0 fs-5 w-100"> {{$user->bio}}</p>
                </div>
                @endif
                @if(Auth::user()->username == $user->username)
                <a class="customBtn mt-1" href="/{{Auth::user()->username}}/edit-profile" method="POST">Edit Profile</a>
                @endif
                <br>
                <div class="d-flex align-items-end justify-content-start">
                    <h2 class="m-0">
                        Blogs : 
                        <?php 
                           echo $TotalBlog->count()
                        ?>
                    </h2>
                </div>
                @foreach($TotalBlog as $userBlog)
                <div class="blogWrapper _box_shadow">
                    <div class="d-flex justify-content-between">
                        <a href="/home/{{$userBlog->username}}" class="username text-decoration-none">{{$userBlog->username}}</a>
                        @if(Auth::user()->username == $user->username)
                        <form action="/home/{{$userBlog->username}}" method="POST">
                        @csrf
                            <!-- {!! Form::hidden('blogid', $value = $userBlog->blogID) !!} -->
                            <input type="hidden" name="blogid" value="{{$userBlog->blogID}}">

                            <button class="dltBtn dltBlog">Delete</button>
                        </form>
                        @endif
                    </div>
                    <div class="blog_Display">
                        <p class="blogText">{{$userBlog->blogText}}</p>
                    </div>
                    <div class="categoryDiv">
                        <span class="categoryTitle">category : </span>
                        <span class="category {{$userBlog->blogcategory}}">{{$userBlog->blogcategory}}</span>
                    </div>
                    <div class="blog_desc">
                        <span class="created-at">{{$userBlog->created_at}}</span>
                    </div>
                </div>
                @endforeach
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