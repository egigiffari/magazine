<?php

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

// use Illuminate\Routing\Route;            

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function (){
    return view('home');
});


Route::resource('/category', 'CategoryController');

Route::resource('/tags', 'TagController');

// @Post Route
Route::get('/posts/trash', 'PostController@trash_posts')->name('posts.trash');
Route::get('/posts/restore/{id}', 'PostController@restore_posts')->name('posts.restore');
Route::delete('/posts/kill/{id}', 'PostController@permanent_delete')->name('posts.kill');
Route::resource('/posts', 'PostController');
// @End Post Route