<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'App\Http\Controllers\BlogController@index');
Route::get('/blogs/create','App\Http\Controllers\BlogController@create')->middleware('auth');
// Route::get('/home/owner', 'App\Http\Controllers\BlogController@own');
Route::post('/blogs', 'App\Http\Controllers\BlogController@postblog')->middleware('auth');
Route::get('/blogs', 'App\Http\Controllers\BlogController@showBlogs')->middleware('auth');
Route::post('/home/{username}','App\Http\Controllers\BlogController@deleteblog')->middleware('auth');
Route::post('/blogs/add-comment','App\Http\Controllers\BlogController@addComment');
Route::post('/blogs/save-blog','App\Http\Controllers\BlogController@saveblog');
Route::get('/home/{username}','App\Http\Controllers\ProfileController@profile')->middleware('auth');
Route::get('/{username}/edit-profile','App\Http\Controllers\ProfileController@editProfile')->middleware('auth');
Route::put('/home/{username}','App\Http\Controllers\ProfileController@updateProfile')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
