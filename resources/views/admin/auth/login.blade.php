@extends('layouts.not_logged_in')

@section('main')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <h1>ログイン</h1>
    <form method="POST" action="{{ route('admin.login') }}" class="detail">
        @csrf
        <div>
            <label>
                メールアドレス:
                <input type="email" name="email">
            </label>
        </div>
        <div>
            <label>
                パスワード:
                <input type="password" name="password">
            </label>
        </div>
        <input type="submit" value="ログイン" class="submit">
    </form>
@endsection
