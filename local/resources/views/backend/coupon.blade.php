@extends('backend.master')
@section('title','Danh sách mã giảm giá')
@section('main')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách các mã giảm giá</h1>
            </div>
        </div><!--/.row-->
        @include('errors.message')
        <div class="row">
            <div class="col-xs-12 col-md-5 col-lg-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Thêm mã giảm giá
                    </div>
                    <div class="panel-body">
                        @include('errors.note')
                        <form method="post">
                            <div class="form-group">
                                <label>Mã giảm giá:</label>
                                <input required type="text" name="code" class="form-control"
                                       placeholder="Mã code giảm giá...">
                            </div>
                            <select style="margin: 10px;padding: 5px" required name="type">
                                <option value="0">Loại giảm giá</option>
                                <option value="fixed">Fixed</option>
                                <option value="percent">Percent</option>
                            </select>
                            <div class="form-group">
                                <label>Giá trị của mã giảm giá:</label>
                                <input required type="number" name="value" class="form-control"
                                       placeholder="Giá trị của mã giảm giá...">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="form-control btn btn-primary"
                                       value="Thêm mới">
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-7 col-lg-7">
                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách mã giảm giá</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <table class="table table-bordered">
                                <thead>
                                <tr class="bg-primary">
                                    <th>Mã code</th>
                                    <th>Thể loại</th>
                                    <th>Giá trị</th>
                                    <th style="width:30%">Tùy chọn</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coupons as $coupon)
                                    <tr>
                                        <td>{{$coupon->code}}</td>
                                        <td @if($coupon->type=='fixed')style="font-weight:bold;color: orange"
                                            @else style="font-weight:bold;color: lightseagreen" @endif>
                                            {{$coupon->type}}</td>

                                        <td @if($coupon->type=='fixed')
                                            style="font-weight:bold;color: orange"
                                            @else
                                            style="font-weight:bold;color: lightseagreen"
                                                @endif>
                                            @if($coupon->type=='fixed')
                                                {{presentPrice($coupon->value)}} đ
                                            @else
                                                {{$coupon->percent_off}} %
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{asset('admin/coupon/delete/'.$coupon->id)}}"
                                               onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục náy?')"
                                               class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                                                Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>    <!--/.main-->
@stop