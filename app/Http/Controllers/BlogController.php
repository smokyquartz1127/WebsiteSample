<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\ImageRequest;
use App\Services\FileUploadService;

class BlogController extends Controller
{
//-------------------------トップページ---------------------------
    public function top()
    {
        $blogs = Blog::latest()->take(8)->get();
        return view('top.top', [
            'blogs' => $blogs,
        ]);
    }

 //---------------ホーム画面(ログイン時)---------
    public function home()
    {
        $blogs = Blog::latest()->take(8)->get();
        return view('top.home', [
            'blogs' => $blogs,
        ]);
    }

//--------------------------ブログ--------------------------------
    //ブログ一覧ページ(ログイン)
    public function index()
    {
        $blogs = Blog::latest('created_at')->get();
        $blogs_count = $blogs->count();
        return view('blogs.index', [
            'blogs' => $blogs,
            'blogs_count' => $blogs_count + 1,
        ]);
    }
    public function show($id)
    {
        $blog = Blog::find($id);
        $max = Blog::max('id');
        $previous = $blog->where('id', '<', $id)->orderBy('id', 'desc')->first();
        $next = $blog->where('id', '>', $id)->orderBy('id', 'asc')->first();
        return view('blogs.show', [
            'title' => 'ふくろう通信',
            'blog' => $blog,
            'max' => $max,
            'previous' => $previous,
            'next' => $next,
        ]);
    }

    //ブログ一覧ページ(未ログイン)
    public function index_all()
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
    public function show_all($id)
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

    //---------------ここから管理者のみ--------------------
    //----------------------管理者ページ-----------------------
    public function admin_home()
    {
        return view('admin.admin');
    }

    //管理者用ブログトップページ
    public function adminindex()
    {
        $blogs = Blog::latest('created_at')->get();
        $pickups = Blog::inRandomOrder()->take(3)->get();
        $blogs_count = $blogs->count();
        return view('blogs.index_admin', [
            'title' => '管理者ページ',
            'blogs' => $blogs,
            'pickups' => $pickups,
            'blogs_count' => $blogs_count + 1,
        ]);
    }

    //管理者用ブログ詳細ページ
    public function adminshow($id)
    {
        $blog = Blog::find($id);
        $max = Blog::max('id');
        $previous = $blog->where('id', '<', $id)->orderBy('id', 'desc')->first();
        $next = $blog->where('id', '>', $id)->orderBy('id', 'asc')->first();
        return view('blogs.show_admin', [
            'title' => 'ふくろう通信',
            'blog' => $blog,
            'max' => $max,
            'previous' => $previous,
            'next' => $next,
        ]);
    }

    //新規作成画面
    public function create()
    {
        return view('blogs.create', [
            'title' => '記事作成',
        ]);
    }

    //新規作成処理
    public function store(BlogRequest $request, FileUploadService $service)
    {
        $path = $service->saveImage($request->file('image'));
        Blog::create([
            'admin_id' => '2',
            'title' => $request->title,
            'first_paragraph' => $request->first_paragraph,
            'second_paragraph' => $request->second_paragraph,
            'third_paragraph' => $request->third_paragraph,
            'image' => $path,
        ]);
        session()->flash('success', '投稿しました!');
        return redirect()->route('adminblog');
    }

    //編集画面
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blogs.edit', [
            'title' => 'ブログ編集画面',
            'blog' => $blog,
        ]);

    }

    //更新処理
    public function update($id, BlogRequest $request)
    {
        $blog = Blog::find($id);
        $blog->update($request->only([
            'title', 'first_paragraph', 'second_paragraph', 'third_paragraph'
        ]));
        session()->flash('success', '更新しました！');
        return redirect()->route('adminblog');
    }

    public function editImage($id)
    {
        $blog = Blog::find($id);
        return view('blogs.edit_image', [
            'blog' => $blog,
        ]);
    }

    public function updateImage(FileUploadService $service, ImageRequest $request, $id)
    {
        $path = $service->saveImage($request->file('image'));
        $blog = Blog::find($id);
        if($blog->image !== ''){
            \Storage::disk('public')->delete(\Storage::url($blog->image));
        }

        $blog->update([
            'image' => $path,
        ]);
        return redirect()->route('adminblog');
    }

    //削除処理
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        session()->flash('success', '投稿を削除しました。');
        return redirect()->route('adminblog');
    }
}
