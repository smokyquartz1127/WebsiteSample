@extends('layouts.admini')

@section('main')
<div class="detail admin_home">
    <h2>管理者メニュー</h2>
    <ul>
        <li><a href="{{ route('adminblog') }}">ブログ編集</a></li>
        <li><a href="{{ route('adminroom') }}">部屋管理</a></li>
        <li><a href="{{ route('admin.register') }}">管理者新規登録</a></li>
    </ul>
@endsection
