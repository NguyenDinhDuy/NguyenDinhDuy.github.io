@extends('frontend.master')
@section('title','Tạo tài khoản khách hàng mới')
@section('main')
    <div style="height: 50px;background: #2b395c;"></div>
    <div style="margin-top: 60px;margin-left: 250px;width: 800px; border-bottom: 2px solid #666">
        <h2 style="font-weight: bolder">MẬT KHẨU MỚI</h2>
        <p style="padding-top: 10px;padding-bottom: 10px;font-family: Arial;font-size: 13px">Thiết lập lại mật khẩu mới
            theo form bên dưới.</p>
    </div>
    <div class="container" style="margin-left: 250px">
        <div id="content">
            <div class="row">
                <form class="beta-form-checkout" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <p style="padding: 5px 0;font-size: 13px;font-family: Arial">Địa chỉ Email*</p>
                        <div style="width: 350px;">
                            <input style=" margin-bottom:10px;background: #f0f0f0;border: none;height: 30px"
                                   type="email" id="email" name="email" value="{{ $email or old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <p style="padding: 5px 0;font-size: 13px;font-family: Arial">Mật khẩu mới*</p>
                        <div style="width: 350px;">
                            <input style="width: 350px; margin-bottom:10px;background: #f0f0f0;border: none;height: 30px"
                                   id="password" type="password" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <p style="padding: 5px 0;font-size: 13px;font-family: Arial">Xác nhận mật khẩu mới*</p>
                        <div style="width: 350px;">
                            <input style="width: 350px; margin-bottom:10px;background: #f0f0f0;border: none;height: 30px"
                                   id="password-confirm" type="password"
                                   name="password_confirmation" required>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-block">
                        <button type="submit"
                                style="background: #E32124;font-size: 16px;color:#fff;padding: 10px 30px;border: none;border-radius: 3px">
                            <i class="fa fa-external-link"></i> XÁC NHẬN
                        </button>
                    </div>
                </form>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->

@stop