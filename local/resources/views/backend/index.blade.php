@extends('backend.master')
@section('title','Trang chủ quản trị')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div style="height: 40px"></div>
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-4">
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked clipboard with paper">
                                <use xlink:href="#stroked-clipboard-with-paper"/>
                            </svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <a href="{{asset('admin/product')}}">
                                <div class="large">{{$product}}</div>
                                <div class="text-muted">Sản phẩm</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-4">
                <div class="panel panel-red panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked app-window-with-content">
                                <use xlink:href="#stroked-app-window-with-content"></use>
                            </svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <a href="{{asset('admin/category')}}">
                                <div class="large">{{$cate}}</div>
                                <div class="text-muted">Danh mục</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4">
                <div class="panel panel-teal panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked bag">
                                <use xlink:href="#stroked-bag"></use>
                            </svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <a href="{{asset('admin/order')}}">
                                <div class="large">{{$order}}</div>
                                <div class="text-muted">Đơn hàng</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-red">
                    <div class="panel-heading dark-overlay">
                        <svg class="glyph stroked calendar">
                            <use xlink:href="#stroked-calendar"></use>
                        </svg>
                        Lịch
                    </div>
                    <div class="panel-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div><!--/.col-->
        </div><!--/.row-->
    </div>    <!--/.main-->
@stop