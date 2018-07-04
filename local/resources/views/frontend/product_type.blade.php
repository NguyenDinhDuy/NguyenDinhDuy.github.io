@extends('frontend.master')
@section('title',$cate->cate_name)
@section('main')
    {{--<script type="text/javascript">--}}
        {{--function sort(value) {--}}
            {{--$.ajax({--}}
                {{--type: 'get',--}}
                {{--url: '{{url('cate/sort') }}',--}}
                {{--data: {value: value, id: {{$cate->cate_id}}},--}}
            {{--}).done(function (data) {--}}
                {{--$('body').html(data)--}}
            {{--}).fail(function (data) {--}}
                {{--console.log(data);--}}
            {{--});--}}
        {{--}--}}

    {{--</script>--}}

    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space20">&nbsp;</div>
                <div>
                    <a style="font-weight:500;font-size: 12px;" href="url('/">TRANG CHỦ</a>
                    <span style="font-weight:bold;font-size: 10px;padding: 0 8px"> > </span>
                    <span style="font-weight:500;font-size:12px;color: #000">{{$cate->cate_name}}</span>
                </div>
                <div class="space40">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="beta-sales beta-lists">
                                    <ul class="aside-menu" style="background: #fff;padding: 0">
                                        <li style="padding-left:20px;font-weight: 700; font-size: 18px ;background: #F7F7F7 ">
                                            DANH MỤC
                                        </li>
                                        @foreach($catelist as $cate)
                                            <li style="padding-left:20px;font-weight: 600; font-size: 14px; padding-top: 25px; padding-bottom: 25px;border-bottom: 1px solid #eee">
                                                <a style="text-transform: uppercase"
                                                   href="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}">{{$cate->cate_name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div style="padding-bottom: 20px">
                            <span style="font-family:Arial;color: #666">Sắp xếp theo: </span>

                            <select name="sort" onchange="location = this.value;"
                                    style="border-color: #737373; border-radius:4px;width: 120px;height:25px;font-weight: bold;color: #666">
                                <option style="font-family:Arial;font-weight:bold;color: #666">Mặc định</option>
                                <option
                                        value="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}"
                                        style="font-family: Arial;color: #666">Mới cập nhật
                                </option>
                                <option
                                        value="{{asset('cate/sortasc/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}"
                                        style="font-family: Arial;color: #666">Giá tăng
                                    dần
                                </option>
                                <option
                                        value="{{asset('cate/sortdesc/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}"
                                        style="font-family: Arial;color: #666">Giá giảm
                                    dần
                                </option>
                            </select>
                        </div>

                        <div class="beta-products-list">
                            <div class="row">
                                @if(count($items)==0)
                                    <div class="text-center" style="font-family:Arial;font-weight:bold;color: brown">
                                        Không có kết quả nào
                                        phù hợp với yêu cầu !
                                    </div>
                                @else
                                    @foreach($items as $item)
                                        @if($item->prod_price-$item->promotion_price >0)
                                            <div class="col-sm-4" style="margin-bottom: 20px">
                                                <div class="single-item">
                                                    <div class="ribbon-wrapper">
                                                        <div class="ribbon sale">Sale</div>
                                                    </div>
                                                    <div class="single-item-header">
                                                        <a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}"><img
                                                                    src="{{asset('local/storage/app/avatar/'.$item->prod_thumbnail)}}"
                                                            ></a>
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
                                            <div class="col-sm-4" style="margin-bottom: 20px">
                                                <div class="single-item">
                                                    <div class="single-item-header">
                                                        <a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}"><img
                                                                    src="{{asset('local/storage/app/avatar/'.$item->prod_thumbnail)}}"
                                                            ></a>
                                                    </div>
                                                    <div class="single-item-body">
                                                        <div style="height: 50px;">
                                                            {{--ÁO NỈ HOODIE DÀI TAY NAM VIỀN ỐNG TAY PHỐI KHÓA CÀI IN GRAPHIC AFRICA IS ON THE RISE. TREND ĐEN--}}
                                                            <a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">{{$item->prod_name}}</a>
                                                        </div>
                                                        <p class="single-item-price" style="margin-top: 15px;">
                                                    <span style="font-size: 16px;color: red; font-family: Arial; font-weight: bold">{{presentPrice($item->promotion_price)}}
                                                        VNĐ</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div> <!-- .beta-products-list -->
                        <div class="row text-center">
                            {{$items->links()}}
                        </div>
                    </div>
                </div> <!-- end section with sidebar and main content -->
            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@stop