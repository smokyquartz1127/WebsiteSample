@extends('layouts.logged_in')

@section('main')
    <div class="detail">
        <a href="{{ route('introduce', $post->user->id) }}">
            <div class="post_name">
                @if ($post->user->icon_image !== '')
                    <img src="{{ asset('storage/' . $post->user->icon_image) }}">
                @else
                    <img src="{{ asset('css/image/bird_shima_fukurou.png') }}" alt="画像はありません。" class="user_image">
                @endif
                <p class="d-none d-lg-block">
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('Y/m/d') }}&nbsp;{{ Str::limit($post->user->name, 15) }}
                </p>
                <p class="d-lg-none d-block">{{ Str::limit($post->user->name, 15) }}</p>
            </div>
        </a>
        <h2 class="sns_title">{{ $post->title }}</h2>
        <p class="sns_text">{{ $post->text }}</p>
        <div class="sns_image">
            @if ($post->image !== '')
                <img src="{{ asset('storage/' . $post->image) }}">
            @else
                <p>画像はありません</p>
            @endif
        </div>
        @if($post->user->id === \Auth::user()->id)
            <div class="edit_post_button">
                <a href="{{ route('posts.edit', $post->id) }}" class="submit">編集</a>
                <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="削除" class="submit">
                </form>
            </div>
        @endif
        <div class="like_button">
            <a>{{ $post->isLikedBy(\Auth::user()) ? '★' : '☆' }}</a>
            <form method="POST" class="like" action="{{ route('posts.toggle_like', $post->id) }}">
                @csrf
                @method('patch')
            </form>
        </div>
    </div>
@endsection
