@extends('backend.master')
@section('title','Màu sắc sản phẩm')
@section('main')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

        <div class="row" style="margin-top: 20px">
            <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Thống kê trạng thái đơn hàng
                    </div>
                    <div style="padding-top: 36px" class="panel-body">

                        <div class="col-xs-12 col-md-5 col-lg-5">
                            <p style="width: 300px; padding-top: 22px;font-weight: bold;padding-left: 5px;background: #eee">
                                Tổng số đơn hàng</p>
                            <p style="width: 300px; padding-top: 22px;background: blue;color: #eee;padding-left: 5px">Số
                                đơn hàng chưa kiểm tra</p>
                            <p style="width: 300px; padding-top: 22px;background: orange;color: #eee;padding-left: 5px">
                                Số đơn hàng đang vận chuyển</p>
                            <p style="width: 300px; padding-top: 22px;background: green;color: #eee;padding-left: 5px">
                                Số đơn hàng đã giao thành công</p>
                            <p style="width: 300px; padding-top: 22px;background: red;color: #eee;padding-left: 5px">Số
                                đơn giao hàng thất bại</p>
                        </div>
                        <div style="margin-left: 100px" class="col-xs-12 col-md-1 col-lg-1">
                            <p class="text-center"
                               style="padding-top:20px;color: black;border: 1px solid #0c0c0c;background: #eee;width: 30px">{{$status}}</p>
                            <p class="text-center"
                               style="padding-top:20px;color: black;border: 1px solid #0c0c0c;background: #eee;width: 30px ">{{$status0}}</p>
                            <p class="text-center"
                               style="padding-top:20px;color: black;border: 1px solid #0c0c0c;background: #eee;width: 30px">{{$status1}}</p>
                            <p class="text-center"
                               style="padding-top:20px;color: black;border: 1px solid #0c0c0c;background: #eee;width: 30px ">{{$status2}}</p>
                            <p class="text-center"
                               style="padding-top:20px;color: black;border: 1px solid #0c0c0c;background: #eee;width: 30px">{{$status3}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Top 5 đơn hàng giá trị lớn nhất
                    </div>

                    <div class="panel-body">
                        <table id="prodlist" class="table table-hover table-bordered" style="margin-top:20px;">
                            <thead>
                            <tr class="bg-primary">
                                <th width="6%">Mã đơn hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Tổng tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($prices as $price)
                                <tr>
                                    <td>#{{$price->bill_code}}</td>
                                    <td>{{$price->bill_name}}</td>
                                    <td>{{presentPrice($price->total)}} đ</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md=12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Top 5 khách hàng trong hệ thống mua nhiều nhất
                    </div>

                    <div class="panel-body">
                        <table id="prodlist" class="table table-hover table-bordered" style="margin-top:20px;">
                            <thead>
                            <tr class="bg-primary">
                                <th width="25%">Tên khách hàng</th>
                                <th>Email</th>
                                <th>Số đơn hàng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($orderusers)>0)
                                @foreach($users as $user)
                                    @foreach($orderusers as $orderuser)
                                        @if($user->id==$orderuser->id)
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$orderuser->order_count}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            @else
                                <td colspan="3" style="color: brown;font-weight: bold">Không tìm thấy kết quả phú
                                    hợp
                                </td>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    </div>    <!--/.main-->
@stop