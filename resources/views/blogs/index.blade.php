@extends('layouts.logged_in')

@section('main')
<div class="row">
    <div class="blog_flex_container d-none d-lg-block">
        <div class="blog_left_bar d-none d-lg-block">
            <button class="slide_btn borderleft"><span>btn01</span></button>
            <button class="slide_btn borderleft"><span>btn02</span></button>
            <button class="slide_btn borderleft"><span>btn03</span></button>
            <button class="slide_btn borderleft"><span>btn04</span></button>
            <button class="slide_btn borderleft"><span>btn05</span></button>
        </div>
        <div class="row blog_container col-12 delay_scroll">
            @forelse($blogs as $blog)
                <div class="blog_article lineText d-flex justify-content-between order-md-{{ $blogs_count - $blog->id }}">
                    <a href="{{ route('blogs.show', $blog->id) }}">
                        <div class="blog_thumbnail">
                            <span class="mask">
                                @if ($blog->image !== '')
                                    <img src="{{ asset('storage/' . $blog->image) }}">
                                @else
                                    <img src="{{ asset('css/image/bird_shima_fukurou.png') }}">
                                @endif
                                <span class="cap">
                                    <h2 class="blog_thumbnail_title">{{ $blog->title }}</h2>
                                    <p class="blog_thumbnail_explain">{{ Str::limit($blog->first_paragraph, 50) }}</p>
                                    <p class="blog_detail">詳細を見る&gt;</p>
                                </span>
                            </span>
                        </div>
                    </a>
                </div>
            @empty
                <p>投稿はありません。</p>
            @endforelse
        </div>
    </div>

    <div class="d-none d-sm-block d-lg-none">
        <div class="row blog_container col-12 delay_scroll">
            @forelse($blogs as $blog)
                <div class="blog_article d-flex justify-content-between">
                    <a href="{{ route('blogs.show', $blog->id) }}">
                        <div class="blog_thumbnail_small">
                                @if ($blog->image !== '')
                                    <img src="{{ asset('storage/' . $blog->image) }}">
                                @else
                                    <img src="{{ asset('css/image/bird_shima_fukurou.png') }}">
                                @endif
                                <div class="linetext_cap">
                                    <p class="top_blog_date">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->format('Y-m-d') }}</p>
                                    <h2 class="blog_thumbnail_title">{{ $blog->title }}</h2>
                                    <p class="blog_thumbnail_explain">{{ Str::limit($blog->first_paragraph, 50) }}</p>
                                    <p class="blog_detail">詳細を見る&gt;</p>
                                </div>
                        </div>
                    </a>
                </div>
            @empty
                <p>投稿はありません。</p>
            @endforelse
        </div>
    </div>

    <div class="d-sm-none d-block">
        <div class="row blog_container delay_scroll">
            @forelse($blogs as $blog)
                <div class="blog_article col-10 order-md-{{ $blogs_count - $blog->id }}">
                    <a href="{{ route('blogs.show', $blog->id) }}">
                        <div class="blog_thumbnail_small">
                            @if ($blog->image !== '')
                                <img src="{{ asset('storage/' . $blog->image) }}">
                            @else
                                <img src="{{ asset('css/image/bird_shima_fukurou.png') }}">
                            @endif
                            <div class="linetext_cap">
                                <h2 class="blog_thumbnail_title">{{ $blog->title }}</h2>
                                <p class="blog_thumbnail_explain">{{ Str::limit($blog->first_paragraph, 50) }}</p>
                                <p class="blog_detail">詳細を見る&gt;</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <p>投稿はありません。</p>
            @endforelse
        </div>
    </div>
</div>
<p id="page-top"><a href="#"></a></p>
@endsection
