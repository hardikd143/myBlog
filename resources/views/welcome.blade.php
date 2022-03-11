@extends('layouts.app')
@extends('layouts.footer')

<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('title', 'myBlog')
@section('content')
            <div class="container text-center mt-5">
                <h1 class="homeTitle">myBlog</h1> 
                <p class="homeDesc">
                    This is a simple blog site where you can share your thoughts , ideas , news via our blog system . 
                </p>
                <div class="text-center">
                    <a href="/blogs" class="customBtn">see blogs</a>
                </div>
            </div>
@endsection
