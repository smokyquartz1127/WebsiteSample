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
Route::prefix('admin')->as('admin.')->namespace('Admin')->group(function(){
    Auth::routes();
});
Route::get('/adminhome', 'BlogController@admin_home')->name('adminhome');

//-----------------トップページ--------------------
Route::get('/', 'BlogController@top')->name('top');
Route::get('/home', 'BlogController@home')->name('home');

//-----------------ブログ-------------------------
Route::resource('blogs', 'BlogController');
Route::get('/blogs_all', 'BlogController@index_all')->name('blogs.index_all');
Route::get('/blogs_all_show/{blog}', 'BlogController@show_all')->name('blogs.show_all');
Route::get('/adminindex', 'BlogController@adminindex')->name('adminblog');
Route::get('/adminshow/{blog}', 'BlogController@adminshow')->name('adminblogshow');

//------------------SNS---------------------------
Route::resource('posts', 'PostController');
Route::patch('/posts/{post}/toggle_like', 'PostController@toggleLike')->name('posts.toggle_like');

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
