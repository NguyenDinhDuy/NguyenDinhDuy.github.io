@extends('backend.master')
@section('title','Màu sắc sản phẩm')
@section('main')

    <div style="margin-top: 20px" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-xs-12 col-md=12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Top 5 sản phẩm bán chạy nhất
                    </div>

                    <div class="panel-body">
                        <table id="prodlist" class="table table-hover table-bordered" style="margin-top:20px;">
                            <thead>
                            <tr class="bg-primary">
                                <th width="8%">Ảnh sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Mã sản phẩm</th>
                                <th>Giá</th>
                                <th>Danh mục</th>
                                <th>Số lượng bán</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                @foreach($productmosts as $productmost)
                                    @if($product->prod_id==$productmost->prod_id)
                                        <tr>
                                            <td><img width="60px" height="60px"
                                                     src="{{asset('local/storage/app/avatar/'.$product->prod_thumbnail)}}"
                                                     class="thumbnail"></td>
                                            <td>{{$product->prod_name}}</td>
                                            <td>{{$product->prod_code}}</td>
                                            <td>{{$product->promotion_price}}</td>
                                            <td>{{$product->cate_name}}</td>
                                            <td>{{$productmost->order_count}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md=12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Top 5 sản phẩm còn ít trong kho hàng
                    </div>

                    <div class="panel-body">
                        <table id="prodlist" class="table table-hover table-bordered" style="margin-top:20px;">
                            <thead>
                            <tr class="bg-primary">
                                <th width="8%">Ảnh sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Mã sản phẩm</th>
                                <th>Giá</th>
                                <th>Danh mục</th>
                                <th>Số lượng bán</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                @foreach($productless as $productles)
                                    @if($product->prod_id==$productles->prod_id)
                                        <tr>
                                            <td><img width="60px" height="60px"
                                                     src="{{asset('local/storage/app/avatar/'.$product->prod_thumbnail)}}"
                                                     class="thumbnail"></td>
                                            <td>{{$product->prod_name}}</td>
                                            <td>{{$product->prod_code}}</td>
                                            <td>{{$product->promotion_price}}</td>
                                            <td>{{$product->cate_name}}</td>
                                            <td>{{$productles->order_count}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                            {{--{{$productless->links()}}--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop