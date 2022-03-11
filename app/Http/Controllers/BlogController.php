<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\blog;
use App\Models\comments;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Cloner\Data;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('welcome');
    }
    public function own()
    {
        return view('owner', ['name' => 'Hardik Desai']);
    }
    public function create()
    {
        return view('create');
    }
    public function showBlogs()
    {
        $blog = blog::all()->reverse();
        $comment = comments::all();
        return view('/blogs',['blog' => $blog,'comment'=>$comment] );
    }
    public function postblog()
    {
        $crblog = new blog();
        $crblog->username = request('username');
        $crblog->blogText = request('blogtext');
        $crblog->blogID = Str::random(8);
        $crblog->blogcategory = request('category');
        $crblog->likedby = [request('username')];
        
        $crblog->save();
        // return view('blogs');
        $blog = blog::all()->reverse();
        // $blog = blog::al;
        $comment = comments::all();
        return view('/blogs',['blog' => $blog,'comment'=>$comment] );
    }
    public function getBlog()
    {
        $blog = blog::all()->reverse();
        $comment = comments::all();
        return view('/blogs',['blog' => $blog,'comment'=>$comment] );
    }
    public function deleteblog($username)
    {
        $b_id = request('blogid');
        DB::table('blog')->where('blogId', $b_id)->delete();
        $user = user::all()->where('username', $username)->first();
        $TotalBlog = blog::all()->where('username', $username);
        return view('/profile', ['user' => $user, 'TotalBlog' => $TotalBlog]);
    }
    public function addComment()
    {
        $comment = new comments();

        $uname = request('username');
        $cmt = request('comment');
        $bid =request('blogid');
        $comment->username = $uname;
        $comment->comment = $cmt;
        $comment->blogid = $bid;
        $comment->save();
        $comment = comments::all()->first();
        // return redirect('/blogs')->with('blog',$blog)->with('comment',$comment);
        return response()->json(['blogid'=>$bid,'comment'=>$cmt,'username'=>$uname]);   
    }
  
}
