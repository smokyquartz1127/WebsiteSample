@extends('layouts.logged_in')

@section('main')
    <div class="d-none d-lg-block">
        <p class="post_title">旅人より</p>
    </div>
    <div class="row sns_container">
        <div class="posts_left d-none d-lg-block col-lg-2">
            <a href="{{ route('posts.create') }}" class="btnchange bgleft"><span>ひとこと書く</span></a>
        </div>
        <div class="all_posts col-11 col-md-12">
            @forelse($posts as $post)
                <a href="{{ route('posts.show', $post->id) }}" >
                    <div class="post_box">
                        <div class="post_name">
                            <div class="post_icon">
                                @if ($post->user->icon_image !== '')
                                    <img src="{{ asset('storage/' . $post->user->icon_image) }}">
                                @else
                                    <img src="{{ asset('css/image/bird_shima_fukurou.png') }}" alt="画像はありません。" class="user_image">
                                @endif
                            </div>
                            <p class="d-none d-lg-block">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('Y/m/d') }}&nbsp;{{ Str::limit($post->user->name, 15) }}</p>
                            <p class="d-lg-none d-block">{{ Str::limit($post->user->name, 15) }}</p>
                        </div>
                        <div class="post_thumbnail">
                            @if ($post->image !== '')
                                <img src="{{ asset('storage/' . $post->image) }}">
                            @else
                                <img src="{{ asset('css/image/bird_shima_fukurou.png') }}">
                            @endif
                        </div>
                        <!--div class="blog_thumbnail_text">
                            <h2 class="blog_thumbnail_title">{{ Str::limit($post->title, 20) }}</h2>
                            <p class="blog_thumbnail_explain">{{ Str::limit($post->text, 30) }}</p>
                        </div-->
                    </div>
                </a>
            @empty
                <p>投稿はありません。</p>
            @endforelse
        </div>
    </div>
@endsection
