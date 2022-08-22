@extends('layouts.default')

@section('link')
    <div class="d-lg-block d-none">
        <div class="top_area">
            <a href="{{ route('home') }}"><img src="{{ asset('css/image/logo.png') }}" alt="森の隠れ家Fukurou" class="logo"></a>
            <ul class="link">
                <li>こんにちは!&nbsp;{{ \Auth::user()->name }}さん!</li>
                <li><a href="{{ route('home') }}">TOP</a></li>
                <li><a href="{{ route('blogs.index') }}">ふくろう通信</a></li>
                <li><a href="{{ route('rooms.index') }}">お部屋案内</a></li>
                <li><a href="{{ route('reserves.index') }}">予約する</a></li>
                <li><a href="{{ route('posts.index') }}">旅人のひとこと</a></li>
                <li><a href="{{ route('mypage') }}">マイページ</a></li>
                @if(\Auth::user()->is_admin === true)
                <li><a href="{{ route('adminhome') }}" class="dropdown-item">管理者ページ</a></li>
                @endif
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" class="btn btn-secondary" value="ログアウト">
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div class="d-block d-lg-none">
        <div class="openbtn"><span></span><span>Menu</span><span></span></div>
        <div class="menubox">
            <a href="{{ route('home') }}"><img src="{{ asset('css/image/logo.png') }}" alt="森の隠れ家Fukurou" class="logo"></a>
            <ul>
                <li><a href="{{ route('home') }}">TOP</a></li>
                <li><a href="{{ route('blogs.index') }}">ふくろう通信</a></li>
                <li><a href="{{ route('rooms.index') }}">お部屋案内</a></li>
                <li><a href="{{ route('reserves.index') }}">予約する</a></li>
                <li><a href="{{ route('posts.index') }}">旅人のひとこと</a></li>
                <li><a href="{{ route('mypage') }}">マイページ</a></li>
                <div class="menubox_login">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" value="ログアウト">
                    </form>
                </div>
            </ul>
        </div>
    </div>
@endsection


@section('footer')
    <div class="footer_area">
        <small>Copyright &copy; Musashi All Rights Reserved.</small>
    </div>
@endsection
