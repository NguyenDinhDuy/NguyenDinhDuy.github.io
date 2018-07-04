<!DOCTYPE html>
<html>
<head>
    <base href="{{asset('public/layout/backend')}}/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery.dataTables.css">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css" rel="stylesheet" type="text/css">--}}
    <script type="text/javascript" src="../../editor/ckeditor/ckeditor.js"></script>
    <script src="js/lumino.glyphs.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery.dataTables.js"></script>
    <style>
        body {
            font-family: monospace;
        }

        li {
            line-height: 32px;
        }

        a {
            font-size: 16px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <svg class="glyph stroked male-user">
                            <use xlink:href="#stroked-male-user"></use>
                        </svg>
                        {{Auth::guard('admin')->user()->name}}
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{route('admin.logout')}}">
                                <svg class="glyph stroked cancel">
                                    <use xlink:href="#stroked-cancel"></use>
                                </svg>
                                Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" style="background: #2e363f" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav">
        <li class="active" style="margin-top: 20px">
            <a href="{{route('admin.home')}}">
                <svg class="glyph stroked dashboard-dial">
                    <use xlink:href="#stroked-dashboard-dial"></use>
                </svg>
                Trang chủ</a></li>
        <li class="parent ">
            <a>
                <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-chevron-down">
                        </use>
                    </svg>
                </span> Thành viên
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li>
                    <a class="" href="{{asset('admin/list')}}">
                        <svg class="glyph stroked chevron-right">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-chevron-right">
                            </use>
                        </svg>
                        Quản trị
                    </a>
                </li>
                <li>
                    <a class="" href="{{asset('admin/user/list')}}">
                        <svg class="glyph stroked chevron-right">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-chevron-right"></use>
                        </svg>
                        Khách hàng
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{asset('admin/product')}}">
                <svg class="glyph stroked calendar">
                    <use xlink:href="#stroked-calendar"></use>
                </svg>
                Sản phẩm</a></li>
        <li>

            <a href="{{asset('admin/category')}}">
                <svg class="glyph stroked table">
                    <use xlink:href="#stroked-table"></use>
                </svg>
                Danh mục</a></li>
        <li>
            <a href="{{asset('admin/color')}}">
                <svg class="glyph stroked star">
                    <use xlink:href="#stroked-star"></use>
                </svg>
                Màu Sản Phẩm</a></li>
        <li>
            <a href="{{asset('admin/size')}}">
                <svg class="glyph stroked star">
                    <use xlink:href="#stroked-star"></use>
                </svg>
                Size Sản Phẩm</a></li>
        <li>
        <li>
            <a href="{{asset('admin/coupon')}}">
                <svg class="glyph stroked tag">
                    <use xlink:href="#stroked-tag"/>
                </svg>
                Mã giảm giá</a></li>
        <li>
            <a href="{{asset('admin/order')}}">
                <svg class="glyph stroked bag">
                    <use xlink:href="#stroked-bag"/>
                </svg>
                Hóa Đơn</a></li>

        <li class="parent ">
            <a>
                <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-chevron-down">
                        </use>
                    </svg>
                </span> Thống Kê
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li>
                    {{--<a>--}}
                    <a class="" href="{{asset('admin/thongke/order')}}">
                        <svg class="glyph stroked chevron-right">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-chevron-right">
                            </use>
                        </svg>
                        Đơn Hàng
                    </a>
                </li>
                <li>
                    <a class="" href="{{asset('admin/thongke/product')}}">
                        <svg class="glyph stroked chevron-right">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-chevron-right"></use>
                        </svg>
                        Sản Phẩm
                    </a>
                </li>
                <li>
                    <a class="" href="{{asset('admin/thongke/doanhthu')}}">
                        <svg class="glyph stroked chevron-right">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-chevron-right"></use>
                        </svg>
                        Doanh Thu
                    </a>
                </li>
            </ul>
        </li>
    </ul>

</div><!--/.sidebar-->

@yield('main')

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/myscript.js"></script>
<script src="js/myscript1.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>--}}

<script>

    $('#calendar').datepicker({});

    !function ($) {
        $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })

    function changeImg(input) {
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function (e) {
                //Thay đổi đường dẫn ảnh

                $(input).next().attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function () {

        $('.avatar').click(function () {

            $(this).prev().click();

        });
    });
    $(function () {
        $('.nav a').filter(function () {
            return this.href == location.href
        }).parent().addClass('active').siblings().removeClass('active')
        $('.nav a').click(function () {
            $(this).parent().addClass('active').siblings().removeClass('active')
        })
    })
</script>
</body>

</html>
