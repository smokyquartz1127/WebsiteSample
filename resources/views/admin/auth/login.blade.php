@extends('layouts.not_logged_in')

@section('main')
    <form method="POST" action="{{ route('admin.login.login') }}" class="detail">
        @csrf
        <h1>管理者ログイン</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            <label>
                ID:
                <input type="text" name="user_id">
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
