@extends('frontend.master')
@section('title','Tạo tài khoản khách hàng mới')
@section('main')
    <div style="height: 50px;background: #2b395c;"></div>
    <div style="margin-top: 60px;margin-left: 250px;width: 800px; border-bottom: 2px solid #666">
        <h2 style="font-weight: bolder">TẠO TÀI KHOẢN</h2>
        <p style="padding-top: 10px; font-family: Arial;font-size: 13px">Đăng nhập hoặc Đăng ký để chúng tôi có thể phục
            vụ bạn tốt hơn thông qua các chương
            trình chăm</p>
        <p style="padding-bottom: 10px;font-family: Arial;font-size: 13px">sóc khách hàng và các khuyến mại đặc biệt
            dành riêng cho khách hàng mua
            online.</p>
    </div>
    <div class="container" style="margin-left: 250px">
        <div id="content">
            <div class="row">
                <div class="col-sm-4" style="border-right: 1px solid #555;">
                    <p style="font-weight: bolder;font-size: 20px;margin-bottom: 30px; font-family: Arial">
                        HÃY ĐIỀN THÔNG TIN SAU:</p>
                    @if (session('warning'))
                        <span class="alert alert-warning help-block">
                            <strong>{{ session('warning') }}</strong>
                        </span>
                    @endif

                    <form method="post" class="beta-form-checkout" action="{{ route('register') }}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="width: 350px;">
                            <p style="padding: 5px 0;font-size: 13px;font-family: Arial">Họ & tên*</p>
                            <input style=" margin-bottom:30px;background: #f0f0f0;border: none;height: 30px" type="text"
                                   id="name" name="name" required value="{{old('name')}}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div>
                            <p style="padding: 5px 0;font-size: 13px;font-family: Arial">Địa chỉ Email*</p>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"
                                 style="width: 350px;">
                                <input style=" margin-bottom:30px;background: #f0f0f0;border: none;height: 30px"
                                       type="email" id="email" name="email" required value="{{old('email')}}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <p style="padding: 5px 0;font-size: 13px;font-family: Arial">Mật khẩu*</p>
                            <input style="width: 350px; margin-bottom:30px;background: #f0f0f0;border: none;height: 30px"
                                   type="password"
                                   id="pass" name="password"
                                   required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div>
                            <p style="padding: 5px 0;font-size: 13px;font-family: Arial">Xác nhận mật khẩu*</p>
                            <input style="width: 350px; margin-bottom:30px;background: #f0f0f0;border: none;height: 30px"
                                   type="password" id="password-confirm"
                                   name="password_confirmation"
                                   required>
                        </div>
                        <div class="form-block">
                            <button type="submit"
                                    style="background: #E32124;font-size: 16px;color:#fff;padding: 10px 30px;border: none;border-radius: 3px">
                                <i class="fa fa-external-link"></i> ĐĂNG KÍ >
                            </button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                <div class="col-sm-6" style="margin-left: 40px">
                    <p style="font-weight: bolder;font-size: 20px;margin-bottom: 50px;font-family: Arial">BẠN ĐÃ CÓ
                        TÀI KHOẢN?</p>
                    <a href="{{route('login')}}" style="padding: 10px 40px;background: #E32124;color: #fff;
                            font-size: 16px;font-family: Arial;border-radius: 3px;margin-left: 15px"><i
                                style="color: #fff" class="fa fa-sign-in"></i>ĐĂNG NHẬP</a>
                </div>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@stop