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

<p class="text-center" style="font-size: 36px;margin-bottom: -60px;margin-top: 100px;">QUÊN MẬT
    KHẨU</p>
<p style="margin-bottom: -60px;margin-top: 70px;margin-left: 500px">Bạn vui lòng nhập địa chỉ email. Bạn sẽ nhận được
    một liên kết để thiết lập lại mật khẩu của bạn.</p>
<div class="text-center" style="height:1px;border: 1px solid;width: 700px;margin-top: 80px;margin-left: 450px;margin-bottom: 30px"></div>
<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-9 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="text-center">
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @include('errors.note')
                <form role="form" method="post" action="{{route('admin.password.email')}}">
                    <fieldset>
                        <span style="color:#ffb848;margin-right: 200px">Email:</span>
                        <input style="margin-top:-25px;margin-left:130px;" class="form-control" required
                               placeholder="E-mail" name="email" type="email" value="{{old('email')}} ">
                        <div style="margin-left: 670px;margin-top: -35px">
                            <input style="background: #5bb75b;border: none;color: #fff;padding: 8px 30px"
                               type="submit"
                               name="submit" value="Xác nhận" class="pull-right">
                        </div>
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
