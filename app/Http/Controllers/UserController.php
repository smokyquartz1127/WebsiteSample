<?php

namespace App\Http\Controllers;

use App\User;
use App\Reserve;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\IconImageRequest;
use App\Http\Requests\BackgroundImageRequest;


class UserController extends Controller
{
    public function mypage()
    {
        $user = \Auth::user();
        $reserves = \Auth::user()->reserves;
        $posts = \Auth::user()->posts;
        $like_posts = \Auth::user()->likePosts;
        return view('auth.mypage', [
            'user' => $user,
            'reserves' => $reserves,
            'posts' => $posts,
            'like_posts' => $like_posts,
        ]);
    }

    //ユーザー情報
    public function introduce($id){
        $user = User::find($id);
        $posts = $user->posts;
        $like_posts = $user->likePosts;
        return view('auth.introduce', [
            'user' => $user,
            'posts' => $posts,
            'like_posts' => $like_posts,
        ]);
    }

    public function edit(){
        return view('auth.edit', [
            'user' => \Auth::user(),
        ]);
    }

    public function update(UserRequest $request){
        $user = \Auth::user();
        $user->update($request->only([
            'name', 'email', 'profile',
        ]));
        session()->flash('success', '更新しました！');
        return redirect()->route('mypage');
    }

    public function icon_edit(){
        return view('auth.icon_edit', [
            'user' => \Auth::user(),
        ]);
    }
    public function icon_update(IconImageRequest $request, FileUploadService $service){
        $path = $service->saveImage($request->file('icon_image'));
        $user = \Auth::user();

        if($user->icon_image !== ''){
            \Storage::disk('public')->delete(\Storage::url($user->icon_image));
        }
        $user->update([
            'icon_image' => $path,
        ]);
        return redirect()->route('mypage');
    }
    public function background_edit(){
        return view('auth.background_image_edit', [
            'user' => \Auth::user(),
        ]);
    }
    public function background_update(BackgroundImageRequest $request, FileUploadService $service){
        $path = $service->saveImage($request->file('background_image'));
        $user = \Auth::user();

        if($user->background_image !== ''){
            \Storage::disk('public')->delete(\Storage::url($user->background_image));
        }
        $user->update([
            'background_image' => $path,
        ]);
        return redirect()->route('mypage');
    }
}
