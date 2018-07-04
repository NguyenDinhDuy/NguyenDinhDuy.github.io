@extends('backend.master')
@section('title','Sửa sản phẩm')
<style>
    .detail-image {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        /*grid-gap: 10px;*/
        /*margin-top: 10px;*/
        /*padding-top: 10px;*/
        /*border-top: 1px solid #ccc;*/

    }

    .image-thumb {
        display: flex;
        align-items: center;
        /*border: 1px solid lightgray;*/
        cursor: pointer;
    }
</style>

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
                    <div class="panel-heading">Sửa thông tin sản phẩm</div>
                    <div class="panel-body">
                        @include('errors.note')
                        <form method="post" enctype="multipart/form-data">
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input required type="text" name="name" class="form-control"
                                               value="{{$product->prod_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Mã sản phẩm</label>
                                        <input required type="text" name="code" class="form-control"
                                               value="{{$product->prod_code}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Giá sản phẩm</label>
                                        <input required type="number" name="price" class="form-control" min="0"
                                               value="{{$product->prod_price}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Giá khuyến mãi</label>
                                        <input required type="number" name="promotion" class="form-control" min="0"
                                               value="{{$product->promotion_price}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh sản phẩm</label>
                                        <input type="file" name="img" class="img form-control hidden"
                                               onchange="changeImg(this)">
                                        <img class="avatar thumbnail" width="120px" height="120px"
                                             src="{{asset('local/storage/app/avatar/'.$product->prod_thumbnail)}}">
                                    </div>

                                    <p style="font-weight: bold">Ảnh chi tiết sản phẩm</p>
                                    <div style="border:2px solid #c0c0c0;padding:5px 5px;"
                                         class="detail-image form-group">
                                        @foreach($images as $image)

                                            <div style="position: relative;text-align: center">
                                                {{--<input type="file" name="imagedetail[]"--}}
                                                {{--class="image-thumb form-control hidden"--}}
                                                {{--onchange="changeImg(this)">--}}
                                                <img class="avatar thumbnail" width="80px" height="80px"
                                                     src="{{asset('local/storage/app/avatar/'.$image->path)}}">
                                                <div style="position: absolute;top: 1%;left: 50%">
                                                    <a style="color:#8c8c8c" href="{{asset('admin/delete/image/'.$image->id)}}">x</a></div>
                                            </div>
                                            <input type="hidden" name="imgOld[]" value="{{$image->path}}">
                                        @endforeach

                                        <input type="file" name="image1[]" class="form-control" multiple="multiple">
                                    </div>

                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea class="ckeditor" required
                                                  name="description">{{$product->prod_description}}</textarea>
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
                                        <select required name="cate" class="form-control">
                                            <option>Chọn danh mục</option>
                                            @foreach($catelist as $cate)
                                                <option value="{{$cate->cate_id}}"
                                                        @if($product->prod_cate==$cate->cate_id) selected @endif>{{$cate->cate_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sản phẩm nổi bật</label><br>
                                        Có: <input type="radio" name="featured" value="1"
                                                   @if($product->prod_featured==1) checked @endif>
                                        Không: <input type="radio" name="featured" value="0"
                                                      @if($product->prod_featured==0) checked @endif>
                                    </div>
                                    <input type="submit" name="submit" value="Cập nhật" class="btn btn-primary">
                                    <a href="{{asset('admin/product')}}" class="btn btn-danger">Hủy bỏ</a>
                                </div>
                                <input type="hidden" name="proid" value="{{$product->prod_id}}">
                                <div class="col-lg-6" style="border: 1px solid #666">
                                    <div class="panel-heading">Thuộc tính sản phẩm</div>
                                    <script>

                                        function addRow() {
                                            $("#myTable").append("<tr>\n" +
                                                // "                                                        <td>" + i + "</td>\n" +
                                                "                                                        <td>\n" +
                                                "                                                        <select required name=\"color1[]\">\n" +
                                                "                                                        <option value=\"0\">Màu</option>\n" +
                                                "                                                            @foreach($colorlist as $color)\n" +
                                                "                                                        <option value=\"{{$color->color_id}}\">{{$color->value}}</option>\n" +
                                                "                                                            @endforeach\n" +
                                                "                                                        </select>\n" +
                                                "                                                        </td>\n" +
                                                "                                                        <td>\n" +
                                                "                                                        <select required name=\"size1[]\">\n" +
                                                "                                                        <option value=\"0\">Size</option>\n" +
                                                "                                                            @foreach($sizelist as $size)\n" +
                                                "                                                        <option value=\"{{$size->size_id}}\">{{$size->value}}</option>\n" +
                                                "                                                            @endforeach\n" +
                                                "                                                        </select>\n" +
                                                "                                                        <td>\n" +
                                                "                                                        <input required  type=\"file\" name=\"imgspe1[]\"\n" +
                                                "                                                class=\"form-control hidden img\"\n" +
                                                "                                                    onchange=\"changeImg(this)\">\n" +
                                                "                                                        <img  class=\"thumbnail avatar\" width=\"64px\"\n" +
                                                "                                                    src=\"img/new_seo-10-64.png\">\n" +
                                                "                                                        </td>\n" +
                                                "                                                        <td><input name=\"quanti1[]\" required type=\"number\" min=\"0\"></td>\n" +
                                                "\t\t\t\t\t\t\t\t\t                    </tr>")

                                            $('.avatar').off('click').click(function () {
                                                $(this).prev().click();
                                            });
                                        };

                                        function deleteTr() {

                                            var table = document.getElementById("myTable");
                                            table.deleteRow(table.rows.length - 1);
                                            {{asset('admin/product/search/')}}
                                            $.get(
                                                '{{asset('admin/product/search')}}',
                                                function () {
                                                    location.reload();
                                                }
                                            );
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
                                        <tbody>
                                        @foreach($productspecifi as $prodspe)
                                            <tr>
                                                <td>
                                                    <select name="color[]">
                                                        @foreach($colorlist as $color)
                                                            <option value="{{$color->color_id}}"
                                                                    @if($prodspe->product_id==$product->prod_id&&$prodspe->prod_color_id==$color->color_id) selected @endif>{{$color->value}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="colorOld[]"
                                                           value="{{$prodspe->prod_color_id }}">
                                                </td>
                                                <td>
                                                    <select name="size[]">
                                                        @foreach($sizelist as $size)
                                                            <option value="{{$size->size_id}}"
                                                                    @if($prodspe->product_id==$product->prod_id&&$prodspe->prod_size_id==$size->size_id) selected @endif>{{$size->value}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="sizeOld[]"
                                                           value="{{$prodspe->prod_size_id }}">
                                                <td>
                                                    <input type="file" name="imgspe[]"
                                                           class="img form-control hidden"
                                                           onchange="changeImg(this)">
                                                    <img class="avatar thumbnail" width="64px"
                                                         src="{{asset('local/storage/app/avatar/'.$prodspe->image)}}">
                                                    <input type="hidden" name="imageOld[]" value="{{$prodspe->image }}">
                                                </td>
                                                <td>
                                                    <input name="quanti[]" type="number" min="0"
                                                           value="{{$prodspe->quantity}}">
                                                    <input type="hidden" name="quantiOld[]"
                                                           value="{{$prodspe->quantity }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
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
