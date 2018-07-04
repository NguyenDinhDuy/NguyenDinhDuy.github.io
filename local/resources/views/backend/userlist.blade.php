@extends('backend.master')
@section('title','Quản lí danh sách khách hàng trong hệ thống')
@section('main')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách khách hàng</h1>
            </div>
        </div><!--/.row-->
        @include('errors.note')
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="widget-content nopadding">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                        <tr>
                            <th class="text-center" style="background: #eee">Họ Tên</th>
                            <th class="text-center" style="background: #eee">Email</th>
                            <th class="text-center" style="background: #eee">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{asset('admin/user/delete/'.$user->id)}}"
                                       onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng náy?')"
                                       class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop