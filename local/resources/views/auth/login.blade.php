@extends('frontend.master')
@section('title','Tạo tài khoản khách hàng mới')
@section('main')
    <div style="height: 50px;background: #2b395c;"></div>
    <div style="margin-top: 60px;margin-left: 250px;width: 800px; border-bottom: 2px solid #666">
        <h2 style="font-weight: bolder">ĐĂNG NHẬP</h2>
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
                @if (session('warning'))
                    <span class="alert alert-warning help-block">
                            <strong>{{ session('warning') }}</strong>
                        </span>
                @endif
                <form method="post" class="beta-form-checkout" action="{{ route('login') }}">

                    <div class="col-sm-4" style="border-right: 1px solid #ccc;">
                        <p style="font-weight: bolder;font-size: 20px;margin-bottom: 30px; font-family: Arial">
                            ĐĂNG NHẬP BẰNG TÀI KHOẢN:</p>
                        {{--@include('errors.note')--}}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <p style="padding: 5px 0;font-size: 13px;font-family: Arial">Địa chỉ Email</p>
                            <div style="width: 350px;"><input
                                        style=" margin-bottom:30px;background: #f0f0f0;border: none;height: 30px"
                                        name="email"
                                        type="email" id="email" required value="{{old('email')}}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color: #E32124">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <p style="padding: 5px 0;font-size: 13px;font-family: Arial">Mật khẩu</p>
                            <input style="width: 350px;margin-bottom:30px;background: #f0f0f0;border: none;height: 30px"
                                   type="password"
                                   id="password" name="password"
                                   required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                            <strong style="color: #E32124">{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div>
                            <div class="checkbox">
                                <label>
                                    <input type="radio"
                                           name="remember" {{ old('remember') ? 'checked' : '' }}> Nhớ mật khẩu
                                </label>
                            </div>

                            <button class="pull-left" type="submit"
                                    style=";background: #E32124;font-size: 16px;color:#fff;padding: 10px 40px;border: none;border-radius: 3px">
                                <i class="fa fa-sign-in"></i> ĐĂNG NHẬP
                            </button>

                            {{--<a >Quên mật khẩu?</a>--}}
                            <a class="pull-right" style="margin-top: 20px; font-weight: bold"
                               href="{{ route('password.request') }}">
                                Quên mật khẩu?
                            </a>

                        </div>
                    </div>
                    {{csrf_field()}}
                </form>
                <div class="col-sm-6" style="margin-left: 80px">
                    <p style="font-weight: bolder;font-size: 20px;margin-bottom: 50px;font-family: Arial">KHÁCH HÀNG
                        MỚI?</p>
                    <a href="{{route('register')}}" style="padding: 10px 60px;background: #E32124;color: #fff;
                            font-size: 16px;font-family: Arial;border-radius: 3px"><i style="color: #fff;"
                                                                                      class="fa fa-external-link"></i>
                        ĐĂNG KÍ</a>
                </div>

            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->

@stop

