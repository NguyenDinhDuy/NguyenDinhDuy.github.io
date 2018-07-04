@extends('frontend.master')
@section('title','Tra cứu đơn hàng')
@section('main')

    <script language="javascript">

        $(document).ready(function () {
            $(document).on('click', '#search', function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('searchbill')}}",
                    type: "get",
                    dataType: "json",
                    data: {code: $('#code').val()},
                    success: function (result) {
                        if (!$.trim(result)) {
                            var code = $('#code').val();
                            $('#link').html("");
                            $('#td2').html("");
                            $('#td3').html("Không tìm thấy đơn hàng: " + code);
                            $('#td4').html("");
                            $('#td5').html("");
                            $('#code').val("");
                        } else {

                            if (result[0].status == 0) {

                                $('#link').html(result[0].bill_code);
                                $('#td2').html(result[0].created_at);
                                $('#td3').html(result[0].bill_name);
                                $('#td4').html(result[0].total).append(" đ");
                                $('#td5').html("Chưa kiểm tra");
                                $('#code').val("");
                            } else if (result[0].status == 1) {

                                $('#link').html(result[0].bill_code);
                                $('#td2').html(result[0].created_at);
                                $('#td3').html(result[0].bill_name);
                                $('#td4').html(result[0].total).append(" đ");
                                $('#td5').html("Đang vận chuyển");
                                $('#code').val("");
                            } else if (result[0].status == 2) {

                                $('#link').html(result[0].bill_code);
                                $('#td2').html(result[0].created_at);
                                $('#td3').html(result[0].bill_name);
                                $('#td4').html(result[0].total).append(" đ");
                                $('#td5').html("Giao hàng thành công");
                                $('#code').val("");
                            } else if (result[0].status == 3) {

                                $('#link').html(result[0].bill_code);
                                $('#td2').html(result[0].created_at);
                                $('#td3').html(result[0].bill_name);
                                $('#td4').html(result[0].total).append(" đ");
                                $('#td5').html("Giao hàng thất bại");
                                $('#code').val("");
                            }
                            let url = '{{asset('detailorder/')}}';
                            <?php
                            if(Auth::check()){
                            ?>
                            $("#link").attr('href', url + '/' + result[0].id);
                            <?php
                            } ?>

                        }
                    }
                });
            });
        })
        ;
    </script>


    <div style="margin-top: 100px;margin-bottom: 50px" class="container text-center">
        <p style="font-weight: bold;font-size: 28px;margin-bottom: 30px">TRA CỨU ĐƠN HÀNG</p>
        <i style="font-size: 16px;margin-top: 30px">Hãy nhập<strong> Mã đơn hàng</strong> để tra cứu tình trạng đơn hàng
            của bạn nhé</i>
        <div>
            <form id="searchform">
                <input required id="code" type="number" width="300px" height="100px"
                       style="margin-top: 30px;width: 580px;height: 50px;font-size: 16px;margin-left: -200px;padding-left: 10px;"
                       name="code"
                       placeholder="Nhập mã đơn hàng để kiểm tra">

                <button id="search"
                        style="margin-top:5px;font-weight:bold;color: #fff;background: #F37021;height: 50px;margin-left: -200px;width: 580px;border: none;font-size: 16px;">
                    Kiểm tra
                </button>
            </form>
        </div>
    </div>

    <table id="table" class="text-center" style="margin-left:160px;border: 1px solid #666">
        <thead>
        <th style="padding:15px 40px;background: #eee;border: 1px solid #666">Mã đơn hàng</th>
        <th style="padding:15px 50px;background: #eee;border: 1px solid #666">Ngày đặt</th>
        <th style="padding:15px 80px;background: #eee;border: 1px solid #666">Tên khách hàng</th>
        <th style="padding:15px 50px;background: #eee;border: 1px solid #666">Tổng tiền thanh toán</th>
        <th style="padding:15px 60px;background: #eee;border: 1px solid #666">Trạng thái</th>
        </thead>
        <tbody>

        <tr>
            <td id="td1" class="text-center"
                style="border:1px solid #666;padding-left:5px;font-weight: bold;">
                <a style="color:#E32124;" id="link"></a>

            </td>
            <td id="td2" class="text-center" style="border:1px solid #666;font-weight: bold"></td>
            <td id="td3" class="text-center" style="border:1px solid #666;font-weight: bold"></td>
            <td id="td4" class="text-center" style="border:1px solid #666;font-weight: bold"></td>
            <td id="td5" class="text-center" style="padding-right:5px;border:1px solid #666;font-weight: bold"></td>
        </tr>

        </tbody>
    </table>


    <div style="font-family:Arial;margin-left: 360px;margin-bottom: 100px;margin-top: 100px">
        <div style="font-family:Arial;margin-top: 50px"><span><i style="font-size:20px;color: orangered;"
                                                                 class="fa fa-lightbulb-o"></i></span> Chú
            thích trạng thái đơn hàng:
        </div>
        <div style="font-family:Arial; padding-top:10px;font-weight: bold;font-size: 12px"><span
                    style="font-family:Arial;color: blue">- Chưa xác nhận:</span> SuHouse chưa xác nhận đơn hàng của
            bạn.
        </div>
        <div style="font-family:Arial ; padding-top: 10px;font-weight: bold;font-size: 12px"><span
                    style="font-family:Arial;color: orange">- Đang vận chuyển:</span>
            SuHouse đã xác nhận và đơn hàng của bạn đang
            trong quá trình vận chuyển
        </div>
        <div style="font-family:Arial ; padding-top: 10px;font-weight: bold;font-size: 12px"><span
                    style="font-family:Arial;color: green">- Giao hàng thành công:</span>
            SuHouse đã giao hàng thành công cho
            bạn
        </div>
        <div style="font-family:Arial; padding-top: 10px;font-weight: bold;font-size: 12px"><span
                    style="font-family:Arial;color: #E32124">- Giao hàng thất bại:</span>
            Việc giao hàng đã bị thất bại do không
            liên lạc được hoặc do một lí do khác
        </div>
    </div>
@stop