@extends('layouts.app')
<link href="{{ asset('css/createblog.css') }}" rel="stylesheet">
@section('title', 'Create Blog')

@section('content')

<h2>Write your blog </h2> <br>

<form action="/blogs" method="POST">
    @csrf
    <!-- <input type="text" name="username" id="" value="[Auth::user()]" hidden> -->
    {!! Form::hidden('username', $value = Auth::user()->username) !!}
    <textarea name="blogtext" rows="6" class="" required></textarea> <br>
    <span class="fs-3">blog category</span>
    <div class="d-flex py-2 flex-wrap">
        <label for="Cate_news" class="customRadio_Div">
            <input type="radio" name="category" id="Cate_news" value="news" required>
            <span class="customRadio"></span>
            <span>News</span>
        </label>
        <label for="Cate_education" class="customRadio_Div">
            <input type="radio" name="category" id="Cate_education" value="education" required>
            <span class="customRadio"></span>
            <span>Education</span>
        </label>
        <label for="Cate_social" class="customRadio_Div">
            <input type="radio" name="category" id="Cate_social" value="social" required>
            <span class="customRadio"></span>
            <span>Social</span>
        </label>
        <label for="Cate_sport" class="customRadio_Div">
            <input type="radio" name="category" id="Cate_sport" value="sport" required>
            <span class="customRadio"></span>
            <span>Sport</span>
        </label>
        <label for="Cate_crime" class="customRadio_Div">
            <input type="radio" name="category" id="Cate_crime" value="crime" required>
            <span class="customRadio"></span>
            <span>Crime</span>
        </label>
        <label  for="Cate_business" class="customRadio_Div">
            <input type="radio" name="category" id="Cate_business" value="business" required>
            <span class="customRadio"></span>
            <span>Business</span>
        </label>
        <label for="Cate_fashion" class="customRadio_Div">
            <input type="radio" name="category" id="Cate_fashion" value="fashion" required>
            <span class="customRadio"></span>
            <span>Fashion</span>
        </label>
    </div>
    <input type="submit" value="Post" class="customBtn">
</form>
@endsection