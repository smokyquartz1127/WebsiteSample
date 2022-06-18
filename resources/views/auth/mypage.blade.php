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
            <div class="row">
                <div class="d-lg-block d-none">
                    <ul class="user_edit_link">
                        <a href="{{ route('user.edit', $user->id) }}">
                            <li class="user_link_change bgleft"><span>profile</span></li>
                        </a>
                        <a href="{{ route('user.icon_edit', $user->id) }}">
                            <li class="user_link_change bgleft"><span>icon</span></li>
                        </a>
                        <a href="{{ route('user.background_edit', $user->id) }}">
                            <li class="user_link_change bgleft"><span>background</span></li>
                        </a>
                    </ul>
                </div>
                <div class="d-block d-lg-none">
                    <div class="user_edit_btn"><span></span><span>EDIT</span><span></span></div>
                    <div class="editbox">
                        <ul>
                            <li><a href="{{ route('user.edit', $user->id) }}">profile</a></li>
                            <li><a href="{{ route('user.icon_edit', $user->id) }}">icon</a></li>
                            <li><a href="{{ route('user.background_edit', $user->id) }}">background</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <ul class="mypage_tab">
        <li><a href="#posts">POSTS</a></li>
        <li><a href="#likes">LIKES</a></li>
        <li><a href="#info">RECORD</a></li>
    </ul>

    <div class="mypage_container">
        <div id="posts" class="mypage_split">
            <div class="mypage_all_posts">
                @forelse($posts as $post)
                <a href="{{ route('posts.show', $post->id) }}">
                    <div class="mypage_post_thumbnail">
                            @if ($post->image !== '')
                                <img src="{{ asset('storage/' . $post->image) }}">
                            @else
                                <img src="{{ asset('css/image/bird_shima_fukurou.png') }}">
                            @endif

                        <!--div class="blog_thumbnail_text">
                            <h2 class="blog_thumbnail_title">{{ Str::limit($post->title, 20) }}</h2>
                            <p class="blog_thumbnail_explain">{{ Str::limit($post->text, 50) }}</p>
                        </div-->
                    </div>
                </a>
                @empty
                    <li>まだ投稿はありません。</li>
                @endforelse
            </div>
        </div>
        <div id="likes" class="mypage_split">
            @forelse($like_posts as $post)
            <a href="{{ route('posts.show', $post->id) }}">
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
                    <!--div class="blog_thumbnail_text">
                        <h2 class="blog_thumbnail_title">{{ Str::limit($post->title, 20) }}</h2>
                        <p class="blog_thumbnail_explain">{{ Str::limit($post->text, 50) }}</p>
                    </div-->
                </div>
            </a>
            @empty
                <p>ここではいいねした投稿が見ることができます。</p>
            @endforelse
        </div>
        <div id="info" class="mypage_split">
            <p  class="mypage_table_title">宿泊履歴</p>
            <table class="mypage_table">
                @forelse($reserves as $reserve)
                    <tr>
                        <td>{{ $reserve->start }}</td>
                        <td>{{ $reserve->room->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">まだ宿泊していません。</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection
