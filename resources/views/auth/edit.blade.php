@extends('layouts.logged_in')

@section('main')
    <div class="return_button">
        <a href="{{ route('mypage') }}">←戻る</a>
    </div>
    <form method="POST" action="{{ route('user.update', $user->id) }}" class="detail">
        @csrf
        @method('patch')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <p class="edit_mypage">プロフィール情報編集</p>
        <div class="form-group form-row">
            <label class="col-md-3 col-form-label text-md-right" for="yourname">ユーザー名: </label>
            <div class="col-md-9">
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>
        </div>
        <div class="form-group form-row">
            <label class="col-md-3 col-form-label text-md-right" for="youremail">メールアドレス: </label>
            <div class="col-md-9">
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>
        </div>
        <div class="form-group form-row">
            <label class="col-md-3 col-form-label text-md-right">プロフィール: </label>
            <div class="col-md-9">
                <input type="text" name="profile" class="form-control" value="{{ $user->profile }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-11 text-right">
                <input type="submit" value="上書き保存" class="btn btn-primary">
            </div>
        </div>
    </form>
@endsection
