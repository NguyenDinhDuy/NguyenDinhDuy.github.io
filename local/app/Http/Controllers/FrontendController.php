<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use App\Product;
use Auth;
use App\User;
use App\Category;
use DB;
use App\Color;
use App\Size;
use App\ProdSpecifi;
use App\Order;
use App\History;

class FrontendController extends Controller
{
    public function getHome()
    {
        $data['featured'] = Product::where('prod_featured', 1)->take(4)->get();
        $data['new'] = Product::orderBy('prod_id', 'desc')->take(4)->get();
        return view('frontend.index', $data);
    }

    public function getEditUser()
    {
        if (Auth::check()) {
            $user_curent_login = Auth::user()->id;
            $data['user'] = User::find($user_curent_login);
        } else {
            return back();
        }
        return view('frontend.profile', $data);
    }

    public function postEditUser(Request $request)
    {
        $user_curent_login = Auth::user()->id;
        $user = User::find($user_curent_login);
        if ($request->password) {
            $this->validate($request,
                [
                    'newpassword' => 'min:5',
                    'newpassword_confirmation' => 'same:newpassword'
                ],
                [
                    'newpassword.min' => 'Mật khẩu phải có ít nhất 5 kí tự',
                    'newpassword_confirmation.same' => 'Mật khẩu xác nhận không đúng'
                ]);
            $user->password = bcrypt($request->newpassword);
        }
        $user->save();
        return redirect()->intended('/');
    }

    public function getCategory(Request $request, $id)
    {
        $data['items'] = Product::where('prod_cate', $id)->orderby('prod_id', 'desc')->paginate(3);
//        $data['id'] = $id;
        $data['cate'] = Category::find($id);
        return view('frontend.product_type', $data);
    }

    public function search(Request $request)
    {
        $value = $request->search;
        $data['keyword'] = $value;
        $value = str_replace(' ', '%', $value);
        $data['products'] = Product::where('prod_name', 'like', '%' . $value . '%')
            ->orWhere('prod_code', 'like', '%' . $value . '%')
            ->orderBy('prod_id', 'asc')->paginate(6);
        return view('frontend.search', $data);
    }

    public function getQuanProduct($id, $color, $size)
    {
        $data = DB::table('prod_specifi')->where('prod_specifi.product_id', '=', $id)
            ->where('prod_specifi.prod_color_id', '=', $color)
            ->where('prod_specifi.prod_size_id', '=', $size)
            ->select('quantity', 'image')
            ->get();
        return ($data);
    }

    public function getDetailProduct(Request $request, $id)
    {

        $data['productspecifi'] = DB::table('prod_specifi')->where('product_id', $id)->get();
        $data['colorspecifi'] = DB::table('prod_specifi')->where('prod_specifi.product_id', '=', $id)
            ->leftjoin('prod_color', 'prod_specifi.prod_color_id', '=', 'prod_color.color_id')
            ->select([DB::RAW('DISTINCT(color_id)'), 'prod_color.*'])
            ->get();
        $data['sizespecifi'] = DB::table('prod_specifi')->where('prod_specifi.product_id', '=', $id)
            ->leftjoin('prod_size', 'prod_specifi.prod_size_id', '=', 'prod_size.size_id')
            ->select([DB::RAW('DISTINCT(size_id)'), 'prod_size.*'])
            ->get();

        $data['item'] = Product::find($id);
        $data['images'] = DB::table('images')->where('product_id', $id)->get();
//        $data['title'] = Product::find($id)->prod_name;
        $data['colorlist'] = Color::all();
        $data['sizelist'] = Size::all();
        $data['items'] = Product::orderByRaw('RAND()')->take(4)->get();
        return view('frontend.product', $data);
    }

    public function getSuccess($id)
    {
        $data['code'] = $id;
        return view('frontend.success', $data);
    }

    public function history()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $histories = History::where("user_id", "=", $user->id)->orderby('id', 'desc')->get();
            $orders = Order::all();
            return view('frontend.history', compact('user', 'histories', 'orders'));
        }
// else {
//            return \Response::view('frontend.404', array(), 404);
//        }
    }

    public function detailorder($id)
    {
        $data['colorlist'] = Color::all();
        $data['sizelist'] = Size::all();
        $data['order'] = Order::findOrFail($id);
        return view('frontend.detailorder', $data);
    }

    public function getOrderSearch()
    {
        return view('frontend.ordersearch');
    }

    public function searchBill(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);

        $data = DB::table('orders')->where('bill_code', $request->code)->get();

        return ($data);
    }

    public function sortAsc($id)
    {

        $data['items'] = Product::where('prod_cate', $id)->orderby('promotion_price', 'asc')->paginate(3);
        $data['cate'] = Category::find($id);
        return view('frontend.product_type', $data);
    }

    public function sortDesc($id)
    {
        $data['items'] = Product::where('prod_cate', $id)->orderby('promotion_price', 'desc')->paginate(3);
        $data['cate'] = Category::find($id);
        return view('frontend.product_type', $data);
    }
}
