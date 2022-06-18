@extends('layouts.default')

@section('main')
    <h2>{{ $title }}</h2>
    <a href={{ route('adminblog') }}>&lt;戻る</a>
    <form method="POST" action="{{ route('blogs.update', $blog->id) }}" enctype="multipart/form-data" class="detail">
        @csrf
        @method('patch')
        <div>
            <label>タイトル:
                <input type="text" name="title" value="{{ $blog->title }}">
            </label>
        </div>
        <div>
            <label>第一段落
                <textarea type="text" name="first_paragraph">{{ $blog->first_paragraph }}</textarea>
            </label>
        </div>
        <div>
            <label>第二段落
                <textarea type="text" name="second_paragraph">{{ $blog->second_paragraph }}</textarea>
            </label>
        </div>
        <div>
            <label>第三段落
                <textarea type="text" name="third_paragraph">{{ $blog->third_paragraph }}</textarea>
            </label>
        </div>
        <div>
            <input class="submit" type="submit" value="更新">
        </div>
    </form>
    </div>
@endsection
