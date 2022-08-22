@extends('layouts.default')

@section('link')
<div class="top_area">
    <a href="{{ route('adminhome') }}"><img src="{{ asset('css/image/logo.png') }}" alt="森の隠れ家Fukurou" class="logo"></a>
    <ul class="link">
        <p>こんにちは、管理者さん！</p>
        <li><a href="{{ route('adminhome') }}">管理者TOP</a></li>
        <li><a href="{{ route('adminblog') }}">ブログ編集</a></li>
        <li><a href="{{ route('adminroom') }}">部屋管理</a></li>
        <li><a href="{{ route('home') }}">管理者画面から出る</a></li>
    </ul>
</div>
@endsection
