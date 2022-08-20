@extends('layouts.logged_in')

@section('main')
    <div class="return_button">
        <a href="{{ url()->previous() }}">←戻る</a>
    </div>
    <div class="detail">
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
        <h2 class="sns_title">{{ $post->title }}</h2>
        <p class="sns_text">{{ $post->text }}</p>
        <div class="sns_image">
            @if ($post->image !== '')
                <img src="{{ asset('storage/' . $post->image) }}">
            @else
                <p>画像はありません</p>
            @endif
        </div>
        @if ($post->user->id === \Auth::user()->id)
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
    <div class="post_comment_area">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input class="comment_text" type="text" name="comment" placeholder="コメントを書く">
            <input class="btn btn-primary" type="submit" value="コメントを送信する">
        </form>
        @forelse($post->comments as $comment)
            <div class="post_comment_box">
                <div class="post_comment_name">
                    @if ($comment->user->icon_image !== '')
                        <img src="{{ asset('storage/' . $comment->user->icon_image) }}">
                    @else
                        <img src="{{ asset('css/image/bird_shima_fukurou.png') }}" alt="画像はありません。" class="user_image">
                    @endif
                    <p class="d-none d-lg-block">
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $comment->created_at)->format('Y/m/d') }}&nbsp;{{ Str::limit($comment->user->name, 15) }}
                    </p>
                    <p class="d-lg-none d-block">{{ Str::limit($comment->user->name, 15) }}&nbsp;さん</p>
                </div>
                <div class="post_comment">
                    <p>{{ $comment->comment }}</p>
                </div>
            </div>
        @empty
            <p>コメントはまだありません。</p>
        @endforelse
    </div>
@endsection
