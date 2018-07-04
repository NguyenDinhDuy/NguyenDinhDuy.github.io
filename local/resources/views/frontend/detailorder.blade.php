@extends('frontend.master')
@section('title','Sửa sản phẩm')
<style>
    #tab td{
        border: 1px solid #ccc;

    }
</style>
@section('main')
    <div class="container" style="padding-left: 210px;padding-right: 210px">
        <div id="content" class="row">
            <div class="beta-products-list">
                <div class="row">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>Chi tiết đơn
                            hàng: {{$order->bill_code}}</h5>
                    </div>
                    <table id="tab" class="shop_table beta-shopping-cart-table" cellspacing="0">
                        <thead class="thead-inverse">
                        <tr>
                            <th style="background: #ccc;font-size: 12px;font-weight: bold">Hình ảnh</th>
                            <th style="background: #ccc;font-size: 12px;font-weight: bold">Thông tin</th>
                            <th style="background: #ccc;font-size: 12px;font-weight: bold">Số lượng</th>
                            <th width="6%" style="background: #ccc;font-size: 12px;font-weight: bold">Giá</th>
                            <th style="background: #ccc;font-size: 12px;font-weight: bold">Thành tiền</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($order->products as $product)
                            @php $options =  unserialize($product->pivot->options); @endphp
                            <tr>

                                <td><img
                                         src="{{ asset("/local/storage/app/avatar/".$options['img'])}}">
                                </td>
                                <td>
                                    <p class="name"><b>{{ $product->prod_name }}</b></p>


                                    @if(isset($options['color']))
                                        <p>Màu:
                                            @foreach($colorlist as $color)
                                                @if( $options['color'] ==$color->color_id)
                                                    {{$color->value}}
                                                @endif
                                            @endforeach

                                        </p>
                                    @endif
                                    @if(isset($options['size']))
                                        <p>Size:
                                            @foreach($sizelist as $size)
                                                @if( $options['size'] ==$size->size_id)
                                                    {{$size->value}}
                                                @endif
                                            @endforeach
                                        </p>
                                    @endif

                                </td>
                                <td><span>{{ $product->pivot->qty }}</span></td>
                                <td>
                                    <p>{{ presentPrice($product->pivot->price) }} đ</p>
                                </td>
                                <td>
                                    <p>{{ presentPrice($product->pivot->price * $product->pivot->qty) }}
                                        đ</p>
                                </td>

                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="1">Địa chỉ</td>
                            <td colspan="4">{{$order->address}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Phí vận chuyển:</td>
                            <td colspan="3">{{ presentPrice($order->ship_price) }} đ</td>
                        </tr>
                        <tr>
                            <td colspan="2">Mã giảm giá</td>
                            <td colspan="3">{{$order->bill_discount_code}}
                                - {{ presentPrice($order->bill_discount) }}
                                đ</td>
                        </tr>
                        <tr>
                            <td colspan="2">Tổng cộng:</td>
                            <td colspan="3">{{presentPrice($order->total) }} đ</td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@stop