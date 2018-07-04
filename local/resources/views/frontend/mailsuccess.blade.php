<html>
<head>
    <style>
        body {
            font-weight: bold;
        }
    </style>
<body>
<div style="border: 1px solid #ccc;background: #eee;margin: 50px 15px;padding: 10px 20px" class="container">
    <div>
        <p>Thân gửi bạn: <span style="color: #E32124;font-weight: bold">{{$order->bill_name}}</span></p>
        <p>Mã sô đơn hàng của bạn: <span style="color: #E32124;font-weight: bold"># {{$order->bill_code}}</span></p>
        <p>Thời gian đặt hàng: <span style="color: #E32124;font-weight: bold">{{ $order->created_at }}</span></p>
        <p>Cảm ơn bạn đã mua sắm tại website SUHOUSE</p>
        <p>Vui lòng theo dõi email để cập nhật tình trạng đơn hàng</p>
    </div>
    <div>
        <div>
            <p style="color: #fff;background:#E32124;padding: 5px;width: 200px" class="text-center">Thông tin khách
                hàng</p>
            <div style="border:1px solid #555;background-color: #fff;padding: 5px 20px">
                <p>Tên:
                    {{$order->bill_name}}
                </p>
                <p>
                    Số điện thoại:
                    {{$order->bill_phone}}
                </p>
                <p>
                    Địa chỉ:
                    {{$order->address}}
                </p>
                <p>
                    Hình thức thanh toán:
                    {{$order->bill_payment }}
                </p>
            </div>

        </div>
        <div style="margin-top: 10px">
            <p style=";color: #fff;background:#E32124;padding: 5px;width: 200px" class="text-center">Thông tin đơn
                hàng</p>
            <table style="border: 1px solid #555;padding:10px 20px;background: #fff" class="table table-bordered">
                <thead class="thead-inverse">
                <tr>
                    {{--<th style="background: #ccc;font-size: 12px;font-weight: bold">Hình ảnh</th>--}}
                    <th style="background:#efefef;border: 1px solid #555">Thông tin</th>
                    <th style="background:#efefef;border: 1px solid #555">Số lượng</th>
                    <th width="10%" style="background:#efefef;border: 1px solid #555">Giá</th>
                    <th width="10%" style="background:#efefef;border: 1px solid #555"> Thành tiền</th>
                </tr>
                </thead>

                <tbody>
                @foreach($order->products as $product)
                    @php $options =  unserialize($product->pivot->options);@endphp
                    <tr>
                        {{--<td>--}}
                        {{--<img src="{{$message->embed(public_path().'/avatar/'.$options['img'])}}">--}}
                        {{--src="{{asset('local/storage/app/avatar/'.$item->prod_thumbnail)}}">--}}
                        {{--</td>--}}
                        <td style=";padding: 5px;border: 1px solid #ccc">
                            <p class="name"><b>{{ $product->prod_name }}</b></p>

                            @if(isset($options['color']))<p>Màu:
                                @foreach($colorlist as $color)
                                    @if( $options['color'] ==$color->color_id)
                                        {{$color->value}}
                                    @endif
                                @endforeach

                            </p>@endif
                            @if(isset($options['size']))<p>Size:
                                @foreach($sizelist as $size)
                                    @if( $options['size'] ==$size->size_id)
                                        {{$size->value}}
                                    @endif
                                @endforeach
                            </p>@endif

                        </td>
                        <td style="border: 1px solid #ccc">
                            <span class="text-center">{{ $product->pivot->qty }}</span>
                        </td>
                        <td style="border: 1px solid #ccc">
                            <p>{{ presentPrice($product->pivot->price) }} <sup>đ</sup></p>
                        </td>
                        <td style="border: 1px solid #ccc">
                            <p>{{ presentPrice($product->pivot->price * $product->pivot->qty) }} <sup>đ</sup></p>
                        </td>

                    </tr>
                @endforeach
                <tr style="height: 2px;background: #1a1a1a;padding: 15px 0"></tr>
                <tr>
                    <td colspan="1">Phí vận chuyển:</td>
                    <td colspan="3">{{ presentPrice($order->ship_price) }} <sup>đ</sup></td>
                </tr>
                <tr>
                    <td colspan="1">Mã giảm giá</td>
                    <td colspan="3">{{$order->bill_discount_code}} - {{ presentPrice($order->bill_discount) }}
                        <sup>đ</sup></td>
                </tr>
                <tr>
                    <td colspan="1">Tổng cộng:</td>
                    <td colspan="3">{{presentPrice($order->total) }} <sup>đ</sup></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</head>
</html>