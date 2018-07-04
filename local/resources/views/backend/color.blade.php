@extends('backend.master')
@section('title','Màu sắc sản phẩm')
@section('main')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách màu sắc sản phẩm</h1>
            </div>
        </div><!--/.row-->
        @include('errors.message')
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Thêm màu sắc mới
                    </div>
                    <div class="panel-body">
                        @include('errors.note')
                        <form method="post">
                            <div class="form-group">
                                <label>Tên màu mới:</label>
                                <input required type="text" name="name" class="form-control"
                                       placeholder="Tên màu mới...">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="form-control btn btn-primary"
                                       value="Thêm mới">
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách danh mục</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <table class="table table-bordered">
                                <thead>
                                <tr class="bg-primary">
                                    <th>Tên danh mục</th>
                                    <th style="width:40%">Tùy chọn</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($colorlist as $color)
                                    <tr>
                                        <td>{{$color->value}}</td>
                                        <td>
                                            <a href="{{asset('admin/color/edit/'.$color->color_id)}}"
                                               class="btn btn-warning"><span
                                                        class="glyphicon glyphicon-edit"></span> Sửa</a>
                                            <a href="{{asset('admin/color/delete/'.$color->color_id)}}"
                                               onclick="return confirm('Bạn có chắc chắn muốn xóa màu sắc náy?')"
                                               class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                                                Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>    <!--/.main-->
@stop