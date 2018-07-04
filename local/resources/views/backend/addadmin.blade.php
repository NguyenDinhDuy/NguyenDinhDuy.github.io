@extends('backend.master')
@section('title','Chỉnh sửa thông tin thành viên')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chỉnh sửa thông tin</h1>
            </div>
        </div><!--/.row-->
        @include('errors.note')
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-9 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="text-center">
                    <div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <span style="color:#28b779;margin-right: 500px">Email:</span>
                                    <input style="margin-top:-25px;margin-left:130px;" class="form-control"
                                           required
                                           placeholder="E-mail" name="email" type="email" value="{{old('email')}}">
                                </div>
                                <div class="form-group">
                                    <span style="color:#ffb848;margin-right: 260px">Họ tên:</span>
                                    <input style="margin-top:-25px;margin-left:130px;" class="form-control"
                                           required
                                           placeholder="Họ tên" name="name" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <span style="color:#28b779;margin-right: 210px">Số điện thoại:</span>
                                    <input style="margin-top:-25px;margin-left:130px;" required class="form-control"
                                           placeholder="Số điện thoại" name="phone" type="number"
                                           value="{{old('phone')}}">
                                </div>


                                <div class="form-group">
                                    <span style="color:#ffb848;margin-right: 400px">Password:</span>
                                    <input style="margin-top:-25px;margin-left:130px;" class="form-control"
                                           placeholder="Password" name="password" type="password">
                                </div>
                                <div class="form-group">
                                    <span style="color:#28b779;margin-right: 186px">Confirm Password:</span>
                                    <input required style="margin-top:-25px;margin-left:130px;" class="form-control"
                                           placeholder="Confirm New Password" name="repassword"
                                           type="password">
                                </div>
                                <input required style="margin-right:-130px;background: #5bb75b;border: none;color: #fff;padding: 8px 30px"
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