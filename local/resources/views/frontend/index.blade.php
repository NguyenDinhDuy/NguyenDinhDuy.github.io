@extends('frontend.master')
@section('title','Trang Chủ')
@section('main')
    <div class="rev-slider">
        <div class="fullwidthbanner-container">
            <div class="fullwidthbanner">
                <div class="bannercontainer">
                    <div class="banner">
                        <ul>
                            <!-- THE FIRST SLIDE -->
                            <li data-transition="boxfade" data-slotamount="20" class="active-revslide"
                                style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined"
                                     data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined"
                                     data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined"
                                     data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined"
                                     data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined"
                                     data-oheight="undefined">
                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover"
                                         data-bgposition="center center" data-bgrepeat="no-repeat"
                                         data-lazydone="undefined" src="assets/dest/images/f2.jpg"
                                         data-src="assets/dest/images/f2.jpg"
                                         style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('assets/dest/images/f2.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>

                            </li>
                            <li data-transition="boxfade" data-slotamount="20" class="active-revslide"
                                style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined"
                                     data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined"
                                     data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined"
                                     data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined"
                                     data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined"
                                     data-oheight="undefined">
                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover"
                                         data-bgposition="center center" data-bgrepeat="no-repeat"
                                         data-lazydone="undefined" src="assets/dest/images/f1.jpg"
                                         data-src="assets/dest/images/f1.jpg"
                                         style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('assets/dest/images/f1.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>

                            <li data-transition="boxfade" data-slotamount="20" class="active-revslide"
                                style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined"
                                     data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined"
                                     data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined"
                                     data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined"
                                     data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined"
                                     data-oheight="undefined">
                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover"
                                         data-bgposition="center center" data-bgrepeat="no-repeat"
                                         data-lazydone="undefined" src="assets/dest/images/thumbs/slide.jpg"
                                         data-src="assets/dest/images/thumbs/slide.jpg"
                                         style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('assets/dest/images/thumbs/slide.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>

                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tp-bannertimer"></div>
            </div>
        </div>
        <!--slider-->
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4 class="text-center"
                                style="font-family:monospace;padding-bottom: 20px;padding-top: 20px;border-top: 1px solid #eee; border-bottom: 1px solid #eee ">
                                SẢN PHẨM HOT
                                <div style="margin-top: 10px"><img src="assets/dest/images/polo-shirt.png"></div>
                            </h4>
                            <div class="beta-products-details">
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($featured as $item)
                                    @if($item->prod_price-$item->promotion_price >0)
                                        <div class="col-sm-3">
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
                                        <div class="col-sm-3">
                                            <div class="single-item">
                                                <div class="single-item-header">
                                                    <a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}"><img
                                                                src="{{asset('local/storage/app/avatar/'.$item->prod_thumbnail)}}"
                                                        ></a>
                                                </div>
                                                <div class="single-item-body">
                                                    <div style="height: 50px;">
                                                        <a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">{{$item->prod_name}}</a>
                                                    </div>
                                                    <p class="single-item-price" style="margin-top: 15px">
                                                    <span style="font-size: 16px;color: red; font-family: Arial; font-weight: bold">{{presentPrice($item->promotion_price)}}
                                                        VNĐ</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4 class="text-center"
                                style="font-family:monospace;padding-bottom: 20px;padding-top: 20px;border-top: 1px solid #eee; border-bottom: 1px solid #eee ">
                                SẢN PHẨM MỚI
                                <div style="margin-top: 10px"><img src="assets/dest/images/polo-shirt.png"></div>
                            </h4>
                            <div class="beta-products-details">
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">

                                @foreach($new as $item)
                                    @if($item->prod_price-$item->promotion_price >0)
                                        <div class="col-sm-3">
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
                                        <div class="col-sm-3">
                                            <div class="single-item">
                                                <div class="single-item-header">
                                                    <a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">
                                                        <img src="{{asset('local/storage/app/avatar/'.$item->prod_thumbnail)}}">
                                                    </a>
                                                </div>
                                                <div class="single-item-body">
                                                    <div style="height: 50px;">
                                                        <a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">{{$item->prod_name}}</a>
                                                    </div>
                                                    <p class="single-item-price" style="margin-top: 15px">
                                                    <span style="font-size: 16px;color: red; font-family: Arial; font-weight: bold">{{presentPrice($item->promotion_price)}}
                                                        VNĐ</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div> <!-- .beta-products-list -->

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
                </div> <!-- end section with sidebar and main content -->
            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@stop