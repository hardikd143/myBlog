@extends('layouts.app')
@extends('layouts.footer')
@section('title', 'admin')

@section('content')
        <div class="relative flex flex-column items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0">
            <h1>Hello user , I am {{name}}</h1>
            <p>I'm the creator of myBlog .</p>
        </div>
@endsection
