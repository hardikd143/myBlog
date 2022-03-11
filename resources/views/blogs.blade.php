@extends('layouts.app')
<link href="{{ asset('css/blogs.css') }}" rel="stylesheet">
@section('title', 'Blogs')

@section('content')
<a href="/blogs/create" class="customBtn">Create</a> <br><br>
<!-- <h2>{{Auth()->user()}}</h2> -->
@if(session()->has('error'))
<h1>Error</h1>
@endif
@foreach($blog as $b)
<div class="blogWrapper _box_shadow">
    <!-- blogID : {{$b->blogID}} <br> -->
    <div class="blog_desc">
        <span class="created-at">{{$b->created_at}}</span>
    </div>
    <div class="d-flex justify-content-between mt-2">
        <h3><a href="/home/{{$b->username}}" class="username text-decoration-none">{{$b->username}}</a></h3>
        <button class="copyBtn copyBlogText" data-copy="blogtext">Copy</button>
    </div>
    <div class="blog_Display">
        <p class="blogText">{{$b->blogText}}</p>
    </div>
    <div class="categoryDiv">
        <span class="categoryTitle">category : </span>
        <span class="category {{$b->blogcategory}}">{{$b->blogcategory}}</span>
    </div>
    <!-- <div class="blog_stats mt-20">
        <button class="blog_comment_btn">
            <i class="far fa-comment"></i>
        </button>
    </div> -->
    <div class="blog_comment_box ">
        <?php $i = 0; ?>
        @foreach($comment as $cmnt)
        @if($b->blogID == $cmnt["blogid"])
        @if($cmnt['username'] == Auth::user()->username )
        <?php $i++; ?>
        @endif
        @endif
        @endforeach
        <!-- <span><?php echo $i; ?> is your total comments on this post </span> -->
        <!-- <h4>Comments</h4> -->
        @if($i >= 5)
        <div class="comment-not-valid">
            <span class="d-block h-40 lh-40">Can't comment on this blog now</span>
        </div>
        @else
        <div class="add_comment_box mb-2 ">
            <div class="user_profile">
                <img src="https://img.icons8.com/color/30/000000/circled-user-{{Auth::user()->gender}}-skin-type-7--v1.png" alt="">
            </div>

            <div class="comment_form_div">

                {!! Form::open(['class'=>'addcomment-form','method' => 'post','action'=>['App\Http\Controllers\BlogController@addComment']]) !!}

                @csrf
                {!! Form::hidden('blogid', $value =$b->blogID ) !!}
                <!-- {!! Form::hidden('username', $value =Auth::user()->username)!!} -->
                <input type="hidden" name="username" value="{{Auth::user()->username}}">
                <input type="text" name="comment" placeholder="Add a comment" id="comment" data-user="{{Auth::user()->username}}" autocomplete="off">
                <button type="submit" class="customBtn send_Comment_Btn">Send</button>
                <div class="anim"></div>
                </form>
            </div>
        </div>
        @endif
        
        <button class="toggle_comment_box_btn fas fa-chevron-down"></button>
        <div class="comments_box ">
            @foreach($comment as $cmnt)
            @if($b->blogID == $cmnt["blogid"])
            <div class="user_comment" data-comment-by="{{$cmnt->username}}" data-commented-on="{{$b->blogID}}">
                <a href="/home/{{$cmnt->username}}" class="_username">
                    <h6 class="m-0 me-5">{{$cmnt->username}}</h5>
                </a>
                <p class="m-0 _text">{{$cmnt->comment}}</p>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endforeach
@endsection