@extends('layouts.admini')

@section('main')
    <div class="detail admin_home">
        <h2>管理者メニュー</h2>
        <ul>
            <li><a href="{{ route('adminblog') }}">ブログ編集</a></li>
            <li><a href="{{ route('adminroom') }}">部屋管理</a></li>
        </ul>
    @endsection
