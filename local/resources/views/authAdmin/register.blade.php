<!DOCTYPE html>
<html>
<head>
    <base href="{{asset('public/layout/backend')}}/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng kí tài khoản thành viên</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background: #2E363F">
<div class="pull-right" style="margin-right: 100px">
    {{--<a href="{{asset('admin/register')}}" style="background: #28b779;color: #fff;padding: 10px">Đăng kí</a>--}}
    {{--<a href="{{asset('admin/login')}}" style="background: #ffb848;color: #fff;padding: 10px">Đăng nhập</a>--}}
</div>
<p class="text-center" style="font-size: 36px;margin-bottom: -60px;margin-top: 100px;margin-left: 240px">ĐĂNG KÍ THÀNH VIÊN</p>
<div style="margin-top: 100px" class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-9 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="text-center">
            <div class="panel-body">
                <form role="form" method="post">
                    <fieldset>
                        @include('errors.note')
                        <div class="form-group">
                            <span style="color:#28b779;margin-right: 500px">Email:</span>
                            <input style="margin-top:-25px;margin-left:130px;" class="form-control" required placeholder="E-mail" name="email" type="email">
                        </div>
                        <div class="form-group">
                            <span style="color:#ffb848;margin-right: 360px">Họ tên:</span>
                            <input style="margin-top:-25px;margin-left:130px;" class="form-control" required placeholder="Họ tên" name="name">
                        </div>
                        <div class="form-group">
                            <span style="color:#28b779;margin-right: 319px">Số điện thoại:</span>
                            <input style="margin-top:-25px;margin-left:130px;" required class="form-control" placeholder="Số điện thoại" name="phone" type="number">
                        </div>
                        <div class="form-group">
                            <span style="color:#ffb848;margin-right: 400px">Password:</span>
                            <input style="margin-top:-25px;margin-left:130px;" class="form-control" required placeholder="Password" name="password" type="password">
                        </div>
                        <div  style=" padding-bottom:50px;border-bottom: 1px solid;" class="form-group">
                            <span style="color:#28b779;margin-right: 285px">Confirm Password:</span>
                            <input style="margin-top:-25px;margin-left:130px;" class="form-control" required placeholder="Confirm Password" name="repassword" type="password">
                        </div>
                        <input style="margin-right:-130px;margin-top:-35px;background: #5bb75b;border: none;color: #fff;padding: 8px 30px" type="submit"
                               name="submit" value="Đăng kí" class="pull-right">
                    </fieldset>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script>
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
</script>
</body>

</html>
