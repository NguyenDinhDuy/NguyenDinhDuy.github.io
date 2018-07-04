<!DOCTYPE html>
<html>
<head>
    <base href="{{asset('public/layout/backend')}}/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập quản trị viên</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

</head>

<body style="background: #2E363F">
<div class="pull-right" style="margin-right: 100px">
    {{--<a href="{{asset('admin/register')}}" style="background: #28b779;color: #fff;padding: 10px">Đăng kí</a>--}}
    {{--<a href="{{asset('admin/login')}}" style="background: #ffb848;color: #fff;padding: 10px">Đăng nhập</a>--}}
</div>
<p class="text-center" style="font-size: 36px;margin-left: 0px;margin-bottom: -300px;margin-top: 120px">ĐĂNG NHẬP</p>
<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="text-center">
            <div style="margin-top: 200px" class="panel-body">
                <form role="form" method="post" action="{{route('admin.login.submit')}}">
                    <fieldset>
                        @include('errors.note')
                        <div class="form-group">
                            <img style="height:42px;margin-right: 500px;"
                                 src="{{asset('public/layout/backend/img/5.png')}}">
                            <input style="margin-top:-40px;margin-left:45px;width: 346px;height: 39px;border-radius: 0"
                                   class="form-control" placeholder="E-mail" name="email" type="email" id="email" required value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <img style="height:40px;margin-right: 500px;"
                                 src="{{asset('public/layout/backend/img/6.png')}}">
                            <input style="margin-top:-40px;margin-left:52px;width: 340px;height: 40px;border-radius: 0"
                                   class="form-control" placeholder="Password" type="password" id="password" name="password"
                                   required>
                        </div>


                        <div style="border-bottom: 1px solid;padding-bottom: 20px" class="checkbox">
                            <label>
                                <div><input style="left: 30px;margin-top: 30px" name="remember" type="checkbox"
                                            name="remember" {{ old('remember') ? 'checked' : '' }}></div>
                                <p style="margin-top: 28px;margin-right: 270px">Nhớ tài khoản</p>
                                <p style="margin-top:-28px;margin-right: -250px"><a href="{{ route('admin.password.request') }}">Quên
                                        mật khẩu?</a></p>
                            </label>
                        </div>
                        {{--<a href="index.blade.php" class="btn btn-primary">Login</a>--}}
                        <input style="background: #5bb75b;border: none;color: #fff;padding: 6px 15px" type="submit"
                               name="submit" value="Đăng nhập" class="pull-right">
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
