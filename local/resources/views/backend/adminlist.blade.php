@extends('backend.master')
@section('title','Quản lí thành viên quản trị')
@section('main')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách thành viên</h1>
            </div>
        </div><!--/.row-->
        @include('errors.note')
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="widget-content nopadding">
                    @if(Auth::guard('admin')->user()->level==1)
                        <a style="margin-bottom: 10px" href="{{asset('admin/add')}}" class="btn btn-primary">Thêm nhân
                            viên</a>
                    @endif
                    <table class="table table-bordered" id="myTable">
                        <thead>
                        <tr>
                            <th class="text-center" style="background: #eee">ID</th>
                            <th class="text-center" style="background: #eee">Họ Tên</th>
                            <th class="text-center" style="background: #eee">Email</th>
                            <th class="text-center" style="background: #eee">Số điện thoại</th>
                            <th class="text-center" style="background: #eee">Chức vụ</th>
                            <th class="text-center" style="background: #eee">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($admins as $admin)
                            <tr>
                                <td>{{ $admin->id }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->phone_number }}</td>
                                <td> @if($admin->level==1 &&$admin->id==1)Super Admin @elseif($admin->level==1 &&$admin->id!=1)Admin @elseif($admin->level==2)Nhân
                                    viên @endif</td>
                                <td>
                                    <a href="{{asset('admin/edit/'.$admin->id)}}"
                                       class="btn btn-warning"><span
                                                class="glyphicon glyphicon-edit"></span></a>
                                    <a href="{{asset('admin/delete/'.$admin->id)}}"
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