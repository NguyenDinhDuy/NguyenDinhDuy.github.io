@extends('backend.master')
@section('title','Sửa sản phẩm')
@section('main')

    <div style="padding: 40px 20px" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-xs-9 col-md-9 col-lg-9">
                <div class="widget-box">
                    {{--<div class="widget-title">--}}
                        {{--<span style="background-color: #f1f4f7;padding:5px 5px;font-weight: bold">Chi tiết đơn hàng</span>--}}
                    {{--</div>--}}
                    <div class="widget-content nopadding">
                        <table class="table table-bordered">
                            <thead class="thead-inverse">
                            <tr>
                                <th style="background: #efefef;font-size: 12px;font-weight: bold">Mã đơn hàng</th>
                                <th style="background: #efefef;font-size: 12px;font-weight: bold">Tên khách hàng</th>
                                <th style="background: #efefef;font-size: 12px;font-weight: bold">Địa chỉ</th>
                                <th style="background: #efefef;font-size: 12px;font-weight: bold">Email</th>
                                <th style="background: #efefef;font-size: 12px;font-weight: bold">Số điện thoại</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>#{{ $order->bill_code }}</td>
                                <td>{{ $order->bill_name }}</td>
                                <td>{{$order->address}}</td>
                                <td>{{ $order->bill_email }}</td>
                                <td>{{ $order->bill_phone }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <thead class="thead-inverse">
                            <tr>
                                <th style="background: #efefef;font-size: 12px;font-weight: bold">Hình ảnh</th>
                                <th style="background: #efefef;font-size: 12px;font-weight: bold">Thông tin</th>
                                <th style="background: #efefef;font-size: 12px;font-weight: bold">Số lượng</th>
                                <th width="12%" style="background: #efefef;font-size: 12px;font-weight: bold">Giá</th>
                                <th width="15%" style="background: #efefef;font-size: 12px;font-weight: bold">Thành tiền
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($order->products as $product)
                                @php $options =  unserialize($product->pivot->options); @endphp
                                <tr>

                                    <td><img width="80" height="80px"
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
                                        <p>{{ presentPrice($product->pivot->price) }} <sup>đ</sup></p>
                                    </td>
                                    <td>
                                        <p>{{ presentPrice($product->pivot->price * $product->pivot->qty) }}
                                            <sup>đ</sup></p>
                                    </td>

                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2">Phí vận chuyển:</td>
                                <td colspan="3">{{ presentPrice($order->ship_price) }} <sup>đ</sup></td>
                            </tr>
                            <tr>
                                <td colspan="2">Mã giảm giá</td>
                                <td colspan="3">{{$order->bill_discount_code}}
                                    - {{ presentPrice($order->bill_discount) }}
                                    <sup>đ</sup></td>
                            </tr>
                            <tr>
                                <td colspan="2">Tổng cộng:</td>
                                <td colspan="3">{{presentPrice($order->total) }} <sup>đ</sup></td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-3 col-md-3 col-lg-3">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5 style="background-color: #efefef;padding: 15px 10px;font-weight: bold">Thay đổi trạng thái</h5>
                    </div>
                    <div style="background:#ccc;border: 1px solid #000;padding: 15px" class="widget-content nopadding">
                        <form action="" method="post" class="form-horizontal">
                            <div class="control-group">
                                <div class="controls" style="margin: 15px">
                                    <select style="border:1px solid #000;height: 30px" name="status" id="">
                                        <option @if($order->status == 0) selected @endif value="0">Chưa kiểm tra
                                        </option>
                                        <option @if($order->status == 1) selected @endif value="1">Đang vận
                                            chuyển
                                        </option>
                                        <option @if($order->status == 2) selected @endif value="2">Giao hàng thành
                                            công
                                        </option>
                                        <option @if($order->status == 3) selected @endif value="3">Giao hàng thất
                                            bại
                                        </option>
                                    </select>
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <div style="margin-left:15px;padding-top: 10px" class="form-actions">
                                <button style="width: 180px" type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop