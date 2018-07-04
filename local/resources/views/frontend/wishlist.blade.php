@extends('frontend.master')
@section('title','Trang Chủ')
@section('main')
    <div style="height: 50px;background: #2b395c;"></div>
    <div style="padding-bottom:25px;margin-top: 60px;margin-left: 90px;width: 1200px; border-bottom: 2px solid #666">
        <h2 class="text-center" style="font-weight: bolder">SẢN PHẨM YÊU THÍCH</h2>
    </div>
    @include('errors.message')
    <div class="container">
        <div id="content" class="row">
            <div class="beta-products-list">
                <div class="row">
                    @if (Auth::user()->wishlist->count())
                        @foreach ($wishlists as $wishlist)
                            @foreach($products as $product)
                                @if($wishlist->product_id==$product->prod_id)
                                    <div class="col-sm-3" style="margin-bottom: 20px">
                                        <div style="position: relative;text-align: center" class="single-item">
                                            <div class="single-item-header">
                                                <a href="{{asset('detail/'.$product->prod_id.'/'.$product->prod_slug.'.html')}}"><img
                                                            src="{{asset('local/storage/app/avatar/'.$product->prod_thumbnail)}}"
                                                    ></a>
                                            </div>
                                            <div class="single-item-body">
                                                <div style="height: 50px;">
                                                    {{$product->prod_name}}
                                                </div>
                                                <p class="single-item-price" style="margin-top: 15px;">
                                                    <span style="font-size: 16px;color: red; font-family: Arial; font-weight: bold">{{presentPrice($product->promotion_price)}}
                                                        VNĐ</span>

                                                <div style="position: absolute;top: 2%;left: 92%">
                                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm yêu thích này?')"
                                                       style="color: #666;font-size: 24px;" class="pull-right"
                                                       href="{{asset('wishlist/destroy/'.$wishlist->id)}}">X
                                                    </a>
                                                </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    @endif
                </div>
            </div> <!-- .beta-products-list -->
        </div>
    </div>
@stop
