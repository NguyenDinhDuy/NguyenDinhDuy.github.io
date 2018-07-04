@extends('frontend.master')
@section('title','Tạo tài khoản khách hàng mới')
@section('main')
    <style>
        #updatePass {
            display: none;
        }
    </style>
    <div style="height: 50px;background: #2b395c;"></div>
    <div style="margin-top: 60px;margin-left: 250px;width: 800px; border-bottom: 2px solid #666">
        <h2 style="font-weight: bolder">CHỈNH SỬA THÔNG TIN TÀI KHOẢN </h2>
        <p style="padding-top: 10px;padding-bottom: 10px;font-family: Arial;font-size: 13px">Chỉnh sửa thông tin chi
            tiết sẽ giúp bạn tiết kiệm rất nhiều thời gian trong quá trình mua hàng, hoàn thành thanh toán.</p>
    </div>
    <div class="container" style="margin-left: 250px">
        <div id="content">
            <div class="row">
                @include('errors.note')
                <form action="{{route('edit')}}" method="post" class="beta-form-checkout">
                    <div>
                        <p style="padding: 5px 0;font-size: 13px;font-family: Arial">Họ tên*</p>
                        <div style="width: 350px;">
                            <input style=" margin-bottom:10px;background: #f0f0f0;border: none;height: 30px" readonly
                                   type="text" id="name" name="name" required value="{{$user->name}}"></div>
                    </div>
                    <div>
                        <p style="padding: 5px 0;font-size: 13px;font-family: Arial">Địa chỉ Email*</p>
                        <div style="width: 350px;">
                            <input readonly style=" margin-bottom:10px;background: #f0f0f0;border: none;height: 30px"
                                   type="email" id="email" name="email" value="{{$user->email}}" required></div>
                    </div>
                    <div>
                        <div style="margin-bottom: 20px"><input
                                    type="radio" id="checkpass"> Thay đổi mật khẩu
                        </div>
                        <div style="margin-bottom: 20px" id="updatePass">
                            <div>
                                <p style="padding: 5px 0;font-size: 13px;font-family: Arial">Mật khẩu*</p>
                                <div style="width: 350px;">
                                    <input style="width:350px; margin-bottom:10px;background: #f0f0f0;border: none;height: 30px"
                                           type="password" id="password" name="password"></div>
                            </div>
                            <div>
                                <p style="padding: 5px 0;font-size: 13px;font-family: Arial">Mật khẩu mới*</p>
                                <div style="width: 350px;">
                                    <input style=" width:350px;margin-bottom:10px;background: #f0f0f0;border: none;height: 30px"
                                           type="password" id="newpass" name="newpassword"></div>
                            </div>
                            <div>
                                <p style="padding: 5px 0;font-size: 13px;font-family: Arial">Xác nhận mật khẩu mới*</p>
                                <div style="width: 350px;">
                                    <input style="width:350px; margin-bottom:10px;background: #f0f0f0;border: none;height: 30px"
                                           type="password" id="newpassword-confirm"
                                           name="newpassword_confirmation"></div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function () {
                                $('#checkpass').change(function () {
                                    if (this.checked)
                                        $('#updatePass').fadeIn('slow');
                                    else
                                        $('#updatePass').fadeOut('slow');

                                });
                            });
                        </script>
                    </div>
                    <div class="form-block">
                        <button type="submit"
                                style="background: #E32124;font-size: 16px;color:#fff;padding: 10px 30px;border: none;border-radius: 3px">
                            <i class="fa fa-external-link"></i> XÁC NHẬN
                        </button>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->

@stop