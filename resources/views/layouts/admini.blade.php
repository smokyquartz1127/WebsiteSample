@extends('layouts.default')

@section('link')
<div class="top_area">
    <a href="{{ route('adminhome') }}"><img src="image/logo.png" alt="森の隠れ家Fukurou"></a>
    <ul class="link">
        <p>こんにちは、管理者さん！</p>
        <li><a href="{{ route('adminhome') }}">管理者TOP</a></li>
        <li><a href="{{ route('adminblog') }}">ブログ編集</a></li>
        <li><a href="{{ route('adminroom') }}">部屋管理</a></li>
        <li><a href="#">設定</a></li>
        <li><a href="#">ログアウト</a></li>
    </ul>
</div>
@endsection
