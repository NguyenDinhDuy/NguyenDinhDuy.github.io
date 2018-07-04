@extends('backend.master')
@section('title','Chỉnh sửa thông tin thành viên')
@section('main')
    <style>
        #updatePass {
            display: none;
        }
    </style>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chỉnh sửa thông tin</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-9 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="text-center">
                    <div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
                                @include('errors.note')
                                <div class="form-group">
                                    <span style="color:#28b779;margin-right: 500px">Email:</span>
                                    <input readonly style="margin-top:-25px;margin-left:130px;" class="form-control"
                                           required
                                           placeholder="E-mail" name="email" type="email" value="{{$data["email"]}}">
                                </div>
                                <div class="form-group">
                                    <span style="color:#ffb848;margin-right: 255px">Họ tên:</span>
                                    <input readonly style="margin-top:-25px;margin-left:130px;" class="form-control"
                                           required
                                           placeholder="Họ tên" name="name" value="{{$data["name"]}}">
                                </div>
                                <div class="form-group">
                                    <span style="color:#28b779;margin-right: 200px">Số điện thoại:</span>
                                    <input style="margin-top:-25px;margin-left:130px;" required class="form-control"
                                           placeholder="Số điện thoại" name="phone" type="number"
                                           value="{{$data["phone_number"]}}">
                                </div>
                                @if(Auth::guard('admin')->user()->id !=$data["id"])
                                    <div class="form-group">
                                        <span style="font-weight:bold;margin-right: 240px">Vai trò:</span>
                                        <input style="margin-top:-50px;margin-left:130px;" required name="level"
                                               type="radio" value="1"
                                               @if ($data["level"]==1)
                                               checked
                                                @endif>Admin
                                        <input style="margin-top:-50px;" required name="level"
                                               type="radio" value="2"
                                               @if ($data["level"]==2)
                                               checked
                                                @endif>Nhân viên
                                    </div>
                                @endif
                                <div>
                                    <div style="margin-right: 160px;margin-top: 20px;margin-bottom: 20px"><input
                                                type="checkbox" id="checkpass"> Thay đổi mật khẩu
                                    </div>
                                    <div style="border-bottom: 1px solid;margin-bottom: 20px" id="updatePass">
                                        <div class="form-group">
                                            <span style="color:#ffb848;margin-right: 400px">Password:</span>
                                            <input style="margin-top:-25px;margin-left:130px;" class="form-control"
                                                   placeholder="Password" name="password" type="password">
                                        </div>
                                        <div class="form-group">
                                            <span style="color:#28b779;margin-right: 215px"> New Password:</span>
                                            <input style="margin-top:-25px;margin-left:130px;" class="form-control"
                                                   placeholder="New Password" name="newpassword"
                                                   type="password">
                                        </div>
                                        <div class="form-group">
                                            <span style="color:#28b779;margin-right: 186px">Confirm New Pass:</span>
                                            <input style="margin-top:-25px;margin-left:130px;" class="form-control"
                                                   placeholder="Confirm New Password" name="renewpassword"
                                                   type="password">
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
                                <input style="margin-right:-130px;margin-top:-20px;background: #5bb75b;border: none;color: #fff;padding: 8px 30px"
                                       type="submit"
                                       name="submit" value="Xác nhận" class="pull-right">
                            </fieldset>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
    </div>
@stop