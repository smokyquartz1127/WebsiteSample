@extends('layouts.not_logged_in')

@section('main_small')
    <div class="welcome">
        <div class="welcome_text">
            <p>Welcome to</p>
            <h1>FUKUROU HOUSE</h1>
            <p>A fantasy hotel in the forest.</p>
        </div>
    </div>
    <div class="main_content">
        <!---施設案内--->
        <div class="box" id="GALLERY" data-section-name="GALLERY">
            <div class="board">
                <h2 class="main_title">ABOUT</h2>
                <p class="area_title">森と、ともに暮らす</p>
                <p class="area_intro">ようこそ、私たちの森の家へ。
                    <br>ここでの暮らしを少しだけお見せします。
                </p>
                <div class="card_slider" data-modal-state="closed">
                    <!------画像１------->
                    <div class="zoomInText">
                        <a href="#modal" class="show">
                            <span class="mask">
                                <img class="show_image" src="{{ asset('css/image/owl_coffee.jpg') }}">
                                <span class="cap">Food</span>
                            </span>
                        </a>
                    </div>
                    <!------画像２----------->
                    <div class="zoomInText">
                        <a href="#modal_second_meal" class="show_second">
                            <span class="mask">
                                <img class="show_image" src="{{ asset('css/image/saboten.webp') }}">
                                <span class="cap">Shop</span>
                            </span>
                        </a>
                    </div>
                    <!-------画像３------------>
                    <div class="zoomInText">
                        <a href="#modal_third_meal" class="show_third">
                            <span class="mask">
                                <img class="show_image" src="{{ asset('css/image/bed.webp') }}">
                                <span class="cap">Room</span>
                            </span>
                        </a>
                    </div>
                    <!-----------画像４---------------->
                    <div class="zoomInText">
                        <a href="#modal_fourth_meal" class="show_fourth">
                            <span class="mask">
                                <img class="show_image" src="{{ asset('css/image/owl.jpg') }}">
                                <span class="cap">Around</span>
                            </span>
                        </a>
                    </div>
                    <!-----------画像5---------------->
                    <div class="zoomInText">
                        <a href="#modal_fifth_meal" class="show_fifth">
                            <span class="mask">
                                <img class="show_image" src="{{ asset('css/image/coffee.jpg') }}">
                                <span class="cap">Coffee</span>
                            </span>
                        </a>
                    </div>
                </div>
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
        </div>
        <!---ふくろうとは--->
        <div class="box" id="CONCEPT" data-section-name="CONCEPT">
            <div class="board small_people">
                <h2 class="main_title">CONCEPT</h2>
                <p class="area_title">森の番人の家</p>
                <div class="concept_explain_box">
                    <div class="concept_explain">
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
                    <div class="concept_explain">
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
                </div>
                <!--div>
                    <a href="{{ route('top') }}" class="detail_link">Read More &#62</a>
                </div-->
            </div>
        </div>

        <!---活動していること--->
        <div class="box" id="ACTION" data-section-name="ACTION">
            <div class="board">
                <h2 class="main_title">ACTION</h2>
                <div class="flex_container">
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
                        <!--div>
                            <a href="{{ route('top') }}" class="detail_link">Read More &#62</a>
                        </div-->
                    </div>
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
                        <!--div>
                            <a href="{{ route('top') }}" class="detail_link">Read More &#62</a>
                        </div-->
                    </div>
                </div>
            </div>
        </div>

        <!---Fukurou通信--->
        <div class="box" id="BLOG" data-section-name="BLOG">
            <div class="board">
                <h2 class="main_title">BLOG</h2>
                <div class="blog_slider">
                    @forelse($blogs as $blog)
                        <a href="{{ route('blogs.show_all', $blog->id) }}">
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
                                    <div class="detail_link_box">
                                        <p class="detail_link">Read More &#62</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p>投稿はありません。</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!---アクセス--->
        <div class="box" id="ACCESS" data-section-name="ACCESS">
            <div class="board">
                <h2 class="main_title">ACCESS</h2>
                <p class="area_intro">周辺に公共交通機関がありません。
                    <br>車か徒歩でお越しください。
                </p>
                <div class="map_image">
                    <img src="{{ asset('css/image/map.webp') }}" alt="マップ情報がありません。">
                </div>
            </div>
        </div>

        <!---LINK--->
        <div class="box" id="LINK" data-section-name="LINK">
            <div class="container_link">
                <h2 class="main_title title_color_change">LINK</h2>
                <div class="footer_link_area">
                    <ul class="footer_link">
                        <h2>ページ内リンク</h2>
                        <li><a href="{{ route('top') }}">Top</a></li>
                        <li><a href="#GALLERY">ABOUT</a></li>
                        <li><a href="#CONCEPT">Concept</a></li>
                        <li><a href="#ACTION">Action</a></li>
                        <li><a href="#BLOG">Blogs</a></li>
                        <li><a href="#ACCESS">アクセス</a></li>
                    </ul>
                    <ul class="footer_link">
                        <h2>Reading</h2>
                        <li><a href="#">ふくろう通信</a></li>
                    </ul>
                    <ul class="footer_link">
                        <h2>Contact</h2>
                        <li><a href="#">TEL: 000-0000-0000</a></li>
                        <li><a href="#">事務所: 都道府県梟市森2960-3</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <p id="page-top"><a href="#"></a></p>
    </div>
@endsection
