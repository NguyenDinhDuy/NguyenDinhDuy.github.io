<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;
use App\Size;
use App\Product;
use App\Category;
use App\User;
use App\Admin;
use Auth;
use App\Order;
use App\Http\Requests\AddAdminRequest;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['product'] = count(Product::all());
        $data['cate'] = count(Category::all());
        $data['color'] = count(Color::all());
        $data['size'] = count(Size::all());
        $data['order'] = count(Order::all());
        return view('backend.index', $data);
    }

    public function getList()
    {
        $data['admins'] = Admin::all();
        return view('backend.adminlist', $data);
    }

    public function getListUser()
    {
        $data['users'] = User::all();
        return view('backend.userlist', $data);
    }

    public function getDeleteAdmin($id)
    {
//        User đang đăng nhập
//        if (Auth::guard('admin')->check()
        $user_curent_login = Auth::user()->id;

//      User muốn delete
        $user_delete = Admin::find($id);
        if (($id == 1) || ($user_curent_login != 1 && $user_delete["level"] == 1)) {
            return redirect()->back()->with('error', 'Không thể xóa thành viên này');
        } else {
            $user_delete->delete($id);
            return redirect()->back()->with('error', 'Đã xóa thành viên thành công');
        }
    }

    public function getDeleteUser($id)
    {
        User::destroy($id);
        return back();
    }

    public function getEditAdmin($id)
    {
        //        User đang đăng nhập
        $user_curent_login = Auth::id();
//      User muốn delete
//        $data = User::findO($id)->toArray();
        $data = Admin::find($id);
        if (($user_curent_login != 1) && ($id == 1 || ($data["level"] == 1 && $user_curent_login != $id))) {
            return redirect()->back()->with('error', 'Không thể sửa thành viên này');
        }
        return view('backend.editadmin', ['data' => $data]);
    }

    public function postEditAdmin(Request $request, $id)
    {
        $user = Admin::find($id);
        if ($request->password) {
            $this->validate($request,
                [
                    'renewpassword' => 'same:newpassword'
                ],
                [
                    'renewpassword.same' => 'Mật khẩu xác nhận không đúng'
                ]);
            $user->password = bcrypt($request->newpassword);
        }
        if ($user["level"] == 1 && $request->level == null) {
            $user->level = 1;
        }
        if ($user["level"] == 2 && $request->level == null) {
            $user->level = 2;
        }
        if ($request->level != null) {
            $user->level = $request->level;
        }
        $user->phone_number = $request->phone;
        $user->save();
        return redirect()->intended('admin/list');
    }

    public function getAdd()
    {
        if (Auth::guard('admin')->user()->level == 1) {
            return view('backend.addadmin');
        } else {
            return redirect()->back()->with('error', 'Bạn không có quyền sử dụng chức năng này');
        }
    }

    public function postAdd(AddAdminRequest $request)
    {
        $admin = new Admin;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->name = $request->name;
        $admin->phone_number = $request->phone;
        $admin->level = 2;
        $admin->save();
        return redirect()->intended('admin/list')->with('error', 'Thêm thành công thành viên mới');
    }

}
