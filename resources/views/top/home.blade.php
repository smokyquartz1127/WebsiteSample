@extends('layouts.logged_in')

@section('main')
    <div class="welcome">
        <div class="welcome_text">
            <p>Welcome to</p>
            <h1>FUKUROU HOUSE</h1>
            <p>A fantasy hotel in the forest.</p>
        </div>
    </div>
    <div class="main_content">
        <div class="main_background">
            <!---施設案内--->
            <div class="board" id="ABOUT">
                <h2 class="main_title">ABOUT</h2>
                <p class="area_title">森と、ともに暮らす</p>
                <p class="area_intro">ようこそ、私たちの森の家へ。
                    <br>ここでの暮らしを少しだけお見せします。
                </p>
                <ul class="card_slider" data-modal-state="closed">
                    <!------画像１------->
                    <li>
                        <div class="zoomInText">
                            <a href="#modal" class="show">
                                <span class="mask">
                                    <img class="show_image" src="{{ asset('css/image/owl_coffee.jpg') }}">
                                    <span class="cap">Food</span>
                                </span>
                            </a>
                        </div>
                    </li>
                    <!------画像２----------->
                    <li>
                        <div class="zoomInText">
                            <a href="#modal_second_meal" class="show_second">
                                <span class="mask">
                                    <img class="show_image" src="{{ asset('css/image/saboten.webp') }}">
                                    <span class="cap">Shop</span>
                                </span>
                            </a>
                        </div>
                    </li>
                    <!-------画像３------------>
                    <li>
                        <div class="zoomInText">
                            <a href="#modal_third_meal" class="show_third">
                                <span class="mask">
                                    <img class="show_image" src="{{ asset('css/image/bed.webp') }}">
                                    <span class="cap">Room</span>
                                </span>
                            </a>
                        </div>
                    </li>
                    <!-----------画像４---------------->
                    <li>
                        <div class="zoomInText">
                            <a href="#modal_fourth_meal" class="show_fourth">
                                <span class="mask">
                                    <img class="show_image" src="{{ asset('css/image/owl.jpg') }}">
                                    <span class="cap">Around</span>
                                </span>
                            </a>
                        </div>
                    </li>
                    <!-----------画像5---------------->
                    <li>
                        <div class="zoomInText">
                            <a href="#modal_fifth_meal" class="show_fifth">
                                <span class="mask">
                                    <img class="show_image" src="{{ asset('css/image/coffee.jpg') }}">
                                    <span class="cap">Coffee</span>
                                </span>
                            </a>
                        </div>
                    </li>
                </ul>
                <p class="text_center">※画像をクリックすると、説明が表示されます。</p>

                <!---モーダルの中身--->
                <div id="modal">
                    <div class="modal_content">
                        <img src="{{ asset('css/image/owl_coffee.jpg') }}" alt="画像08">
                        <p>フクロウのケーキプレートでひとやすみ。</p>
                        <div>
                            <button id="confirm" class="share_button"><span class="oi"
                                    data-glyph="external-link"></span>シェア</button>
                        </div>
                    </div>
                </div>
                <div id="modal_second_meal">
                    <div class="modal_content">
                        <img src="{{ 'css/image/saboten.webp' }}" alt="画像09">
                        <p>店内には植物がたくさん置いてあります。</p>
                        <div>
                            <button id="confirm_second" class="share_button"><span class="oi"
                                    data-glyph="external-link"></span>シェア</button>
                        </div>
                    </div>
                </div>
                <div id="modal_third_meal">
                    <div class="modal_content">
                        <img src="{{ asset('css/image/bed.webp') }}" alt="画像10">
                        <p>落ち着いて過ごせる、温かみのある部屋です。</p>
                        <div>
                            <button id="confirm_third" class="share_button"><span class="oi"
                                    data-glyph="external-link"></span>シェア</button>
                        </div>
                    </div>
                </div>
                <div id="modal_fourth_meal">
                    <div class="modal_content">
                        <img src="{{ asset('css/image/owl.jpg') }}" alt="画像11">
                        <p>ふくろうも遊びに来てくれます。</p>
                        <div>
                            <button id="confirm_fourth" class="share_button"><span class="oi"
                                    data-glyph="external-link"></span>シェア</button>
                        </div>
                    </div>
                </div>
                <div id="modal_fifth_meal">
                    <div class="modal_content">
                        <img src="{{ asset('css/image/coffee.jpg') }}" alt="画像12">
                        <p>ゆっくりコーヒーでもいかかが？</p>
                        <div>
                            <button id="confirm_fourth" class="share_button"><span class="oi"
                                    data-glyph="external-link"></span>シェア</button>
                        </div>
                    </div>
                </div>
            </div>

            <p class="cutline">----------</p>

            <!---ふくろうとは--->
            <div class="board" id="CONCEPT">
                <h2 class="main_title">CONCEPT</h2>
                <p class="area_title">森の番人の家</p>
                <div class="concept_explain_box row">
                    <div class="concept_explain order-sm-1">
                        ・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                    </div>
                    <div class="concept_explain order-sm-2">
                        ・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                        <br>・・・・・・・・・・・・・・・・・・・・・・
                    </div>
                    <div class="small_people order-sm-3">
                        <img src="{{ asset('css/image/small_people.jpg') }}">
                    </div>
                </div>
            </div>

            <p class="cutline">----------</p>

            <!---活動していること--->
            <div class="board" id="ACTION">
                <h2 class="main_title">ACTION</h2>
                <div class="flex_container row">
                    <div class="col-md-5 order-md-1">
                        <div class="bird_space">
                            <p class="top_blog_title">鳥の保護活動</p>
                            <p class="bird_explain">
                                ・・・・・・・・・・・・・・・・・・・・・・
                                <br>・・・・・・・・・・・・・・・・・・・・・・
                                <br>・・・・・・・・・・・・・・・・・・・・・・
                            </p>
                            <div class="bird_image">
                                <img src="{{ asset('css/image/owl_tree.jpg') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 order-md-2">
                        <div class="bird_space">
                            <p class="top_blog_title">バードウォッチング会</p>
                            <p class="bird_explain">
                                ・・・・・・・・・・・・・・・・・・・・・・
                                <br>・・・・・・・・・・・・・・・・・・・・・・
                                <br>・・・・・・・・・・・・・・・・・・・・・・
                            </p>
                            <div class="bird_image">
                                <img src="{{ asset('css/image/owl_sky.jpg') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <p class="cutline">----------</p>

            <!---Fukurou通信--->
            <div class="board" id="BLOG">
                <h2 class="main_title">BLOG</h2>
                <ul class="blog_slider">
                    @forelse($blogs as $blog)
                    <li>
                        <a href="{{ route('blogs.show', $blog->id) }}">
                            <div class="top_blog_space">
                                <p class="top_blog_date">
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->format('Y-m-d') }}
                                </p>
                                <div class="top_blog_image">
                                    @if ($blog->image !== '')
                                        <img src="{{ asset('storage/' . $blog->image) }}">
                                    @else
                                        <img src="{{ asset('css/image/bird_shima_fukurou.png') }}" alt="画像はありません。">
                                    @endif
                                </div>
                                <div class="top_blog_info">
                                    <p class="top_blog_title">{{ Str::limit($blog->title, 50) }}</p>
                                    <p class="top_blog_text">{{ Str::limit($blog->first_paragraph, 50) }}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    @empty
                        <li>投稿はありません。</li>
                    @endforelse
                </ul>
            </div>

            <p class="cutline">----------</p>

            <!---アクセス--->
            <div class="board" id="ACCESS">
                <h2 class="main_title">ACCESS</h2>
                <p class="area_intro">周辺に公共交通機関がありません。
                    <br>車か徒歩でお越しください。
                </p>
                <div class="map_image">
                    <img src="{{ asset('css/image/map.webp') }}" alt="マップ情報がありません。">
                </div>
            </div>

            <p class="cutline">----------</p>

            <!---LINK--->
            <div class="board">
                <h2 class="main_title">LINK</h2>
                <div class="row footer_link_area col-md-6">
                    <ul class="footer_link_small col-4 order-sm-1">
                        <h2>Return</h2>
                        <li><a href="{{ route('top') }}">ページトップ</a></li>
                        <li><a href="#GALLERY">ABOUT</a></li>
                        <li><a href="#CONCEPT">CONCEPT</a></li>
                        <li><a href="#ACTION">ACTION</a></li>
                        <li><a href="#BLOG">BLOG</a></li>
                        <li><a href="#ACCESS">ACCESS</a></li>
                    </ul>
                    <ul class="footer_link_small col-4 order-sm-2">
                        <h2>Reading</h2>
                        <li><a href="#">ふくろう通信</a></li>
                    </ul>
                    <ul class="footer_link_small col-4 order-sm-3">
                        <h2>Contact</h2>
                        <li><a href="#">TEL: 000-0000-0000</a></li>
                        <li><a href="#">事務所: 都道府県梟市森2960-3</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <p id="page-top"><a href="#"></a></p>
@endsection
