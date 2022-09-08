@extends('layouts.not_logged_in')

@section('main')
    <h2>{{ $title }}</h2>
    <a href={{ route('adminblog') }}>&lt;戻る</a>
    <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data" class="detail">
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
        <div>
            <label>タイトル:
                <input type="text" name="title">
            </label>
        </div>
        <div>
            <label>第一段落
                <textarea type="text" name="first_paragraph"></textarea>
            </label>
        </div>
        <div>
            <label>第二段落
                <textarea type="text" name="second_paragraph"></textarea>
            </label>
        </div>
        <div>
            <label>第三段落
                <textarea type="text" name="third_paragraph"></textarea>
            </label>
        </div>
        <div>
            <label>画像
                <input type="file" name="image">
            </label>
        </div>
        <div>
            <input class="submit" type="submit" value="投稿">
        </div>
    </form>
@endsection
