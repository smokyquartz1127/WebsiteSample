@extends('layouts.admini')

@section('main')
    <div class="blog_header_title">
        <h1>{{ $title }}</h1>
    </div>
    <div class="new_blog">
        <a href={{ route('blogs.create') }}>新規作成</a>
    </div>
    <div class="blog_container delay_scroll">
        @forelse($blogs as $blog)
            <div class="blog_thumbnail">
                <a href="{{ route('adminblogshow', $blog->id) }}">
                    <div class="blog_article">
                        @if ($blog->image !== '')
                            <img src="{{ asset('storage/' . $blog->image) }}">
                        @else
                            <img src="{{ asset('css/image/bird_shima_fukurou.png') }}">
                        @endif
                    </div>
                    <h2 class="blog_thumbnail_title">{{ $blog->title }}</h2>
                    <p class="blog_thumbnail_explain">{{ Str::limit($blog->first_paragraph, 50) }}</p>
                    <div>
                        <p>詳細を見る&gt;</p>
                    </div>
                    <div class="edit_button">
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="submit">編集</a>
                        <form method="POST" action="{{ route('blogs.destroy', $blog->id) }}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="削除" class="submit">
                        </form>
                    </div>
                </a>
            </div>
        @empty
            <p>投稿はありません。</p>
        @endforelse
    </div>
@endsection
