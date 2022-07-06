@extends('layouts.admini')

@section('main')
    <div class="row">
        <div class="blog_flex_container d-none d-lg-block">
            <div class="blog_left_bar d-none d-lg-block">
                <p><a href="{{ route('blogs.create') }}">＞新規部屋登録</a></p>
                <button class="slide_btn borderleft"><span>btn01</span></button>
                <button class="slide_btn borderleft"><span>btn02</span></button>
                <button class="slide_btn borderleft"><span>btn03</span></button>
                <button class="slide_btn borderleft"><span>btn04</span></button>
                <button class="slide_btn borderleft"><span>btn05</span></button>
            </div>
            <div class="row blog_container col-12 delay_scroll">
                @forelse($blogs as $blog)
                    <div
                        class="admin_blog_article lineText d-flex justify-content-between order-md-{{ $blogs_count - $blog->id }}">
                        <div class="blog_thumbnail">
                            @if ($blog->image !== '')
                                <img src="{{ asset('storage/' . $blog->image) }}">
                            @else
                                <img src="{{ asset('css/image/bird_shima_fukurou.png') }}">
                            @endif
                            <span class="admin_cap">
                                <h2 class="blog_thumbnail_title">{{ $blog->title }}</h2>
                                <p class="blog_thumbnail_explain">{{ Str::limit($blog->first_paragraph, 50) }}</p>
                                <a href="{{ route('blogs.show', $blog->id) }}">
                                    <p class="blog_detail">詳細を見る&gt;</p>
                                </a>
                                <div class="admin_edit">
                                    <a href="{{ route('blogs.edit', $blog->id) }}" class="admin_edit_button btn btn-secondary">編集</a>
                                    <form method="POST" action="{{ route('blogs.destroy', $blog->id) }}">
                                        @csrf
                                        @method('delete')
                                        <input value="削除" class="btn btn-warning admin_edit_button">
                                    </form>
                                </div>
                            </span>
                        </div>
                    </div>
                @empty
                    <p>投稿はありません。</p>
                @endforelse
            </div>
        </div>
    @endsection
