<!doctype html>
<html xmlns:fb="http://ogp.me/ns/fb#" lang="en">
<head>
    <meta charset="UTF-8">
    <base href="{{asset('public/layout/frontend')}}/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') </title>
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/dest/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/dest/vendors/colorbox/example3/colorbox.css">
    <link rel="stylesheet" href="assets/dest/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="assets/dest/rs-plugin/css/responsive.css">
    <link rel="stylesheet" title="style" href="assets/dest/css/style.css">
    {{--<link rel="stylesheet" title="style" href="assets/dest/css/zoom.css">--}}
    {{--<link href="assets/dest/css/bootstrap.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="assets/dest/css/animate.css">
    <link rel="stylesheet" title="style" href="assets/dest/css/huong-style.css">
    <link rel="stylesheet" title="style" href="assets/dest/css/owl.carousel.css">
    {{--<link rel="stylesheet" title="style" href="assets/dest/css/cloudzoom.css">--}}
    <link rel="stylesheet" title="style" href="assets/dest/css/owl.theme.default.min.css">
    <script src="assets/dest/js/jquery-3.2.1.min.js"></script>
    <script src="assets/dest/js/owl.carousel.js"></script>
    {{--<script src="assets/dest/js/cloudzoom.js"></script>--}}
    <style>
        body {
            font-family: monospace;
        }

        .social-icons {
            float: left;
            list-style: none;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        .main-menu ul li a {
            text-transform: uppercase;
        }

        .footer-block ul li a:hover {
            color: #673ab7;
        }

        .footer-block .social-icons li a {
            font-size: 16px;
        }

        .social-icon li a:hover {
            color: #673ab7;
        }

        .footer-block ul li a {
            color: #acacac;
            margin: 0 auto;
        }

        .social-icon li a {
            font-size: 22px;
            font-weight: 600;
            padding: 0 10px;
            color: #fff;
        }

        .social-icons li {
            background: rgba(255, 255, 255, .13) none repeat scroll 0 0;
            border-radius: 50px;
            color: #fff !important;
            display: inline-block;
            height: 40px;
            line-height: 40px;
            text-align: center;
            width: 40px;
            text-align: center;
            font-size: 16px;
            margin-right: 4px;
            float: left;
            position: relative;
            margin-bottom: 8px;
        }

        a:hover {
            background: none;
        }

        .fb-livechat, .fb-widget {
            display: none
        }

        .ctrlq.fb-button,
        .ctrlq.fb-close {
            position: fixed;
            right: 24px;
            cursor: pointer
        }

        .ctrlq.fb-button {
            z-index: 999;
            background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff;
            width: 60px;
            height: 60px;
            text-align: center;
            bottom: 30px;
            border: 0;
            outline: 0;
            border-radius: 60px;
            -webkit-border-radius: 60px;
            -moz-border-radius: 60px;
            -ms-border-radius: 60px;
            -o-border-radius: 60px;
            box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16);
            -webkit-transition: box-shadow .2s ease;
            background-size: 80%;
            transition: all .2s ease-in-out
        }

        .ctrlq.fb-button:focus,
        .ctrlq.fb-button:hover {
            transform: scale(1.1);
            box-shadow: 0 2px 8px rgba(0, 0, 0, .09), 0 4px 40px rgba(0, 0, 0, .24)
        }

        .fb-widget {
            background: #fff;
            z-index: 1000;
            position: fixed;
            width: 360px;
            height: 435px;
            overflow: hidden;
            opacity: 0;
            bottom: 0;
            right: 24px;
            border-radius: 6px;
            -o-border-radius: 6px;
            -webkit-border-radius: 6px;
            box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
            -webkit-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
            -moz-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
            -o-box-shadow: 0 5px 40px rgba(0, 0, 0, .16)
        }

        .fb-credit {
            text-align: center;
            margin-top: 8px
        }

        .fb-credit a {
            transition: none;
            color: #bec2c9;
            font-family: Helvetica, Arial, sans-serif;
            font-size: 12px;
            text-decoration: none;
            border: 0;
            font-weight: 400
        }

        .ctrlq.fb-overlay {
            z-index: 0;
            position: fixed;
            height: 100vh;
            width: 100vw;
            -webkit-transition: opacity .4s, visibility .4s;
            transition: opacity .4s, visibility .4s;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, .05);
            display: none
        }

        .ctrlq.fb-close {
            z-index: 4;
            padding: 0 6px;
            background: #365899;
            font-weight: 700;
            font-size: 11px;
            color: #fff;
            margin: 8px;
            border-radius: 3px
        }

        .ctrlq.fb-close::after {
            content: "X";
            font-family: sans-serif
        }

        .bubble {
            width: 20px;
            height: 20px;
            background: #c00;
            color: #fff;
            position: absolute;
            z-index: 999999999;
            text-align: center;
            vertical-align: middle;
            top: -2px;
            left: -5px;
            border-radius: 50%;
        }

        .bubble-msg {
            width: 120px;
            left: -140px;
            top: 5px;
            position: relative;
            background: rgba(59, 89, 152, .8);
            color: #fff;
            padding: 5px 8px;
            border-radius: 8px;
            text-align: center;
            font-size: 13px;
        }
    </style>
    <meta property="fb:app_id" content="429467917501529"/>
    <meta property="fb:admins" content="100006364260597"/>
</head>
<body>

{{--<script lang="javascript">(function () {--}}
{{--var pname = ((document.title != '') ? document.title : ((document.querySelector('h1') != null) ? document.querySelector('h1').innerHTML : ''));--}}
{{--var ga = document.createElement('script');--}}
{{--ga.type = 'text/javascript';--}}
{{--ga.async = 1;--}}
{{--ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=53808d4301a2b3e836474687e21f69c2&data=eyJzc29faWQiOjU1MDc0OTYsImhhc2giOiI1MTBmMTZiZGYxZDQyMDAzNDAzMTM0N2FmNzcxY2Y5YSJ9&pname=' + pname;--}}
{{--var s = document.getElementsByTagName('script');--}}
{{--s[0].parentNode.insertBefore(ga, s[0]);--}}
{{--})();</script>--}}

<div id="header">
    <div class="header-top">
        {{--<div class="container">--}}
        <div class="pull-left auto-width-left">
            <ul class="top-menu menu-beta l-inline">
                <li><a href=""><i class="fa fa-home"></i> Số 55- Nguyễn Trãi- Hà Cầu- Hà Đông- Hà Nội</a></li>
                <li><a href=""><i class="fa fa-phone"></i> 0987654321</a></li>
                <li><a href=""><i class="fa fa-envelope "></i>suhouse@gmail.com</a></li>

                @if (Route::has('login'))
                    @auth
                        <li style="margin-left:90px;border-left: 1px solid #ccc">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                        class="fa fa-sign-out"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <li><a href="{{asset('profile')}}"><i class="fa fa-user"></i>{{ Auth::user()->name }} </a></li>
                        <li><a href="{{asset('wishlist')}}"><i class="fa fa-heart"></i>Yêu thích</a></li>
                        <li style="border-right: none"><a href="{{asset('history')}}"><i class="fa fa-book"></i>Lịch sử</a>
                        </li>

                    @else
                        <li style="border:none;margin-left: 360px"><a href="{{ route('login') }}"><i
                                        class="fa fa-sign-in"></i>Đăng nhập</a></li>
                        <li style="padding:0;border: none"><a href="{{ route('register') }}"><i class="fa fa-key"></i>Đăng
                                kí</a></li>

                    @endauth
                @endif
            </ul>
        </div>
        <div class="clearfix"></div>
        {{--</div> <!-- .container -->--}}
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="padding-top:20px;background: #fff">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span>
                <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a class="text-center"
                           style="font-family:monospace;font-size:18px;color: #666;font-weight: bold;padding: 10px;"
                           href="{{asset('/')}}">HOME</a></li>
                    @foreach($catelist as $cate)
                        <li>
                            <a class="text-center"
                               style="font-family:monospace;font-size:18px;color: #666;font-weight: bold;padding: 10px;margin-left: 10px"
                               href="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}">{{$cate->cate_name}}</a>
                        </li>
                    @endforeach
                    <li><a class="text-center"
                           style="font-family:monospace;font-size:18px;color: #666;font-weight: bold;padding: 10px;margin-left: 10px"
                           href="{{asset('/ordersearch')}}">ĐƠN HÀNG</a>
                    </li>
                    <li class="pull-right" style="margin-left:50px;">
                        <div class="pull-right beta-components space-left ov">
                            <div class="beta-comp" style="margin-bottom: 10px">
                                <form role="search" method="get" id="searchform" action="{{ route('search') }}">
                                    {{--<form role="search" method="get" id="searchform">--}}
                                    <input type="text" value="" name="search" id="s" placeholder="Nhập từ khóa..."/>
                                    <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                                </form>
                            </div>
                            <div style="position: relative;text-align: center;" class="beta-comp">
                                <a href="{{asset('cart/show')}}">
                                    <img src="assets/dest/images/bag.png">
                                    @if(Cart::count()>0)
                                        <span style="font-weight:bold;color:#E32124;font-size: 13px; position: absolute;top: 60%;left: 50%;transform: translate(-50%, -50%);">
                                        {{Cart::count()}}
                                    </span>
                                    @endif
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->

@yield('main')

{{--Facebook Comment--}}

<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=429467917501529';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

{{--Facebook chat--}}

<div class="fb-livechat">
    <div class="ctrlq fb-overlay"></div>
    <div class="fb-widget">
        <div class="ctrlq fb-close"></div>
        <div class="fb-page" data-href="https://www.facebook.com/tripplethrees" data-tabs="messages" data-width="360"
             data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false"></div>
        <div class="fb-credit"><a href="https://chanhtuoi.com" target="_blank">Powered by Chanhtuoi</a></div>
        <div id="fb-root"></div>
    </div>
    <a href="https://m.me/suhousehadong" title="Gửi tin nhắn cho chúng tôi qua Facebook" class="ctrlq fb-button">
        <div class="bubble">1</div>
        <div class="bubble-msg">Bạn cần hỗ trợ?</div>
    </a></div>
<script src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>$(document).ready(function () {
        function detectmob() {
            if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
                return true;
            } else {
                return false;
            }
        }

        var t = {delay: 125, overlay: $(".fb-overlay"), widget: $(".fb-widget"), button: $(".fb-button")};
        setTimeout(function () {
            $("div.fb-livechat").fadeIn()
        }, 8 * t.delay);
        if (!detectmob()) {
            $(".ctrlq").on("click", function (e) {
                e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({
                    bottom: 0,
                    opacity: 0
                }, 2 * t.delay, function () {
                    $(this).hide("slow"), t.button.show()
                })) : t.button.fadeOut("medium", function () {
                    t.widget.stop().show().animate({bottom: "30px", opacity: 1}, 2 * t.delay), t.overlay.fadeIn(t.delay)
                })
            })
        }
    });
</script>

{{--<div class="fb-page" data-href="https://www.facebook.com/tripplethrees" data-tabs="messages" data-width="360"--}}

{{--Footer--}}
<div style="margin-top: 50px" id="footer" class="color-div">
    <div class="container">
        <div class="row">
            <div class="col-sm-3" style="font-family:monospace;">

                <h4 class="widget-title"
                    style="font-weight:bolder;border-bottom: 1px solid gray;padding-bottom: 5px;font-family: monospace">
                    ABOUT US</h4>
                {{--<img src="assets/dest/images/logo.png" width="150px">--}}
                {{--<div class="text-center" style="width: 120px;height: 20px;margin-top:-20px;background: black;font-weight: bold"></div>--}}
                <p style="margin-bottom: 10px;font-weight: bold"><span style="font-weight: bolder">"Chúng tôi muốn thay đổi suy nghĩ của người Việt trẻ về nền
                    văn hoá ăn mặc :
                    sự tối giản và nhanh gọn
                    không chỉ thể hiện qua quần áo mà còn từ lối sống để hướng tới nhiều mục tiêu cao cả hơn."
                    </span>
                </p>
                <div>
                    <ul class="inline-list social-icons social-icon">
                        <li>
                            <a class="icon-fallback-text" href="" target="_blank">
                                <span class="fa fa-twitter" aria-hidden="true"></span>
                            </a></li>
                        <li>
                            <a class="icon-fallback-text" href="https://www.facebook.com/suhousehadong/"
                               target="_blank">
                                <span class="fa fa-facebook" aria-hidden="true"></span>
                            </a></li>
                        <li>
                            <a class="icon-fallback-text" href="#" rel="publisher" target="_blank">
                                <span class="fa fa-google-plus" aria-hidden="true"></span>
                            </a></li>
                        <li>
                            <a class="icon-fallback-text" href="#" target="_blank">
                                <span class="fa fa-instagram" aria-hidden="true"></span>
                            </a></li>
                        <li>
                            <a class="icon-fallback-text" href="#"
                               target="_blank">
                                <span class="fa fa-youtube" aria-hidden="true"></span>
                            </a></li>
                    </ul>
                </div>

            </div>
            <div class="col-sm-3" style="font-family:monospace;">
                <div class="widget">
                    <h4 class="widget-title"
                        style="font-family:monospace;border-bottom: 1px solid gray; padding-bottom:5px">LIÊN HỆ</h4>
                    <div>
                        <ul style="color: gray; font-size: 16px">
                            <li><i class="fa fa-map-marker"></i> Address: Số 55, Ngõ 4B Phường Nguyễn Trãi, Hà Đông
                            </li>
                            <li style="padding-top: 5px; padding-bottom: 5px"><i class="fa fa-chevron-right"></i> Email:
                                suhouse@gmail.com
                            </li>
                            <li><i class="fa fa-chevron-right"></i> Phone: 0987654321</li>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-3" style="font-family:monospace;">
                <div class="widget">
                    <h4 class="widget-title"
                        style="font-family:monospace;border-bottom: 1px solid gray; padding-bottom:5px">DANH MỤC</h4>
                    <div>
                        <ul style="font-size:14px;font-weight:400;color:gray">
                            @foreach($catelist as $cate)
                                <li>
                                    <a style="font-size: 20px;"
                                       href="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}">+ {{$cate->cate_name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget">
                    <h4 class="widget-title"
                        style="font-family:monospace;border-bottom: 1px solid gray; padding-bottom:5px">FOLLOW US</h4>
                    <div id="fb-root"></div>
                    <script>(function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12';
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-page" data-href="https://www.facebook.com/suhousehadong/" data-tabs="timeline"
                         data-width="270" data-height="230" data-small-header="false" data-adapt-container-width="true"
                         data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/suhousehadong/" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/suhousehadong/">SU'S HOUSE</a></blockquote>
                    </div>
                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- #footer -->

<!-- include js files -->
<script src="assets/dest/js/jquery.js"></script>
<script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
<script src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
<script src="assets/dest/vendors/animo/Animo.js"></script>
<script src="assets/dest/vendors/dug/dug.js"></script>
<script src="assets/dest/js/scripts.min.js"></script>
<script src="assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="assets/dest/js/waypoints.min.js"></script>
<script src="assets/dest/js/wow.min.js"></script>
<script src="assets/dest/js/custom2.js"></script>
<script>
    $(document).ready(function ($) {
        $(window).scroll(function () {
                if ($(this).scrollTop() > 250) {
                    $(".header-bottom").addClass('fixNav')
                } else {
                    $(".header-bottom").removeClass('fixNav')
                }
            }
        )
    })
</script>
</body>
</html>
