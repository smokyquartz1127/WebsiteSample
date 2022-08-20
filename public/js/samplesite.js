$(function(){
    if(screen.width <= 992){
        $('body').addClass('not_scrollbar');
    }
});

$(window).on('load', function(){
    var path = location.pathname;
    if(path === "/"){
        $('#opening').addClass('splash');
        $('#opening_logo').addClass('splash_logo');
        $('.splash').delay(1500).fadeOut('slow');
        $('.splash_logo').delay(1200).fadeOut('slow');
    }
});

//------いいね機能-------
$('.like_button').each(function () {
    $(this).on('click', function () {
        $('.like').submit();
    });
});

//--------背景画像一括管理--------
$(function () {
    var path = location.pathname;
    if (path === "/login" || path === "/register") {
        $('body').addClass("background_whole")
    } else if (path === "/mypage") {
        $('body').addClass("mypage_back")
    } else if (path === "/blogs_all" || path === "/blogs") {
        $('.wrapper').addClass("blog_back_cover")
        $('body').addClass("blog_back")
    } else if (path === "/rooms" || path === "/rooms_all") {
        $('body').addClass("rooms_back")
    } else if (path === "/reserve") {
        $('body').addClass("reserve_back")
    } else if (path === "/posts" || path === "/posts_all") {
        $('body').addClass("post_back")
    } else {
        $('body').addClass("mypage_back")
    }
})

//--------トップページ背景スライダー----------
$(function () {
    var path = location.pathname;
    if (path === "/" || path === "/home") {
        $('body').vegas({
            slides: [
                { src: 'css/image/morning.jpg' },
                { src: 'css/image/sky.webp' },
                { src: 'css/image/sunset.jpg' },
                { src: 'css/image/star.jpg' }
            ],
            transition: 'blur',
            transitionDuration: 4000,
            delay: 10000,
        });
    }
});

//------Menu1ボタン------
$('.openbtn').click(function () {
    $(this).toggleClass('active');
    $('.menubox').toggleClass('active');
});

//------Editボタン------
$('.user_edit_btn').click(function () {
    $(this).toggleClass('active');
    $('.editbox').toggleClass('active');
});

//-------ページトップ------
function PageTopAnime() {
    var scroll = $(window).scrollTop();
    if (scroll >= 300) {
        $('#page-top').removeClass('DownMove');
        $('#page-top').addClass('UpMove');
    } else {
        if ($('#page-top').hasClass('UpMove')) {
            $('#page-top').removeClass('UpMove');
            $('#page-top').addClass('DownMovw');
        }
    }
}
$(window).scroll(function () {
    PageTopAnime();
});
$('#page-top a').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 500);
    return false;
});
//---------ページリンク---------
$('#pagelink a[href*="#"]').click(function () {
    var elmHash = $(this).attr('href');
    var pos = $(elmHash).offset().top - 70;
    $('body,html').animate({ scrollTop: pos }, 500);
    return false;
});

//--------ログイン選択ボタン---------
$('.link_title').on('click', function () {
    if ($(this).hasClass('btn-primary')) {
        $(this).removeClass('btn-primary');
        $(this).addClass('btn-warning');
    } else {
        $(this).removeClass('btn-warning');
        $(this).addClass('btn-primary');
    }
});

//--------フェードアウトandイン---------
function disBlurAnime() {
    $('.welcome').each(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 100) {
            $(this).removeClass('blur');
            $(this).addClass('blur_disappear');
        } else {
            if ($(this).hasClass('blur_disappear')) {
                $(this).removeClass('blur_disappear');
                $(this).addClass('blur');
            }
        }
    });
}
$(window).scroll(function () {
    disBlurAnime();
});

//--------フェードインandアウト------------
function BlurAnime() {
    $('.carry_fukurou').each(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 100) {
            $(this).removeClass('blur_disappear');
            $(this).addClass('blur');
        } else {
            if ($(this).hasClass('blur')) {
                $(this).removeClass('blur');
                $(this).addClass('blur_disappear');
            }
        }
    });
}
$(window).scroll(function () {
    BlurAnime();
});

