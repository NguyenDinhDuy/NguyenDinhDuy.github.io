@extends('backend.master')
@section('title','Sửa danh mục màu sắc')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa thông tin màu sắc</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-5 col-lg-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Sửa thông tin màu sắc
                    </div>
                    <div class="panel-body">
                        @include('errors.note')
                        <form method="post">
                            <div class="form-group">
                                <label>Tên màu sắc:</label>
                                <input type="text" name="name" class="form-control" placeholder="Tên màu sắc..."
                                       value="{{$color->value}}">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="form-control btn btn-primary"
                                       placeholder="Tên màu sắc..." value="Sửa">
                            </div>
                            <div class="form-group">
                                <a href="{{asset('admin/color')}}" class="form-control btn btn-danger">Hủy bỏ</a>
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>    <!--/.main-->
@stop