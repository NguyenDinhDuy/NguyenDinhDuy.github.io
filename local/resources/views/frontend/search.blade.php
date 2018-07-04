@extends('frontend.master')
@section('title','Trang Chủ')
@section('main')
    <div style="height: 50px;background: #2b395c;"></div>
    <div class="container" style="margin-top: 30px">

        <div id="search" class="row">
            <div class="col-12">
                {{--<p style="padding:10px;border:1px solid #eee;margin-bottom: 20px"><a href="{{asset('/')}}"> Trang chủ ></a> Tìm--}}
                    {{--kiếm</p>--}}
                <p style="padding-left:10px;padding-bottom:5px;color:#666;font-weight: 500">Từ khóa tìm kiếm: <span
                            style="color: red;font-size: 20px;">{{$keyword}}</span></p>
                <p style="padding-left:10px;color:#666;border-bottom:1px solid #eee;padding-bottom:10px;font-weight: 500">
                    Đã tìm thấy tất cả: ({{ count($products) }} sản phẩm)</p>
            </div>
        </div>
        <div id="content" class="row">
            <div class="beta-products-list">
                <div class="row">
                    @foreach($products as $item)
                        <div class="col-sm-3" style="margin-bottom: 20px">
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
                                                    <span style="font-size: 16px;color: red; font-family: Arial; font-weight: bold">{{number_format($item->promotion_price,0,',','.')}}
                                                        VNĐ</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> <!-- .beta-products-list -->
            <div class="row text-center">
                {{$products->links()}}
            </div>
            <div class="space50">&nbsp;</div>
            <div class="beta-products-list">
                <div class="beta-products-details">
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="single-item">
                            <div class="single-item-header">
                                <img src="assets/dest/images/f1.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="single-item">
                            <div class="single-item-header">
                                <img src="assets/dest/images/f2.jpg">
                            </div>
                        </div>
                    </div>

                </div>
            </div> <!-- .beta-products-list -->
        </div>
    </div>
@stop