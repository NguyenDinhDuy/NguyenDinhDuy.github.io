@extends('frontend.master')
@section('title','Tra cứu đơn hàng')

@section('main')
    <div style="margin-top: 100px;margin-bottom: 50px" class="container text-center">
        <p style="font-weight: bold;font-size: 28px;margin-bottom: 30px">TRA CỨU ĐƠN HÀNG</p>
        <i style="font-size: 16px;margin-top: 30px">Hãy nhập<strong> Mã đơn hàng</strong> để tra cứu tình trạng đơn hàng
            của bạn nhé</i>
        <div>

            <form role="search" method="get" id="searchform" action="{{ asset('ordersearch') }}">
                <input type="number" width="300px" height="100px"
                       style="margin-top: 30px;width: 580px;height: 50px;font-size: 16px;margin-left: -200px;padding-left: 10px;"
                       name="code"
                       placeholder="Nhập mã đơn hàng để kiểm tra">

                <button type="submit"
                        style="margin-top:5px;;font-weight:bold;color: #fff;background: #F37021;height: 50px;margin-left: -200px;width: 580px;border: none;font-size: 16px;">
                    Kiểm tra
                </button>
            </form>
        </div>
    </div>
    @if($status=4)
    abc
    @elseif($status=0)
       def

    @endif

    {{--<table class="text-center" style="margin-left:240px;border: 1px solid #666">--}}
        {{--<thead>--}}
        {{--<th style="padding:15px 40px;background: #eee;border: 1px solid #666">Mã đơn hàng</th>--}}
        {{--<th style="padding:15px 40px;background: #eee;border: 1px solid #666">Tên khách hàng</th>--}}
        {{--<th style="padding:15px 40px;background: #eee;border: 1px solid #666">Tổng tiền thanh toán</th>--}}
        {{--<th style="padding:15px 40px;background: #eee;border: 1px solid #666">Trạng thái</th>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--@if($status=4)--}}
            {{--<tr>--}}
                {{--<td style="padding: 5px 10px">Không tìm thấy đơn hàng yêu cầu</td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
            {{--</tr>--}}
        {{--@elseif($status=0)--}}
            {{--<p>chưa vận chuyển</p>--}}
            {{--<tr>--}}
                {{--<td class="text-center" style="border: 1px solid #666">dsdf</td>--}}
                {{--<td class="text-center" style="border: 1px solid #666">fsdfsd</td>--}}
                {{--<td class="text-center" style="border: 1px solid #666">fsdf</td>--}}
                {{--<td class="text-center" style="border: 1px solid #666">fsdfd</td>--}}
            {{--</tr>--}}
        {{--@endif--}}
        {{--</tbody>--}}
    {{--</table>--}}

    <div style="margin-left: 200px;margin-bottom: 100px">
        <div style="margin-top: 50px;"><span><i style="color: orangered;" class="fa fa-lightbulb-o"></i></span> Chú
            thích trạng thái đơn hàng:
        </div>
        <div style=" padding-top:5px;font-weight: bold;font-size: 12px"><span
                    style="color: orangered">- Chưa xác nhận:</span> SuHouse chưa xác nhận đơn hàng của bạn.
        </div>
        <div style=" padding-top: 5px;font-weight: bold;font-size: 12px"><span style="color: orangered">- Đang vận chuyển:</span>
            SuHouse đã xác nhận và đơn hàng của bạn đang
            trong quá trình vận chuyển
        </div>
        <div style=" padding-top: 5px;font-weight: bold;font-size: 12px"><span style="color: orangered">- Giao hàng thành công:</span>
            SuHouse đã giao hàng thành công cho
            bạn
        </div>
        <div style=" padding-top: 5px;font-weight: bold;font-size: 12px"><span style="color: orangered">- Giao hàng thất bại:</span>
            Việc giao hàng đã bị thất bại do không
            liên lạc được hoặc do một lí do khác
        </div>
    </div>
@stop
