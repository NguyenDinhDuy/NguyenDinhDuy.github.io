@extends('frontend.master')
@section('title','Thanh toán')
<style>
    body {
        font-family: monospace;
    }
</style>
@section('main')

    <p class="text-center" style="font-weight: bold;margin-top: 40px;font-size: 24px">ĐĂT HÀNG VÀ THANH TOÁN</p>

    <div style="margin-top:20px;margin-bottom:0px;border-top: 1px solid #a9a9a9;padding-left: 50px;padding-right: 60px">
        <div style="padding: 30px 10px;font-weight: bold" class="row">
            <form method="post">

                <div style="margin-bottom:0;" class="col-sm-4">
                    @if(count($errors) > 0)
                        <div class="spacer"></div>
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{!! $error !!}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <p style="font-size: 18px;margin-bottom: 20px"><span
                                style="color:#fff;background: #E32124;padding: 4px 10px;">1</span> HÌNH THỨC THANH TOÁN
                    </p>
                    {{--<input type="radio" checked> Thanh toán tại nhà--}}
                    <div class="your-order-body" style="padding: 0">
                        <ul class="payment_methods methods">
                            <li class="payment_method_bacs">
                                <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method"
                                       value="COD" checked="checked" data-order_button_text="">
                                <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                            </li>

                            <li class="payment_method_cheque">
                                <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method"
                                       value="ATM" data-order_button_text="">
                                <label for="payment_method_cheque">Chuyển khoản </label>
                                <div class="payment_box payment_method_cheque" style="display: none;">
                                    Chuyển tiền đến tài khoản sau:
                                    <br>- Số tài khoản: 123 456 789
                                    <br>- Chủ TK: Nguyễn Đình Duy
                                    <br>- Ngân hàng VCB Hà Nội
                                </div>
                            </li>

                        </ul>
                    </div>

                    <p style="font-size: 18px;margin-bottom: 20px"><span
                                style="color:#fff;background: #E32124;padding: 4px 10px;">2</span> THÔNG TIN KHÁCH HÀNG
                    </p>
                    <p style="color: #E32124;font-size: 11px;margin-bottom: 10px">(Đánh dấu * là trường thông tin bắt
                        buộc)</p>
                    <p style="padding-bottom: 10px">Họ và tên: *</p>
                    @if(auth()->user())
                        <input type="text" id="name" name="name" value="{{auth()->user()->name}}" readonly>
                    @else
                        <input type="text" id="name" name="name" value="{{old('name')}}" required>
                    @endif
                    <p style="padding: 10px 0;">Email: *</p>
                    @if(auth()->user())
                        <input type="email" id="email" name="email" value="{{auth()->user()->email}}" readonly>
                    @else
                        <input type="email" id="email" name="email" value="{{old('email')}}" required>
                    @endif
                    <p style="padding: 10px 0;">Điện thoại: *</p>
                    <input required type="number" name="phone" style="border:1px solid #ccc;width: 385px;height: 37px">
                    {!! Form::open() !!}
                    <p style="padding: 10px 0">Tỉnh/ Thành phố: *</p>
                    {!! Form::select('city_id',[''=>' Chọn Tỉnh/ Thành Phố ']+$cities,null,['class'=>'form-control']) !!}
                    <p style="padding: 10px 0">Quận/ Huyện: *</p>
                    {!! Form::select('district_id',[''=>'Chọn Quận/ Huyện'],null,['class'=>'form-control']) !!}
                    {!! Form::close() !!}

                    <p style="padding: 10px 0">Địa chỉ: *</p>
                    <input required type="text" name="address" style="height: 50px;" placeholder="Xã/Phường- Thôn/Xóm- Số Nhà">

                    <p style="padding: 20px 0;font-size: 16px">Ghi chú:</p>
                    <input style="height: 80px;border: 1px solid #ccc;" type="text" placeholder="Ghi chú">
                    <button class="text-center" type="submit"
                            style=" width:385px;height:40px;background: #E32124;color: #fff;margin-top: 30px;margin-bottom: 20px;border: #555;font-size: 12px;font-family: Helvetica;border-radius: 5px">
                        XÁC NHẬN ĐƠN HÀNG
                    </button>
                </div>

                {{csrf_field()}}
            </form>
            <div class="col-sm-4">
                <p style="font-size: 18px;margin-bottom: 20px"><span
                            style="color:#fff;background: #E32124;padding: 4px 10px;">3</span> XÁC NHẬN ĐƠN HÀNG</p>
                @foreach($items as $item)
                    <div style="border-bottom: 1px solid #eee" class="item">
                        <p style="padding: 0 15px" class="product-name" width="400px"></p>
                        <div class="media">
                            <img width="80px" height="80px" class="pull-left"
                                 src="{{asset('local/storage/app/avatar/'.$item->options->img)}}">
                            <div class="media-body">
                                <p style="font-size:11px;font-weight: bold;color: #606366">
                                    {{$item->name}}</p>
                            </div>
                        </div>

                        <p style="padding-top: 5px">
                            @foreach($colorlist as $color)
                                @if($item->options->color==$color->color_id)
                                    Màu: {{$color->value}}
                                @endif
                            @endforeach
                        </p>
                        <p style="padding: 5px 0">
                            @foreach($sizelist as $size)
                                @if($item->options->size==$size->size_id)
                                    Size: {{$size->value}}
                                @endif
                            @endforeach
                        </p>
                        <p style="padding: 5px 0;padding-top: 0">
                            Số lượng: {{$item->qty}}
                        </p>
                        <p style="width: 150px">
                        <span style="font-family: monospace;color: #E32124;font-size: 13px"
                              class="amount">{{presentPrice($item->price*$item->qty)}} VNĐ</span>
                        </p>
                    </div>
                @endforeach

                <div style="margin-top: 20px">
                    <a href="{{asset('cart/show')}}"
                       style="padding: 5px;border: 1px solid #666;font-size: 10px;color: #262626">QUAY
                        VỀ GIỎ
                        HÀNG</a>
                </div>
            </div>
            <p style="font-size: 18px;margin-bottom: 20px"><span
                        style="color:#fff;background: #E32124;padding: 4px 10px;">4</span> THÔNG TIN CHI PHÍ </p>
            <div style="padding-bottom:20px;background: #f0f0f0" class="col-sm-4">
                <p style="padding-top: 20px;font-size: 16px"><span>Tiền hàng:</span>
                    <span style="color: #E32124">
                        <?php
                        $total = 0;
                        foreach ($items as $value) {
                            $total = $total + $value->price * $value->qty;
                        }
                        echo(presentPrice($total));
                        ?> đ
                        </span>
                </p>

                @if($total>1000000)
                    <p style="padding-top: 20px;font-size: 16px">Phí vận chuyển: <span
                                style="color: #E32124">0 đ</span></p>
                    <i style="font-size: 10px;color: #E32124">(Miễn phí vận chuyển cho đơn hàng trên 1tr đồng)</i>
                    <p style="margin-bottom:10px;padding-top: 20px;font-size: 16px;border-top:  1px solid #666">
                        Tổng cộng: <span style="color: #E32124">{{presentPrice($total)}} đ </span></p>
                    @if (session()->has('coupon'))
                        Mã giảm giá ({{ session()->get('coupon')['name'] }}):
                        <span style="color: #E32124;font-weight: bold">-{{ presentPrice(session()->get('coupon')['discount']) }}
                            đ</span>
                        <form action="{{route('coupon.destroy')}}" method="post" style="margin-left: 10px;">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <button style="border: none;border:1px solid #555;padding:2px;border-radius: 16px"
                                    type="submit">Xóa
                            </button>
                        </form>

                        <div style="height: 5px"></div>
                        <span style="font-size: 16px"> Tổng cộng mới:
                                <span style="color: #E32124">{{ presentPrice($total-(session()->get('coupon')['discount']) )}}
                                    đ</span>
                            </span>
                    @endif

                    @if (!session()->has('coupon'))
                        <p style="font-size: 12px;margin-top: 10px"><i>Sử dụng mã giảm giá nếu có:</i></p>
                        <form action="{{route('coupon.store')}}" method="post">
                            <input name="coupon_code" id="coupon_code" type="text"
                                   style="width:210px;padding-left: 5px"
                                   placeholder="Mã giảm giá">
                            <button type="submit"
                                    style="background: #E32124;color: #fff;border: none;padding: 7px 5px;">Sử dụng
                            </button>
                            {{csrf_field()}}
                        </form>
                    @endif
                @else
                    <p style="padding-top: 20px;font-size: 16px">Phí vận chuyển: <span
                                style="color: #E32124">20.000 đ</span>
                    </p>
                    <i style="font-size: 10px;color: #E32124">(Miễn phí vận chuyển cho đơn hàng trên 1tr đồng)</i>
                    <p style="margin-bottom:10px;padding-top: 20px;font-size: 16px;border-top:  1px solid #666">
                        Tổng cộng: <span style="color: #E32124">{{presentPrice($total+20000)}} đ </span></p>
                    @if (session()->has('coupon'))
                        Mã giảm giá ({{ session()->get('coupon')['name'] }}):
                        <span style="color: #E32124;font-weight: bold">
                    -{{ presentPrice(session()->get('coupon')['discount']) }} đ</span>

                        <form action="{{route('coupon.destroy')}}" method="post" style="margin-left: 10px;">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <button style="border: none;border:1px solid #555;padding:2px;border-radius: 16px"
                                    type="submit">Xóa
                            </button>
                        </form>

                        <div style="height: 5px"></div>
                        <span style="font-size: 16px"> Tổng cộng mới:
                                <span style="color: #E32124">{{ presentPrice($total+20000-(session()->get('coupon')['discount']) )}}
                                    đ</span>
                            </span>
                    @endif

                    @if (!session()->has('coupon'))
                        <p style="font-size: 12px;margin-top: 10px"><i>Sử dụng mã giảm giá nếu có:</i></p>
                        <form action="{{route('coupon.store')}}" method="post">
                            <input name="coupon_code" id="coupon_code" type="text"
                                   style="width:210px;padding-left: 5px"
                                   placeholder="Mã giảm giá">
                            <button type="submit"
                                    style="background: #E32124;color: #fff;border: none;padding: 7px 5px;">Sử dụng
                            </button>
                            {{csrf_field()}}
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("select[name='city_id']").change(function () {
            var city_id = $(this).val();
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "<?php echo route('select-ajax') ?>",
                method: 'POST',
                data: {city_id: city_id, _token: token},
                success: function (data) {
                    $("select[name='district_id']").html('');
                    $("select[name='district_id']").html(data.options);
                }
            });
        });
    </script>
@stop