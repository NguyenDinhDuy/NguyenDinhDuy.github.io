<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use App\Product;
use Auth;


class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $user = Auth::user();
        $wishlists = Wishlist::where("user_id", "=", $user->id)->orderby('id', 'desc')->paginate(10);
        $products = Product::all();
        return view('frontend.wishlist', compact('user', 'wishlists', 'products'));
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'user_id' => 'required',
            'product_id' => 'required',
        ));
        $status = Wishlist::where('user_id', Auth::user()->id)
            ->where('product_id', $request->product_id)
            ->first();

        if (isset($status->user_id) and isset($request->product_id)) {
            return redirect()->back()->with('message', 'Sản phẩm này đã tồn tại trong danh sách yêu thích của bạn!');

//        $status = Wishlist::where('user_id', Auth::user()->id)
//            ->where
        } else {
            $wishlist = new Wishlist;

            $wishlist->user_id = $request->user_id;
            $wishlist->product_id = $request->product_id;
            $wishlist->save();

            return redirect()->back()->with('message',
                'Đã thêm vào sản phẩm yêu thích');
        }
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return redirect()->back()
            ->with('message',
                'Sản phẩm đã được xóa');
    }
}
