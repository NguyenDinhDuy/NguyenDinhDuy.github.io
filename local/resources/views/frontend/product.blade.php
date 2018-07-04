@extends('frontend.master')
@section('title',$item->prod_name)
@section('main')
    <style>
        body {
            font-family: monospace;
        }

        .attr a {
            display: inline-block;
            min-width: 25px;
            height: 25px;
            overflow: hidden;
            line-height: 25px;
            border: 1px solid #fff;
            margin-right: 4px;
            transition: all 0.2s;
            text-align: center;
            font-size: 14px;
            color: #000;
        }

        .product__sp--item {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
        }

        .tab__list {
            border-bottom: 1px solid #D5D5D5;
            margin: 0;
            padding: 0;
        }

        .nav {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
        }

        .tab__list li.active {
            border-bottom: 2px solid #E32124;
            margin-bottom: -2px;
        }

        .tab__list li {
            float: left;
            color: #000000;
            padding: 7.5px;
            font-size: 16px;
            text-transform: uppercase;
            list-style: none;
            margin-top: 1px;
        }

        my-5 {
            margin-bottom: 20px !important;
            margin-top: 3rem !important;
        }

        .small {
            font-size: 80%;
            font-weight: 400;
        }

        .list__radio.small input[type="radio"] + label {
            height: 25px;
            min-width: 25px;
            line-height: 25px;
        }

        .list__radio.small input[type="radio"]:checked + label:before {
            height: 12px;
            font-size: 8px;
            right: -5px;
            bottom: 4px;
        }

        .list__radio.small input[type="radio"]:checked + label:after {
            border-top: 12px solid transparent;
            border-right: 12px solid transparent;
            border-bottom: 12px solid transparent;
            border-left: 12px solid #E32124;
            bottom: -12px;
        }

        .list__radio input[type="radio"] {
            display: none;
        }

        .list__radio input[type="radio"]:checked + label {
            border-color: #E32124;
        }

        .list__radio input[type="radio"]:checked + label:after {
            content: "";
            position: absolute;
            bottom: -15px;
            right: -15px;
            border-top: 14px solid transparent;
            border-right: 14px solid transparent;
            border-bottom: 14px solid transparent;
            border-left: 14px solid #E32124;
            transform: rotate(45deg);
        }

        .list__radio input[type="radio"]:checked + label:before {
            font-family: FontAwesome;
            content: "\f00c";
            font-size: 10px;
            position: absolute;
            bottom: 6px;
            right: -5px;
            height: 20px;
            width: 20px;
            color: #ffffff;
            z-index: 999;
        }

        .list__radio input[type="radio"] + label {
            display: inline-block;
            padding: 0 7.5px;
            min-width: 60px;
            height: 40px;
            background: #ffffff;
            border: 1px solid #D5D5D5;
            text-align: center;
            line-height: 40px;
            position: relative;
            overflow: hidden;
            background: #F7F7F7;
        }

        p.chose-size {
            font-size: 12px;
        }

        p.chose-size a {
            font-weight: bold;
        }

        .path {
            font-size: 11px;
            font-weight: 500;
            /*color: #666;*/
            font-family: monospace;
        }

        .next {
            font-weight: bold;
            font-size: 10px;
            padding: 0 8px
        }

        .detail-image {
            /*display: grid;*/
            /*grid-template-columns: repeat(4, 1fr);*/
            /*grid-gap: 10px;*/
            /*margin-top: 10px;*/
            padding-top: 10px;
            border-top: 1px solid #ccc;

        }

        .image-thumb {
            /*display: flex;*/
            /*align-items: center;*/
            border: 1px solid lightgray;
            /*cursor: pointer;*/
        }

    </style>
    @include('errors.message')
    <div class="container">
        <div class="space20">&nbsp;</div>
        <div>
            <a style="padding-left: 10px" class="path" href="url('/">TRANG CHỦ</a>
            <span class="next"> > </span>

            @foreach($catelist as $cate)
                @if($cate->cate_id==$item->prod_cate)
                    <a href="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}"
                       class="path">{{ $cate->cate_name }}</a>
                @endif
            @endforeach
            <span class="next"> > </span>
            <span class="path" style="color: #E32124">{{ $item->prod_name }}</span>
        </div>
        <div id="content" style="padding-top: 30px">
            <div class="row">
                <div class="col-sm-10">
                    <div>
                        <form method="post" action="{{asset('cart/')}}">
                            <div class="col-sm-5">
                                <button type="button"
                                        style="border: none; background: none;color: #007bff;font-weight: bold"
                                        data-toggle="modal" data-target="#exampleModalCenter1">
                                    <img name="thumbnail" title="Click để xem ảnh lớn hơn"
                                         id="thumbnail" width="360px" height="540px"/>
                                    {{--src="{{asset('local/storage/app/avatar/'.$item->prod_thumbnail)}}">--}}
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <img id="thumbnaillar" width="600px" height="800px">
                                                {{--src="{{asset('local/storage/app/avatar/'.$item->prod_thumbnail)}}">--}}
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="detail-image owl-carousel owl-theme">
                                    @foreach($images as $image)
                                        <div class="image-thumb"><img style="height: 88px" width="100%"
                                                                      src="{{asset('local/storage/app/avatar/'.$image->path)}}">
                                            <input id="valimg" type="hidden" value="{{$image->path}}">
                                        </div>
                                    @endforeach
                                </div>

                                <script>
                                    (function () {
                                        const currentImage = document.querySelector('#thumbnail');
                                        const currentLargeImage = document.querySelector('#thumbnaillar');
                                        const images = document.querySelectorAll('.image-thumb');
                                        images.forEach((element) => element.addEventListener('click', thumbnailClick));

                                        function thumbnailClick(e) {
                                            currentImage.src = this.querySelector('img').src;
                                            currentLargeImage.src = this.querySelector('img').src;
                                        }
                                    })();

                                    $('.owl-carousel').owlCarousel({
                                        // loop:true,
                                        margin: 10,
                                        nav: true,
                                        responsive: {
                                            0: {
                                                items: 1
                                            },
                                            600: {
                                                items: 3
                                            },
                                            1000: {
                                                items: 4
                                            }
                                        }
                                    })
                                </script>

                            </div>
                            <div class="col-sm-7" style="padding-left: 10px">
                                <div class="single-item-body" style="color: #484848;">
                                    <p id="name"
                                       style="font-family:monospace;font-style:initial;line-height:24px;font-size: 18px; border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 15px">
                                        {{$item->prod_name}}</p>

                                    <p id="code" style="margin-bottom: 20px;font-size: 16px">
                                        <span style="font-family:monospace;font-weight: bold;font-size: 14px;">Mã sản phẩm: {{$item->prod_code}}</span>
                                    </p>
                                    <div class="line" style="margin: 7.5px 0;">
                                        <p class="mb-2" style="font-family:monospace;margin-bottom: 0.5rem !important;">
                                            <strong>Chọn màu yêu
                                                thích</strong></p>
                                        <div class="list__radio color">
                                            @foreach($colorspecifi as $color)
                                                <input id="color{{ $color->color_id }}"
                                                       type="radio" name="color"
                                                       value="{{ $color->color_id }}">
                                                <label for="color{{ $color->color_id }}"> {{ $color->value }}</label>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="line">
                                        <p class="mb-2" style="font-family:monospace;margin-bottom: 10px"><strong>Chọn
                                                size</strong><span
                                                    style="font-family:monospace;color: red; font-size: 11px"> (Nhớ chọn size của bạn)</span>
                                        </p>
                                        <div class="list__radio small">
                                            @foreach($sizespecifi as $size)
                                                <input id="size{{ $size->size_id }}" type="radio"
                                                       name="size" value="{{ $size->size_id }}">
                                                <label for="size{{ $size->size_id }}">{{ $size->value }}</label>
                                            @endforeach
                                        </div>

                                        <p class="chose-size" style="font-family:monospace;">Bạn không nhớ size của
                                            mình:
                                            <button type="button"
                                                    style="font-family:monospace;border: none; background: none;color: #007bff;font-weight: bold"
                                                    data-toggle="modal" data-target="#exampleModalCenter">
                                                Mời bạn xem cách tính size
                                            </button>
                                        </p>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <img src="assets/dest/images/timco.png">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-2">
                                        <strong>
                                            <span style="font-family:monospace; margin-right: 10px"> Số lượng </span>
                                        </strong>
                                        <input rel="soluong" type="number" min="1" value="1" name="qty"
                                               style="text-align:center;font-weight:600;width: 120px;height: 40px;margin-right: 5px;margin-top: 25px;border-radius: 20px;border: 1px solid #737373">
                                        <input style="background: #fff;width: 15px; border:none;" id="sl"> <span
                                                style="font-size: 16px">sản phẩm sẵn có</span>
                                    </p>
                                    <input type="hidden" value="{{ $item->prod_id }}" name="prod_id" id="prod_id">
                                    <input type="hidden" id="srcImg" name="img">
                                    <input type="hidden" id="slmax" name="slmax">
                                    <div style="margin-top: 30px">
                                        <p class="mb-2"><strong>Giá sản phẩm:</strong></p>
                                        <p class="single-item-price" style="margin-top: 10px">
                                            <strong>
                                            <span id="price"
                                                  style="font-family:monospace;color: #e84c3d; font-size: 27px;"> {{number_format($item->promotion_price,0,',','.')}}
                                                <span style="font-size: 14px;">VNĐ</span>
                                            </span>
                                            </strong>
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="space20">&nbsp;</div>
                                    <div class="single-item-options text-center"
                                         style="border-bottom: 1px solid #eee; padding-bottom: 15px;background: #eee;margin-top: 10px;margin-bottom: 10px;padding: 10px">

                                        <button id="buy" type="submit"
                                                style="font-family:monospace;background: #d61c1f;width: 505px; height: 70px;color: #fff; border: none;font-size: 18px;font-family: Arial ">
                                            THÊM VÀO GIỎ HÀNG
                                            <P style="font-family:monospace;font-size: 12px">Mua online giao hàng tận
                                                nơi</P>
                                        </button>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="space20">&nbsp;</div>
                                    <div class="single-item-desc"
                                         style="border-top: 1px solid #eee;padding-top: 15px;line-height: 24px">
                                        <label style="font-family:monospace;color: #000"><i
                                                    class="fa fa-caret-down"></i>
                                            Chi tiết
                                            sản phẩm</label>
                                        <strong style="color: #666;"><p> {!! $item->prod_description !!}</p></strong>
                                    </div>
                                </div>
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>
                    <div style="margin-left: 400px;margin-top: 770px;padding-top:10px;border-top: 1px solid #eee">
                        @if(Auth::guest())
                            <button onclick="return confirm('Bạn cần đăng nhập để thực hiện chức năng này!')" ,
                                    style="background:none;border: none">
                                <i class="fa fa-heart"></i><span style="font-weight: bold;font-size: 13px;"> Sản phẩm yêu thích</span>
                            </button>
                        @else
                            <form action="{{asset('wishlist/add')}}" method="post" id="contact_form"
                                  class="contact-form" accept-charset="UTF-8">
                                {{csrf_field()}}
                                <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                                <input type="text" name="product_id" value="{{$item->prod_id}}" hidden>
                                <button type="submit" style="background:none;border: none">
                                    <i class="fa fa-heart"></i><span
                                            style="font-weight: bold;font-size: 13px;margin-top: 0"> Sản phẩm yêu thích</span>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

                <div class="col-sm-2 aside">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="beta-sales beta-lists">
                                <ul class="aside-menu" style="background: #fff; padding: 0">
                                    <li style="font-weight: 700; font-size: 18px ;background: #F7F7F7 ">DANH MỤC
                                    </li>
                                    @foreach($catelist as $cate)
                                        <li style="font-weight: 600; font-size: 14px; padding-top: 25px; padding-bottom: 25px;border-bottom: 1px solid #eee">
                                            <a style="text-transform: uppercase"
                                               href="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}">{{$cate->cate_name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space40">&nbsp;</div>
            <div class="row">
                <div class="col-md-10" style="border-bottom: 1px solid #eee">
                    <div class="product__sp--item">
                        <div class="pr__desc">
                            <ul class="tab__list nav nav_tabs">
                                <li class="active" style="font-family:monospace;font-weight: bold">Chính sách giao
                                    hàng
                                </li>
                            </ul>
                            <span style="font-family:monospace;display: list-item;margin: 0 0 0 30px;color: #555;margin-top: 20px">Đổi hàng trong vòng 72h</span>
                            <span style="font-family:monospace;display: list-item;margin: 0 0 0 30px;color: #555;">Phí vận chuyển nội thành Hà Nội: 20.000</span>
                            <span style="font-family:monospace;display: list-item;margin: 0 0 0 30px;color: #555;">Phí vận chuyển ngoại thành/ngoại tỉnh: tùy thuộc vào địa điểm</span>
                            <span style="font-family:monospace;display: list-item;margin: 0 0 0 30px;color: #555;">Miễn phí vận chuyển với đơn hàng trên 1.000.000đ</span>
                            <span style="font-family:monospace;display: list-item;margin: 0 0 0 30px;color: #555;">Thanh toán khi nhận hàng</span>
                            <span style="font-family:monospace;display: list-item;margin: 0 0 0 30px;color: #555;margin-bottom: 20px">Mua hàng trực tiếp tại: Số 55- Nguyễn Trãi- Hà Đông- Hà Nội</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space50">&nbsp;</div>

            <div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="fb-comments" data-href="{{url("/detail/$item->prod_id/$item->prod_slug.html")}}"
                             data-width="100%" data-numposts="5"></div>
                        {{--data-href="{{url('/detail/'.$item->prod_id.'/'.$item->prod_slug.'html')}}"--}}
                        </div>
                    </div>
                </div>
            </div>

            {{--<div class="space20">&nbsp;</div>--}}
            <div class="row">
                <div class="beta-products-list">
                    <h4 class="text-center"
                        style="font-family:monospace;padding-bottom: 20px;padding-top: 20px;border-top: 1px solid #eee; border-bottom: 1px solid #eee ">
                        SẢN PHẨM LIÊN QUAN
                        <div style="margin-top: 10px"><img src="assets/dest/images/polo-shirt.png"></div>
                    </h4>

                    <div class="row" style="margin-top: 30px">
                        @foreach($items as $item)
                            @if($item->prod_price-$item->promotion_price >0)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="ribbon-wrapper">
                                            <div class="ribbon sale">Sale</div>
                                        </div>
                                        <div class="single-item-header">
                                            <a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}"><img
                                                        src="{{asset('local/storage/app/avatar/'.$item->prod_thumbnail)}}">
                                            </a>
                                        </div>
                                        <div class="single-item-body">
                                            <div style="height: 50px">
                                                <a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">{{$item->prod_name}}</a>
                                            </div>
                                            <p class="single-item-price" style="margin-top: 15px">
                                                    <span class="flash-del"
                                                          style="font-size: 16px;color: #484848; font-family: Arial; font-weight: bold">{{presentPrice($item->prod_price)}}
                                                        VNĐ</span>
                                                <span class="flash-sale"
                                                      style="font-size: 16px;color: red; font-family: Arial; font-weight: bold">{{presentPrice($item->promotion_price)}}
                                                    VNĐ</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">
                                                <img src="{{asset('local/storage/app/avatar/'.$item->prod_thumbnail)}}">
                                            </a>
                                        </div>
                                        <div class="single-item-body">
                                            <div style="height: 50px">
                                                <a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">{{$item->prod_name}}</a>
                                            </div>
                                            <p class="single-item-price" style="margin-top: 15px">
                                                    <span style="font-size: 16px;color: red; font-family: Arial; font-weight: bold">{{presentPrice($item->prod_price)}}
                                                        VNĐ</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
    <a type="hidden" href="{!!url('quantity')!!}" id="linkquan"></a>
    {{--<a type="hidden" href="{!!url('quantity')!!}" class="btn btn-primary btn-Link"></a>--}}

    <script>
        // alert($('[rel="soluong"]').val())
        $(document).ready(function () {

            function loadproduct(that) {
                $('input[name="prod_id"]').val(that.data('products').prod_id);
                $('.code span').html(that.data('products').prod_code);
            }

            function loadInfo() {
                $id = $('#prod_id').val();
                $color = $("input[name='color']:checked").val();
                $size = $("input[name='size']:checked").val();
                var hrefDef = $('#linkquan').attr('href');
                // var hrefDef = $('.btn-Link').attr('href');
                var href = hrefDef + '/' + $id + "/" + $color + "/" + $size;
                if ($size) {

                    $.ajax({
                        url: href,
                        type: "get",
                        dataType: "json",
                        success: function (result) {
                            //them
                            if (!$.trim(result)) {
                                $('#sl').val(0);
                                $('#buy').attr('disabled', true)
                            } else {
                                let url = '{{asset('local/storage/app/avatar/')}}';
                                // $('[rel="soluong"]').val(result[0].quantity).attr('max', result[0].quantity)
                                $('#sl').val(result[0].quantity)
                                if (result[0].quantity == 0) {
                                    $('#buy').attr('disabled', true)
                                } else {
                                    $('#buy').attr('disabled', false)
                                    $('#thumbnaillar').attr('src', url + '/' + result[0].image)
                                }
                                $('[rel="soluong"]').attr('max', result[0].quantity)
                                $('#thumbnail').attr('src', url + '/' + result[0].image)
                                $('#thumbnaillar').attr('src', url + '/' + result[0].image)
                                $('#srcImg').val(result[0].image)
                                $('#slmax').val(result[0].quantity)
                            }
                        }
                    });
                }
            }

            $('.list__radio').find('input:first').prop('checked', true);
            loadInfo();
            $('.list__radio.small input').click(function () {
                loadInfo();
                $('[rel="soluong"]').val(1)
            });

            $('.list__radio.color input').click(function () {
                loadInfo();
                $('[rel="soluong"]').val(1)
            });

        });
    </script>
@stop
