@extends('frontend.master')
@section('title','Đặt hàng thành công')
@section('main')
    <div style="height: 280px;border: 1px solid #e6e6e6;margin-top: 100px;margin-bottom: 100px;" class="container">
        <p style="font-family:Arial;padding: 20px;margin-top:20px;font-weight: bold;font-size: 24px;color: #737373"
           class="text-center">
            ĐẶT HÀNG THÀNH CÔNG</p>
        <P style="font-family:Arial;color:#737373;padding: 20px;padding-top:0;font-weight: bold;font-size: 22px"
           class="text-center">Chúc
            mừng quý khách đã đặt hàng thành công!</P>
        <div style="font-family:Arial;color:#737373;font-weight: 500" class="text-center">
            <p>Mã đơn hàng của bạn là <i style="color: #00A8FF">{{$code}}</i></p>
            <p>(Vui lòng lưu lại mã số này để theo dõi đơn hàng)</p>
            <p>Nhân viên chăm sóc khách hàng sẽ liên hệ với bạn để xác nhận đơn hàng.</p>
            <p>Bạn có thể theo dõi đơn hàng bằng cách điền mã đơn hàng tại mục <a style="color: #E32124"
                                                                                  href="{{asset('ordersearch')}}">TRA
                    CỨU
                    ĐƠN HÀNG</a>. Xin chân thành cảm ơn!</p>
        </div>

        <div style="margin-top:40px;margin-left: 480px">
            <a href="{{asset('/')}}" class="text-center"
               style="font-family:Arial;background:#E32124;font-weight:bold;border:none;border-radius: 25px;padding: 15px;font-size: 16px;color: #fff">Tiếp
                tục mua hàng</a>
        </div>
    </div>
@stop