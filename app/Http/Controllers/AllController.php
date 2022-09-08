<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Room;
use Illuminate\Http\Request;

class AllController extends Controller
{
    //-------------------------トップページ---------------------------
    public function top()
    {
        $blogs = Blog::latest()->take(8)->get();
        return view('top.top', [
            'blogs' => $blogs,
        ]);
    }

    //ブログ一覧ページ(未ログイン)
    public function blogs_index()
    {
        $blogs = Blog::latest('created_at')->get();
        $pickups = Blog::inRandomOrder()->take(3)->get();
        $blogs_count = $blogs->count();
        return view('blogs.index_all', [
            'blogs' => $blogs,
            'pickups' => $pickups,
            'blogs_count' => $blogs_count + 1,
        ]);
    }
    public function blogs_show($id)
    {
        $blog = Blog::find($id);
        $max = Blog::max('id');
        $previous = $blog->where('id', '<', $id)->orderBy('id', 'desc')->first();
        $next = $blog->where('id', '>', $id)->orderBy('id', 'asc')->first();
        return view('blogs.show_all', [
            'title' => 'ふくろう通信',
            'blog' => $blog,
            'max' => $max,
            'previous' => $previous,
            'next' => $next,
        ]);
    }

    //部屋一覧ページ(未ログイン)
    public function rooms_index()
    {
        $rooms = Room::all();
        return view('rooms.index_all', [
            'rooms' => $rooms,
        ]);
    }

}
