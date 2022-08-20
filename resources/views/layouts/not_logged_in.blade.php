@extends('layouts.default')

@section('link')
    <div class="d-lg-block d-none">
        <div class="top_area">
            <a href="{{ route('top') }}"><img src="{{ asset('css/image/logo.png') }}" alt="森の隠れ家Fukurou" class="logo"></a>
            <ul class="link">
                <li>こんにちは！ゲストさん</li>
                <li><a href="{{ route('top') }}">TOP</a></li>
                <li><a href="{{ route('blogs.index_all') }}">ふくろう通信</a></li>
                <li><a href="{{ route('rooms.index_all') }}">お部屋案内</a></li>
                <li><a href="{{ route('reserves.index') }}">予約する</a></li>
                <li>
                    <section class="dropdown">
                        <button class="btn btn-primary dropdown-toggle link_title" data-toggle="dropdown">ログイン</button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('login') }}" class="dropdown-item">ログイン</a></li>
                            <li><a href="{{ route('register') }}" class="dropdown-item">新規登録</a></li>
                            <li><a href="{{ route('admin.login.index') }}" class="dropdown-item">管理者ページ</a></li>
                        </ul>
                    </section>
                </li>
            </ul>
        </div>
    </div>
    <div class="d-block d-lg-none">
        <div class="openbtn"><span></span><span>Menu</span><span></span></div>
        <div class="menubox">
            <a href="{{ route('top') }}"><img src="{{ asset('css/image/logo.png') }}" alt="森の隠れ家Fukurou"
                    class="logo"></a>
            <ul>
                <li><a href="{{ route('top') }}">TOP</a></li>
                <li><a href="{{ route('blogs.index_all') }}">ふくろう通信</a></li>
                <li><a href="{{ route('rooms.index_all') }}">お部屋案内</a></li>
                <li><a href="{{ route('reserves.index') }}">予約する</a></li>
                <div class="menubox_login">
                    <a href="{{ route('login') }}">ログイン</a>
                    <a href="{{ route('register') }}">新規登録</a>
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
