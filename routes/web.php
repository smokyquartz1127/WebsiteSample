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

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin;
use App\Http\Controllers;
use App\Http\Controllers\Admin\LoginController;

//-----------------ログイン----------------------
//一般
Auth::routes();
Route::get('/mypage', 'UserController@mypage')->name('mypage');
Route::get('/mypage/{user}/edit', 'UserController@edit')->name('user.edit');
Route::patch('/mypage/{user}/edit', 'UserController@update')->name('user.update');

Route::get('/mypage/{user}/icon_edit', 'UserController@icon_edit')->name('user.icon_edit');
Route::patch('/mypage/{user}/icon_edit', 'UserController@icon_update')->name('user.icon_update');
Route::get('/mypage/{user}/background_edit', 'UserController@background_edit')->name('user.background_edit');
Route::patch('/mypage/{user}/background_edit', 'UserController@background_update')->name('user.background_update');
Route::get('/user/{user}', 'UserController@introduce')->name('introduce');


//管理者
/*Route::prefix('admin')->as('admin.')->namespace('Admin')->group(function(){
    Auth::routes();
});*/

//管理者とフロントでログインを分ける
/*Route::prefix('admin')->group(function (){
    Route::get('login', [Admin\LoginController::class, 'index'])->name('admin.login.index');
    Route::post('login', [Admin\LoginController::class, 'login'])->name('admin.login.login');
    Route::get('logout', [Admin\LoginController::class, 'logout'])->name('admin.login.logout');
});
Route::prefix('admin')->middleware('auth:administrators')->group(function (){
    Route::get('/adminindex', [Admin\IndexController::class, 'index'])->name('admin.index');
});*/

/*Route::get('login', [Controllers\LoginController::class, 'index'])->name('login.index');
Route::post('login', [Controllers\LoginController::class, 'login'])->name('login.login');
Route::get('logout', [Controllers\LoginController::class, 'logout'])->name('login.logout');*/


//-----------------トップページ--------------------
Route::get('/', 'BlogController@top')->name('top');
Route::get('/home', 'BlogController@home')->name('home');
Route::get('/adminhome', 'Admin\IndexController@index')->name('adminhome');

//-----------------ブログ-------------------------
Route::resource('blogs', 'BlogController');
Route::get('/blogs_all', 'BlogController@index_all')->name('blogs.index_all');
Route::get('/blogs_all_show/{blog}', 'BlogController@show_all')->name('blogs.show_all');
Route::get('/adminindex', 'BlogController@adminindex')->name('adminblog');
Route::get('/adminshow/{blog}', 'BlogController@adminshow')->name('adminblogshow');
Route::get('/blogs/{blog}/blog_editimage', 'BlogController@editImage')->name('blogs.editimage');
Route::patch('/blogs/{blog}/blog_editimage', 'BlogController@updateImage')->name('blogs.updateimage');

//------------------SNS---------------------------
Route::resource('posts', 'PostController');
Route::get('posts/{post}/post_editimage', 'PostController@editimage')->name('posts.editimage');
Route::patch('/posts/{post}/post_editimage', 'PostController@updateImage')->name('posts.updateimage');
Route::get('/mypage_posts_show/{post}', 'PostController@mypageShow')->name('posts.mypage_show');
Route::get('/introduce_posts_show/{post}', 'PostController@introduceShow')->name('introduce.show');
Route::patch('/posts/{post}/toggle_like', 'PostController@toggleLike')->name('posts.toggle_like');
//-----------------コメント----------------
Route::post('/comments', 'PostController@commentStore')->name('comments.store');

//------------------予約--------------------------
Route::get('/reserve/list', 'ReserveController@list')->name('reserves.list');
Route::get('/reserve', 'ReserveController@index')->name('reserves.index');
Route::get('/reserve/again', 'ReserveController@again')->name('reserves.again');
Route::get('/reserve/confirm', 'ReserveController@confirm')->name('reserves.confirm');
Route::post('/reserve/regist', 'ReserveController@regist')->name('reserves.regist');
Route::get('/reserve/finish/{reserve}', 'ReserveController@finish')->name('reserves.finish');

//-----------------部屋--------------------------
Route::resource('rooms', 'RoomController')->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy',
]);
Route::get('/rooms_all', 'RoomController@index_all')->name('rooms.index_all');
Route::get('/adminroom', 'RoomController@adminindex')->name('adminroom');
Route::get('/rooms/{room}/room_editimage', 'RoomController@editImage')->name('room.editimage');
Route::patch('/rooms/{room}/room_editimage', 'RoomController@updateImage')->name('room.updateimage');
