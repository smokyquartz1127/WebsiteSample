@extends('layouts.default')

@section('main')
<a href="{{ route('posts.index') }}">←戻る</a>
<div class="detail">
    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="text" class="sns_form" name="title" placeholder="タイトル">
        </div>
        <div>
            <textarea class="sns_form sns_textarea" name="text" placeholder="コメント"></textarea>
        </div>
        <div>
            <input type="file" name="image">
        </div>
        <div>
            <input class="submit" type="submit" value="投稿">
        </div>
    </form>
</div>
@endsection
