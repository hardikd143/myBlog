<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function profile($username){
        $user = user::all()->where('username',$username)->first();
        // $user = json_encode($data)->;
        $TotalBlog =blog::all()->where('username',$username);
        return view('/profile',['user' => $user,'TotalBlog'=>$TotalBlog]);
    }
    public function editProfile($username){
        $user = user::all()->where('username',$username)->first();
        return view('/edit-profile',['user' => $user]);
    }
    public function updateProfile(){
        $username = request('username');
        $user=user::all()->where('username',$username)->first();
        $name = request('name');
        $bio = request('bio');
        $user->name = $name;
        $user->bio = $bio;
        // dd($user->name);
        $user->save();
        // user::all()->where('username',$username)->update(['name'=>$name]);
        $TotalBlog =blog::all()->where('username',$username);
        // $user->name = $name;
        return view('/profile',['user' => $user,'TotalBlog'=>$TotalBlog]);
    }
}
