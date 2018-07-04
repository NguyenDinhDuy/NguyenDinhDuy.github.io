@extends('backend.master')
@section('title','Danh sách sản phẩm')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm</h1>
            </div>
        </div><!--/.row-->
        @include('errors.message')
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách sản phẩm</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <a href="{{asset('admin/product/add')}}" class="btn btn-primary">Thêm sản phẩm</a>

                                <div class="pull-right" style="margin-bottom: 10px">
                                    <form role="search" method="get" id="searchform" action="{{ route('searchprod') }}">
                                        <input type="text" value="" name="search" id="s" placeholder="Nhập từ khóa..."/>
                                        <button type="submit" id="searchsubmit">Search
                                        </button>
                                    </form>
                                </div>

                                <span style="font-family:Arial;color: #666">Sắp xếp theo: </span>
                                <select onchange="location = this.value;"
                                        style="border-color: #737373; border-radius:4px;width: 120px;height:25px;font-weight: bold;color: #666">
                                    <option style="font-family:Arial;font-weight:bold;color: #666">Mặc định</option>

                                    @foreach($catelist as $cate)
                                        <option value="{{asset('admin/product/category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}"
                                                style="font-family: Arial;color: #666">
                                            {{$cate->cate_name}}
                                        </option>
                                    @endforeach
                                </select>

                                <table id="prodlist" class="table table-hover table-bordered" style="margin-top:20px;">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th width="30%">Tên Sản phẩm</th>
                                        <th>Mã Sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th width="30%">Ảnh sản phẩm</th>
                                        <th>Danh mục</th>
                                        <th width="20%">Tùy chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($productlist as $product)
                                        <tr>
                                            <td>{{$product->prod_name}}</td>
                                            <td>{{$product->prod_code}}</td>
                                            <td>{{number_format($product->prod_price,0,',','.')}}</td>
                                            <td>
                                                <img width="150px"
                                                     src="{{asset('local/storage/app/avatar/'.$product->prod_thumbnail)}}"
                                                     class="thumbnail">
                                            </td>
                                            <td>
                                                @foreach($catelist as $cate)
                                                    @if($product->prod_cate==$cate->cate_id)
                                                        {{$cate->cate_name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{asset('admin/product/edit/'.$product->prod_id)}}"
                                                   class="btn btn-warning"><i class="fa fa-pencil"
                                                                              aria-hidden="true"></i> Sửa</a>
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')"
                                                   href="{{asset('admin/product/delete/'.$product->prod_id)}}"
                                                   class="btn btn-danger"><i class="fa fa-trash"
                                                                             aria-hidden="true"></i> Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $productlist->links() }}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>    <!--/.main-->
@stop
