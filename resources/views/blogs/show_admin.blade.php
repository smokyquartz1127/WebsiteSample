@extends('layouts.default')

@section('main')
    <a href="{{ route('adminblog') }}">&lt;戻る</a>
    <div class="detail">
        <div class="article_container">
            <h2>{{ $blog->title }}</h2>
            <div>
                <a href="{{ route('blogs.edit', $blog->id) }}" class="submit">編集</a>
                <form method="POST" action="{{ route('blogs.destroy', $blog->id) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="削除" class="submit">
                </form>
            </div>
            <div>
                <li class="article_text">
                    @if($blog->image !== '')
                        <img src="{{ asset('storage/'. $blog->image) }}" class="article_image">
                    @else
                        <img src="{{ asset('css/image/bird_shima_fukurou.png') }}" alt="画像はありません。" class="article_image">
                    @endif
                    {{ $blog->first_paragraph }}
                </li>
                <li class="article_text">{{ $blog->second_paragraph }}</li>
                <li class="article_text">{{ $blog->third_paragraph }}</li>
                    @if($blog->second_paragraph === '')
                <li class="blogs_blank"></li>
            @endif
            </div>
        </div>
    </div>
@endsection