//-------ブログスライダー-----------
$('.blog_slider').slick({
    slidesToShow: 3,
    dots: true,
    autoplay: true,
    autoplaySpeed: 5000,
    arrows: false,
    infinite: true,
    pauseOnHover: true,
    responsive: [
        {
            breakpoint: 960,
            settings: {
                slidesToShow: 2,
                slideToScroll: 1
            },
        },
        {
            breakpoint: 540,
            settings: {
                slidesToShow: 1,
                slideToScroll: 1
            },
        }
    ]
});

//--------施設案内スライダー--------------
$('.card_slider').slick({
    slidesToShow: 4,
    dots: true,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: false,
    infinite: true,
    pauseOnHover: true,
    centerMode: true,
    responsive: [
        {
            breakpoint: 960,
            settings: {
                slidesToShow: 2,
                slideToScroll: 1
            },
        },
        {
            breakpoint: 540,
            settings: {
                slidesToShow: 1,
                slideToScroll: 1
            },
        }
    ]
});

$('.show').modaal({
    content_source: '#modal',
    type: 'inline',
    width: '600px'
});
$('.show_second').modaal({
    content_source: '#modal_second_meal',
    type: 'inline'
});
$('.show_third').modaal({
    content_source: '#modal_third_meal',
    type: 'inline'
});
$('.show_fourth').modaal({
    content_source: '#modal_fourth_meal',
    type: 'inline'
});
$('.show_fifth').modaal({
    content_source: '#modal_fifth_meal',
    type: 'inline'
});

$('#confirm').on('click', () => {
    alert('シェアしました！');
    $('.show').modaal('close')
});
$('#confirm_second').on('click', () => {
    alert('シェアしました！');
    $('.show_second').modaal('close')
});
$('#confirm_third').on('click', () => {
    alert('シェアしました！');
    $('.show_third').modaal('close')
});
$('#confirm_fourth').on('click', () => {
    alert('シェアしました！');
    $('.show_fourth').modaal('close')
});

$('.introduce_modal').modaal({
    content_source: '#introduce_modal',
    type: 'inline'
});

//----------左上から現れる・下から順番に現れる-------------
function delaySmoothAnime() {
    var time = 0.1;
    var value = time;
    $('.delay_scroll').each(function () {
        var parent = this;
        var elemPos = $(this).offset().top;
        var scroll = $(window).scrollTop();
        var windowHeight = $(window).height();
        var childs = $(this).children();

        if (!$(parent).hasClass("play")) {
            $(childs).each(function () {
                if (!$(this).hasClass("smooth")) {
                    $(parent).addClass("play");
                    $(this).addClass("smooth");
                    $(this).css("animation-delay", value + "s");
                    $(this).addClass("smooth");
                    value = value + time;

                    var index = $(childs).index(this);
                    if ((childs.length - 1) === index) {
                        $(parent).removeClass("play");
                    }
                }
            })
        } else {
            $(childs).removeClass("smooth");
            value = time;
        }
    })
}
$(window).on('load', () => {
    delaySmoothAnime();
});

//----------マイぺージ-------------
function GethashID(hashIDName) {
    if (hashIDName) {
        $('.mypage_tab').find('a').each(function () {
            var idName = $(this).attr('href');
            if (idName == hashIDName) {
                var parentElm = $(this).parent();
                $('.mypage_tab li').removeClass("active");
                $(parentElm).addClass("active");
                $(".mypage_split").removeClass("is-active");
                $(hashIDName).addClass("is-active");
            }
        });
    }
}
$('.mypage_tab a').on('click', function () {
    var idName = $(this).attr('href');
    GethashID(idName);
    return false;
});
$(window).on('load', function () {
    $('.mypage_tab li:first-of-type').addClass("active");
    $('.mypage_split:first-of-type').addClass("is-active");
    var hashName = location.hash;
    GethashID(hashName);
});

