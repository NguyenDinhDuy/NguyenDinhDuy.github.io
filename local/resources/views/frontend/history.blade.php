@extends('frontend.master')
@section('title','Trang Chủ')
@section('main')
    <div style="height: 50px;background: #2b395c;"></div>
    <div style="padding-bottom:25px;margin-top: 60px;margin-left: 275px;width: 805px; border-bottom: 2px solid #666">
        <h2 class="text-center" style="font-weight: bolder">LỊCH SỬ GIAO DỊCH</h2>
    </div>
    <div class="container" style="padding-left: 210px;padding-right: 210px">
        <div id="content" class="row">
            <div class="beta-products-list">
                <div class="row">
                    <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                        <thead>
                        <tr>
                            <th style=";border:1px solid #ccc;font-family: monospace;color: #666">Mã đơn hàng</th>
                            <th style=";border:1px solid #ccc;font-family: monospace;color: #666">Ngày đặt</th>
                            <th style=";border:1px solid #ccc;font-family: monospace;color: #666">Trạng thái</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($histories as $history)
                                @foreach($orders as $order)
                                    @if($history->order_id==$order->id)
                                        <tr class="cart_item">
                                            <td style="font-weight: bold;border: 1px solid #ccc"><a
                                                        href="{{asset('detailorder/'.$order->id)}}">{{$order->bill_code}}</a>
                                            </td>
                                            <td style="font-weight: bold;border: 1px solid #ccc">{{$order->created_at}}</td>
                                            @if($order->status==0)
                                                <td style="font-weight:bold;color:blue;border: 1px solid #ccc">
                                                    Chưa kiểm tra
                                                </td>
                                            @elseif($order->status==1)
                                                <td style="font-weight:bold;color: orange;border: 1px solid #ccc">
                                                    Đang vận chuyển
                                                </td>
                                            @elseif($order->status==2)
                                                <td style="font-weight:bold;color: green;border: 1px solid #ccc">
                                                    Giao hàng thành công
                                                </td>
                                            @elseif($order->status==3)
                                                <td style="font-weight:bold;color: red;border: 1px solid #ccc">
                                                    Giao hàng thất bại
                                                </td>
                                            @endif

                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- .beta-products-list -->
        </div>
    </div>
@stop
