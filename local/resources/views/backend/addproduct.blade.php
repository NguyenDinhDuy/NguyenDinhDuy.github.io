@extends('backend.master')
@section('title','Thêm mới sản phẩm')
@section('main')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">Thêm sản phẩm</div>
                    <div class="panel-body">
                        @include('errors.note')
                        <form method="post" enctype="multipart/form-data">
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input required type="text" name="name" class="form-control" value="{{old('name')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Mã sản phẩm</label>
                                        <input required type="text" name="code" class="form-control" value="{{old('code')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Giá sản phẩm</label>
                                        <input required type="number" name="price" class="form-control" min="0" value="{{old('price')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Giá khuyến mãi</label>
                                        <input required type="number" name="promotion" class="form-control" min="0" value="{{old('promotion')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh sản phẩm</label>
                                        <input required type="file" name="img" class="img form-control hidden"
                                               onchange="changeImg(this)">
                                        <img class="thumbnail avatar" width="120px" height="120px"
                                             src="img/new_seo-10-512.png">
                                    </div>

                                    <div style="border:2px solid #ccc;padding:10px 2px;" class="form-group">
                                        <label>Ảnh chi tiết sản phẩm</label>
                                        <input required type="file" name="image[]" multiple="multiple">
                                    </div>

                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea class="ckeditor" required name="description"></textarea>
                                        <script required type="text/javascript">
                                            var editor = CKEDITOR.replace('description', {
                                                language: 'vi',
                                                filebrowserImageBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Images',
                                                filebrowserFlashBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Flash',
                                                filebrowserImageUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                filebrowserFlashUploadUrl: '../../editor/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        <select name="cate" class="form-control">
                                            <option value="0">Chọn danh mục</option>
                                            @foreach($catelist as $cate)
                                                <option value="{{$cate->cate_id}}">{{$cate->cate_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sản phẩm nổi bật</label><br>
                                        Có: <input required type="radio" name="featured" value="1">
                                        Không: <input required type="radio" name="featured" value="0">
                                    </div>
                                    <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                                    <a href="{{asset('admin/product')}}" class="btn btn-danger">Hủy bỏ</a>
                                </div>

                                {{--Thông tin chi tiết sản phẩm--}}
                                <div class="col-lg-6" style="border: 1px solid #666">
                                    <div class="panel-heading">Thuộc tính sản phẩm</div>
                                    <script>

                                        function addRow() {
                                            $("#myTable").append("<tr>\n" +
                                                // "                                                        <td>" + i + "</td>\n" +
                                                "                                                        <td>\n" +
                                                "                                                        <select required name=\"color[]\">\n" +
                                                "                                                        <option value=\"0\">Màu</option>\n" +
                                                "                                                            @foreach($colorlist as $color)\n" +
                                                "                                                        <option value=\"{{$color->color_id}}\">{{$color->value}}</option>\n" +
                                                "                                                            @endforeach\n" +
                                                "                                                        </select>\n" +
                                                "                                                        </td>\n" +
                                                "                                                        <td>\n" +
                                                "                                                        <select required name=\"size[]\">\n" +
                                                "                                                        <option value=\"0\">Size</option>\n" +
                                                "                                                            @foreach($sizelist as $size)\n" +
                                                "                                                        <option value=\"{{$size->size_id}}\">{{$size->value}}</option>\n" +
                                                "                                                            @endforeach\n" +
                                                "                                                        </select>\n" +
                                                "                                                        <td>\n" +
                                                "                                                        <input required  type=\"file\" name=\"imgspe[]\"\n" +
                                                "                                                class=\"form-control hidden img\"\n" +
                                                "                                                    onchange=\"changeImg(this)\">\n" +
                                                "                                                        <img  class=\"thumbnail avatar\" width=\"64px\"\n" +
                                                "                                                    src=\"img/new_seo-10-64.png\">\n" +
                                                "                                                        </td>\n" +
                                                "                                                        <td><input name=\"quanti[]\" required type=\"number\" min=\"1\"></td>\n" +
                                                "\t\t\t\t\t\t\t\t\t                    </tr>")

                                            $('.avatar').off('click').click(function () {

                                                $(this).prev().click();
                                            });
                                        };

                                        function deleteTr() {
                                            var table = document.getElementById("myTable");
                                            table.deleteRow(table.rows.length - 1);
                                        }

                                    </script>

                                    <table class="table table-bordered" style="margin-top:20px;" id="myTable"
                                           border="1px solid #666">
                                        <thead>
                                        <tr class="bg-primary">
                                            <th>Màu</th>
                                            <th>Size</th>
                                            <th>Ảnh sản phẩm</th>
                                            <th>Số lượng</th>
                                        </tr>
                                        </thead>
                                    </table>
                                    <div>
                                        <a href="javascript: addRow()"
                                           class="btn btn-primary"><span
                                                    class="glyphicon glyphicon-plus"></span></a>
                                        <a href="javascript: deleteTr()"
                                           class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                    </div>
                                </div>
                            </div>
                            {{csrf_field()}}
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>    <!--/.main-->
@stop




























