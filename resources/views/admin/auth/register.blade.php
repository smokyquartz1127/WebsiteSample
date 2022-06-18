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

    <form method="POST" action="{{ route('admin.register') }}" class="detail">
        @csrf
        <div>
            <label>
                ユーザー名:
                <input type="text" name="name">
            </label>
        </div>
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
        <div>
            <label>
                パスワード(確認):
                <input type="password" name="password_confirmation">
            </label>
        </div>
        <div>
            <input type="submit" value="登録" class="submit">
        </div>
    </form>
@endsection
