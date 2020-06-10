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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'BlogController@index');
Route::get('/home/{slug}', 'BlogController@post')->name('blog.home');
Route::get('/articles', 'BlogController@articles')->name('blog.articles');
Route::get('/categories/{category}', 'BlogController@categories')->name('blog.categories');
Route::get('/with-tags/{tag}', 'BlogController@tags')->name('blog.tags');
Route::get('/search', 'BlogController@search')->name('blog.search');
Route::get('/about-us', 'BlogController@about_us')->name('blog.about');
Route::get('/contact-us', 'BlogController@contact_us')->name('blog.contact');



Route::group(['middleware' => 'auth'], function(){
    
    // @Category Route
    Route::resource('/category', 'CategoryController');
    // @End Category Route
    
    // @Tags Route
    Route::resource('/tags', 'TagController');
    // @End Tags Route
    
    // @Post Route
    Route::get('/posts/trash', 'PostController@trash_posts')->name('posts.trash');
    Route::get('/posts/restore/{id}', 'PostController@restore_posts')->name('posts.restore');
    Route::delete('/posts/kill/{id}', 'PostController@permanent_delete')->name('posts.kill');
    Route::resource('/posts', 'PostController');
    // @End Post Route

    // @Users Route
    Route::resource('/users', 'UserController');
    // @End Users Route

    // @About Route
    Route::post('/about/logo/{id}', 'AboutController@logo')->name('about.logo');
    Route::resource('/about', 'AboutController');
    // @End About Route
    
});
 

