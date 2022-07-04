@extends('layouts.not_logged_in')

@section('main')
    <form method="POST" action="{{ route('login') }}" class="detail">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group form-row">
            <label class="col-md-3 col-form-label text-md-right" for="youremail">メールアドレス: </label>
            <div class="col-md-9">
                <input type="email" name="email" class="form-control">
            </div>
        </div>
        <div class="form-group form-row">
            <label class="col-md-3 col-form-label text-md-right" for="yourpassword">パスワード:</label>
            <div class="col-md-9">
                <input type="password" name="password" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-11 text-right">
                <input type="submit" value="ログイン" class="btn btn-primary">
            </div>
        </div>
    </form>
@endsection
