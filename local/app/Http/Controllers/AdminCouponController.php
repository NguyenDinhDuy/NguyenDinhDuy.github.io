<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use App\Http\Requests\AddCouponRequest;

class AdminCouponController extends Controller
{
    public function getCoupon()
    {
        $data['coupons'] = Coupon::all();
        return view('backend.coupon', $data);
    }

    public function postCoupon(AddCouponRequest $request)
    {
        $coupon = new Coupon;
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        if ($request->type == 'percent') {
            $coupon->value = null;
            $coupon->percent_off = $request->value;
        } else {
            $coupon->percent_off = null;
            $coupon->value = $request->value;
        }
        $coupon->save();
        return back()->with('message','Thêm mã giảm giá thành công');
    }

    public function getDeleteCoupon($id)
    {
        Coupon::destroy($id);
        return back()->with('message','Xóa thành công mã giảm giá');
    }
}
