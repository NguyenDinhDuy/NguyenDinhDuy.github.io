@extends('backend.master')
@section('title','Danh sách đơn hàng')
<style>
    body {
        font-size: 8px;
    }

</style>
@section('main')
    <div style="margin-top: 20px"></div>
    @include('errors.message')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách đơn hàng</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">

                                <span style="font-family:Arial;color: #666">Sắp xếp theo: </span>
                                <select onchange="location = this.value;"
                                        style="border-color: #737373; border-radius:4px;width: 120px;height:25px;font-weight: bold;color: #666">
                                    <option style="font-family:Arial;font-weight:bold;color: #666">Mặc định</option>

                                    @for($i=0;$i<=3;$i++)
                                        <option
                                                value="{{asset('admin/order/status/'.$i)}}"
                                                style="font-family: Arial;color: #666;margin: 4px">
                                            @if($i==0)
                                                Chưa kiểm tra
                                            @elseif($i==1)
                                                Đang vận chuyển
                                            @elseif($i==2)
                                                Giao hàng thành công
                                            @else
                                                Giao hàng thất bại
                                            @endif
                                        </option>
                                    @endfor
                                </select>

                                <div class="pull-right" style="margin-bottom: 10px">
                                    <form role="search" method="get" id="searchform" action="{{ route('searchorder') }}">
                                        <input type="text" value="" name="search" id="s" placeholder="Nhập từ khóa..."/>
                                        <button  type="submit" id="searchsubmit">Search
                                        </button>
                                    </form>
                                </div>

                                <table id="prodlist" class="table table-hover table-bordered" style="margin-top:20px;">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th width="6%">Mã đơn hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày đặt hàng</th>
                                        <th width="12%">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr class="@switch($order->status) @case(1) {{ 'bg-warning' }}  @break @case(2) {{ 'bg-success' }}  @break @case(3) {{ 'bg-danger' }} @default {{ 'bg-info' }} @endswitch">
                                            <td>#{{$order->bill_code}}</td>
                                            <td>{{$order->bill_name}}</td>
                                            <td>{{$order->bill_email}}</td>
                                            <td>{{$order->bill_phone}}</td>
                                            <td>{{$order->address}}</td>
                                            <td>{{$order->created_at}}</td>
                                            <td style="padding-top: 15px">
                                                <a href="{{asset('admin/order/edit/'.$order->id)}}"
                                                   style="background: brown;color: #fff;padding: 7px 12px;
                                                   border-radius: 5px">
                                                    <i class="fa fa-pencil"></i> Sửa</a>
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')"
                                                   href="{{asset('admin/order/delete/'.$order->id)}}"
                                                   style="background: brown;color: #fff;padding: 7px 12px;
                                                   border-radius: 5px">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $orders->links() }}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>    <!--/.main-->
@stop
