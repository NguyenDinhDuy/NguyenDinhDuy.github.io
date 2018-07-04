@extends('backend.master')
@section('title','Màu sắc sản phẩm')
<style>
    #div1 {
        border: 1px solid #666;
        background: red;
        border-bottom: 1px solid #ccc;
        margin-left: 20px;
        margin-top: 20px;
        height: 40px;
    }

    #div2 {
        border: 1px solid #666;
        background: green;
        border-bottom: 1px solid #ccc;
        margin-left: 20px;
        margin-top: 20px;
        height: 40px;
    }

    #div3 {
        border: 1px solid #666;
        background: orange;
        border-bottom: 1px solid #000;
        margin-left: 20px;
        margin-top: 20px;
        height: 40px;

    }

    #div4 {
        border: 1px solid #666;
        background: blue;
        border-bottom: 1px solid #ccc;
        margin-left: 20px;
        margin-top: 20px;
        height: 40px;

    }

    #div5 {
        border: 1px solid #666;
        background: brown;
        border-bottom: 1px solid #ccc;
        margin-left: 20px;
        margin-top: 20px;
        height: 40px;

    }

    #div6 {
        border: 1px solid #666;
        background: #ccc;
        border-bottom: 1px solid #ccc;
        margin-left: 20px;
        margin-top: 20px;
        height: 40px;
    }

    #div7 {
        border: 1px solid #666;
        background: violet;
        border-bottom: 1px solid #ccc;
        margin-left: 20px;
        margin-top: 20px;
        height: 40px;
    }

    #div8 {

        border: 1px solid #666;
        background: pink;
        border-bottom: 1px solid #ccc;
        margin-left: 20px;
        margin-top: 20px;
        height: 40px;
    }

    #div9 {
        border: 1px solid #666;
        background: #8E24AA;
        border-bottom: 1px solid #ccc;
        margin-left: 20px;
        margin-top: 20px;
        height: 40px;
    }

    #div10 {
        border: 1px solid #666;
        background: #263238;
        border-bottom: 1px solid #ccc;
        margin-left: 20px;
        margin-top: 20px;
        height: 40px;

    }

    #div11 {
        border: 1px solid #666;
        background: #212121;
        border-bottom: 1px solid #ccc;
        margin-left: 20px;
        margin-top: 20px;
        height: 40px;
    }

    #div12 {

        border: 1px solid #666;
        background: #f0f0f0;
        border-bottom: 1px solid #ccc;
        margin-left: 20px;
        margin-top: 20px;
        height: 40px;
    }


</style>
@section('main')

    <div style="margin-top: 20px" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

        <div class="row">
            <div class="col-xs-12 col-md=12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Thống kê doanh thu của cửa hàng SUHOUSE
                    </div>

                    <div class="panel-body">
                        <table id="prodlist" class="table table-hover table-bordered" style="margin-top:20px;">
                            <thead>
                            <tr class="bg-primary">
                                <th width="50%">Thời gian thống kê</th>
                                <th width="25%">Thời gian</th>
                                <th width="25%">Doanh thu</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="font-weight: bold">Doanh thu trong ngày hôm nay</td>
                                <td>{{$today}}</td>
                                <td>{{presentPrice($totalToday)}} đ</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold">Doanh thu trong 1 tuần gần đây</td>
                                <td>{{$day7}} -> {{$day1}}</td>
                                <td>{{presentPrice($totalweek)}} đ</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold">Doanh thu trong tháng tính đến hiện tại</td>
                                <td>Tháng {{$thismonth}}</td>
                                <td>{{presentPrice($totalmonth)}} đ</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-xs-12 col-md=12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Thống kê doanh thu các thàng cửa hàng SUHOUSE
                    </div>

                    <div class="panel-body">

                        @for ($j = 1; $j <= $thismonth; $j++)
                            <div style="border-bottom:1px solid #0c0c0c;">
                                <div id="div{{$j}}"
                                     style="width:{!! ${'totaleachmonth'.$j} /60000!!}px;">
                                    <span style="font-size:12px;color: red;margin-left: 950px">Tháng{{$j}}</span>
                                    <span style="margin-left: 950px">{!! presentPrice(${'totaleachmonth'.$j})!!}đ</span>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop