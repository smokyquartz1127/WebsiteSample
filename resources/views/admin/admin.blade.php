@extends('layouts.admini')

@section('main')
    <div class="detail admin_home">
        @if (session('login_msg'))
            <div class="alert alert-success">
                {{ session('login_msg') }}
            </div>
        @endif

        @if (Auth::guard('admins')->check())
            <div>ユーザーID {{ Auth::guard('admins')->id }}でログイン中</div>
        @endif

        <ul>
            <li>ログイン状態: {{ Auth::check() }}</li>
            <li>管理者(Admin)ログイン状態: {{ Auth::guard('admins')->check() }}</li>
        </ul>

        <h2>管理者メニュー</h2>
        <ul>
            <li><a href="{{ route('adminblog') }}">ブログ編集</a></li>
            <li><a href="{{ route('adminroom') }}">部屋管理</a></li>
            <li><a href="{{ route('admin.register') }}">管理者新規登録</a></li>
        </ul>
    @endsection
