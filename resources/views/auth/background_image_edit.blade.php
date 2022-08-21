@extends('layouts.logged_in')

@section('main')
    <div class="return_button">
        <a href="{{ route('mypage') }}">←戻る</a>
    </div>
    <form method="POST" action="{{ route('user.background_update', $user->id) }}" enctype="multipart/form-data" class="detail">
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
        <p class="edit_mypage">背景画像変更</p>
        <div class="mypage_image_change">
            <p>(現在の画像)</p>
            @if ($user->background_image !== '')
                <img src="{{ asset('storage/' . $user->background_image) }}">
            @else
                <div></div>
            @endif
        </div>
        <div class="form-group form-row">
            <label class="col-md-3 col-form-label text-md-right">新しい画像を選択: </label>
            <div class="col-md-9">
                <input type="file" name="background_image" value="{{ $user->backgroung_image }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-11 text-right">
                <input type="submit" value="上書き保存" class="btn btn-primary">
            </div>
        </div>
    </form>
@endsection
