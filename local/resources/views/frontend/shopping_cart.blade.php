@extends('frontend.master')
@section('title','Giỏ hàng')
<style>
    body {
        font-family: monospace;
        width: 100%;
    }
</style>
@section('main')
    <script type="text/javascript">
        function updateCart(qty, rowId) {
            $.get(
                '{{asset('cart/update')}}',
                {qty: qty, rowId: rowId},
                function () {
                    location.reload();
                }
            );
        }
    </script>

    <div class="container">
        <div id="content">

            <div class="table-responsive">
                <!-- Shop Products Table -->
                <table class="shop_table beta-shopping-cart-table" cellspacing="0">

                    @if(Cart::count()==0)
                        <thead>
                        <tr>
                            <th style="font-family: monospace;color: #666">Sản phẩm</th>
                            <th style="font-family: monospace;color: #666">Màu sắc</th>
                            <th style="font-family: monospace;color: #666">Size</th>
                            <th style="font-family: monospace;color: #666">Đơn giá</th>
                            <th style="font-family: monospace;color: #666">Số lượng</th>
                            <th style="font-family: monospace;color: #666">Thành tiền</th>
                            <th style="font-family: monospace;color: #666"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="cart_item">
                            <td style="color: brown;font-weight: bold;padding:20px 0;font-size: 16px">Giỏ hàng của bạn
                                hiện chưa có sản phẩm nào
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td style="padding:15px;border: 1px solid #b3b3b3" colspan="7">
                                <span style="font-size:16px;font-weight: bold;color: #282828;margin-left: 300px"> Số lượng:</span>
                                <span style="font-size:18px;font-weight:bold; color: #E32124">0</span>
                                <span style="font-size:16px;font-weight: bold;color: #282828;margin-left: 200px"> Tổng tiền:</span>
                                <span style="font-size:18px;font-weight:bold; color: #E32124">0 đ</span>
                            </td>
                        </tr>
                        </tfoot>

                    @else
                        <thead>
                        <tr>
                            <th style="font-family: monospace;color: #666">Sản phẩm</th>
                            <th style="font-family: monospace;color: #666">Màu sắc</th>
                            <th style="font-family: monospace;color: #666">Size</th>
                            <th style="font-family: monospace;color: #666">Đơn giá</th>
                            <th style="font-family: monospace;color: #666">Số lượng</th>
                            <th style="font-family: monospace;color: #666">Thành tiền</th>
                            <th style="font-family: monospace;color: #666"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr class="cart_item">
                                <td style="padding: 0 15px" class="product-name" width="400px">
                                    <a href="{{asset('detail/'.$item->id.'/'.str_slug($item->name).'.html')}}">
                                        <div class="media">
                                            <img width="80px" height="80px" class="pull-left"
                                                 src="{{asset('local/storage/app/avatar/'.$item->options->img)}}"
                                                 alt="">
                                            <div class="media-body">
                                                <p style="font-size:12px;font-weight: bold;color: #666">
                                                    {{$item->name}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td style="padding: 5px">
                                    @foreach($colorlist as $color)
                                        @if($item->options->color==$color->color_id)
                                            {{$color->value}}
                                        @endif
                                    @endforeach
                                </td>
                                <td style="padding: 10px">
                                    @foreach($sizelist as $size)
                                        @if($item->options->size==$size->size_id)
                                            {{$size->value}}
                                        @endif
                                    @endforeach
                                </td>

                                <td style="width: 130px">
                                    <span style="font-family: monospace;color: #070707;font-size: 13px">{{number_format($item->price,0,',','.')}}
                                        VNĐ</span>
                                </td>

                                <td style="padding: 15px" class="product-quantity">
                                    @php
                                        $rid=$item->rowId;
                                            $qty =$item->qty;
                                            $max=$item->options->slmax;
                                            if ($qty>$max){
                                            Cart::update($rid,$max);
                                            }
                                    @endphp

                                    <input class="text-center" type="number" min="1" style="width: 40px;height: 30px;"
                                           name="qty" onchange="updateCart(this.value,'{{$item->rowId}}')"
                                           value="{{$item->qty}}" id="qty" max="{{$item->options->slmax}}">
                                </td>

                                <td style="width: 150px">
                                    <span style="font-family: monospace;color: #070707;font-size: 13px" class="amount">{{presentPrice($item->price*$item->qty)}}
                                        VNĐ</span>
                                </td>

                                <td style="width: 165px;">
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')"
                                       href="{{asset('cart/delete/'.$item->rowId)}}" class="remove"
                                       title="Remove this item"><i class="fa fa-trash-o"></i>Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td style="padding:15px;border: 1px solid #b3b3b3" colspan="6">
                                <span style="font-size:16px;font-weight: bold;color: #282828;margin-left: 300px"> Số lượng:</span>
                                <span style="font-size:18px;font-weight:bold; color: #E32124">{{Cart::count()}}</span>
                                <span style="font-size:16px;font-weight: bold;color: #282828;margin-left: 200px"> Tổng tiền:</span>
                                <span style="font-size:18px;font-weight:bold; color: #E32124">
                                    <?php
                                    $total = 0;
                                    foreach ($items as $value) {
                                        $total = $total + $value->price * $value->qty;
                                    }
                                    echo(presentPrice($total));
                                    ?>
                                    đ</span>
                            </td>
                            <td style="padding:0;border: 1px solid #b3b3b3" colspan="1">
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa giỏ hàng?')"
                                   style="color:#666;background: none" href="{{asset('cart/delete/all')}}"
                                   class="remove" title="Remove this item"><i class="fa fa-trash-o"></i>Xóa giỏ hàng</a>
                            </td>
                        </tr>
                        </tfoot>
                    @endif
                </table>
                <!-- End of Shop Table Products -->
            </div>
            <a href="{{asset('/')}}"
               style="border:1px solid #737373;background: #ddd;padding: 10px 15px;font-size: 15px;font-weight: bold;border-radius: 4px">Mua
                thêm
                sản phẩm khác</a>
            @if(Cart::count()>0)
                <a href="{{asset('cart/pay')}}"
                   style="border:1px solid crimson ; margin-left:722px;background: #e15452;padding: 10px 15px;font-size: 15px;font-weight: bold;border-radius: 4px;color: #fff">Tiến
                    hành thanh toán</a>
            @else
                <a style="border:1px solid crimson ; margin-left:722px;background: #e15452;padding: 10px 15px;font-size: 15px;font-weight: bold;border-radius: 4px;color: #fff">Tiến
                    hành thanh toán</a>
            @endif
        </div>
    </div> <!-- .container -->
@stop
