{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Reset Password</div>--}}

                {{--<div class="panel-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--<form class="form-horizontal" method="POST" action="{{ route('password.email') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Send Password Reset Link--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}


@extends('frontend.master')
@section('title','Tạo tài khoản khách hàng mới')
@section('main')
    <div style="height: 50px;background: #2b395c;"></div>
    <div style="margin-top: 60px;margin-left: 250px;width: 800px; border-bottom: 2px solid #666">
        <h2 style="font-weight: bolder">QUÊN MẬT KHẨU?</h2>
        <p style="padding-top: 10px;padding-bottom: 10px;font-family: Arial;font-size: 13px">Bạn vui lòng nhập địa chỉ
            email. Bạn sẽ nhận được một liên kết để thiết lập lại mật khẩu của bạn.</p>
    </div>
    <div class="container" style="margin-left: 250px">
        <div id="content">
            <div class="row">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('password.email') }}" method="post" class="beta-form-checkout">
                    <div>
                        <p style="padding: 5px 0;font-size: 13px;font-family: Arial">Địa chỉ Email*</p>
                        <div style="width: 350px;">
                            <input style=" margin-bottom:10px;background: #f0f0f0;border: none;height: 30px"
                                   type="email" id="email" name="email" value="{{ old('email') }}" required></div>
                    </div>
                    <div class="form-block">
                        <button type="submit"
                                style="background: #E32124;font-size: 16px;color:#fff;padding: 10px 30px;border: none;border-radius: 3px">
                            <i class="fa fa-external-link"></i> XÁC NHẬN </button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->

@stop