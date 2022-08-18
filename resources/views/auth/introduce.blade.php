@extends('layouts.logged_in')

@section('main')
    <div class="mypage_user" style="background-image: url({{ asset('storage/' . $user->background_image) }})">
        <div class="mypage_profile">
            <div class="mypage_icon">
                @if ($user->icon_image !== '')
                    <img src="{{ asset('storage/' . $user->icon_image) }}">
                @else
                    <img src="{{ asset('css/image/bird_mimizuku.png') }}" alt="画像はありません。" class="user_image">
                @endif
            </div>
            <div class="profile_text">
                <p>{{ \Auth::user()->name }}</p>
                <p>{{ $user->profile }}</p>
            </div>
        </div>
    </div>

    <ul class="mypage_tab">
        <li><a href="#posts">POSTS</a></li>
        <li><a href="#likes">LIKES</a></li>
    </ul>

    <div class="mypage_container">
        <div id="posts" class="mypage_split">
            <div class="mypage_all_posts">
                @forelse($posts as $post)
                <a href="{{ route('posts.introduce_show', $post->user->id) }}">
                    <div class="mypage_post_thumbnail">
                            @if ($post->image !== '')
                                <img src="{{ asset('storage/' . $post->image) }}">
                            @else
                                <img src="{{ asset('css/image/bird_shima_fukurou.png') }}">
                            @endif
                    </div>
                </a>
                @empty
                    <li>まだ投稿はありません。</li>
                @endforelse
                <div class="empty_posts"></div>
                <div class="empty_posts"></div>
                <div class="empty_posts"></div>
                <div class="empty_posts"></div>
            </div>
        </div>
        <div id="likes" class="mypage_split">
            @forelse($like_posts as $post)
            <a href="{{ route('posts.introduce_show', $post->id) }}">
                <div class="post_box">
                    <div class="post_name">
                        <div class="post_icon">
                            @if ($post->user->icon_image !== '')
                                <img src="{{ asset('storage/' . $post->user->icon_image) }}">
                            @else
                                <img src="{{ asset('css/image/bird_shima_fukurou.png') }}" alt="画像はありません。" class="user_image">
                            @endif
                        </div>
                        <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('Y/m/d') }}&nbsp;{{ Str::limit($post->user->name, 15) }}
                        </p>
                    </div>
                    <div class="post_thumbnail">
                        @if ($post->image !== '')
                            <img src="{{ asset('storage/' . $post->image) }}">
                        @else
                            <img src="{{ asset('css/image/bird_shima_fukurou.png') }}">
                        @endif
                    </div>
                    <div class="blog_thumbnail_text">
                        <h2 class="blog_thumbnail_title">{{ Str::limit($post->title, 20) }}</h2>
                        <p class="blog_thumbnail_explain">{{ Str::limit($post->text, 50) }}</p>
                    </div>
                </div>
            </a>
            @empty
                <p>ここではいいねした投稿が見ることができます。</p>
            @endforelse
            <div class="empty_likes"></div>
            <div class="empty_likes"></div>
        </div>
    </div>
@endsection
