<?php

namespace App\Http\Controllers;

use App\Post;
use App\Blog;
use App\Like;
use App\Services\FileUploadService;
use App\Http\Requests\PostRequest;
use App\Http\Requests\ImageRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //-----------------sns--------------
    //投稿一覧
    public function index()
    {
        $posts = Post::latest('created_at')->get();
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }
    //新規投稿フォーム
    public function create()
    {
        return view('posts.create');
    }
    //新規投稿処理
    public function store(PostRequest $request, FileUploadService $service)
    {
        $path = $service->saveImage($request->file('image'));

        Post::create([
            'user_id' => \Auth::user()->id,
            'title' => $request->title,
            'text' => $request->text,
            'image' => $path,
        ]);
        session()->flash('success', '投稿しました!');
        return redirect()->route('posts.index');
    }
    //投稿詳細
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', [
            'post' => $post,
        ]);
    }
    //投稿詳細(マイページ用)
    public function mypage_show($id)
    {
        $post = Post::find($id);
        return view('posts.mypage_show', [
            'post' => $post,
        ]);
    }
    //投稿詳細(introduce用)
    public function introduce_show($id)
    {
        $post = Post::find($id);
        return view('posts.introduce_show', [
            'post' => $post,
        ]);
    }


    //編集
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', [
            'post' => $post,
        ]);
    }
    //更新処理
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->only([
            'title', 'text',
        ]));
        return redirect()->route('mypage');
    }
    //画像編集
    public function editImage($id){
        $post = Post::find($id);
        return view('posts.edit_image', [
            'post' => $post,
        ]);
    }
    //画像更新処理
    public function updateImage(FileUploadService $service, $id, ImageRequest $request){
        $path = $service->saveImage($request->file('image'));
        $post = Post::find($id);
        if($post->image !== ''){
            \Storage::disk('public')->delete(\Storage::url($post->image));
        }

        $post->update([
            'image' => $path,
        ]);
        return redirect()->route('posts.show', $post->id);
    }
    //削除処理
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        session()->flash('success', '投稿を削除しました');
        return redirect()->route('mypage');
    }
    //いいね機能
    public function toggleLike($id){
        $user = \Auth::user();
        $post = Post::find($id);

        if($post->isLikedBy($user)){
            $post->likes->where('user_id', $user->id)->first()->delete();
            \Session::flash('success', 'いいねしました');
        } else{
            Like::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
            ]);
            \Session::flash('success', 'いいねしました');
        }
        return redirect()->route('posts.show', $post->id);
    }
}
