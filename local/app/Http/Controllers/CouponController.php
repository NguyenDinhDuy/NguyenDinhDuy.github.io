<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Cart;

class CouponController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)->first();
//        dd($request->coupon_code);
        $total = 0;
        foreach (Cart::content() as $value) {
            $total = $total + $value->price * $value->qty;
        }

        if (!$coupon) {
            return back()->with('error','Mã khuyến mãi không trùng khớp hoặc đã dược sử dụng');
        }
        session()->put('coupon', [
            'name' => $coupon->code,
            'discount' => $coupon->discount($total)
        ]);
//        dispatch_now(new UpdateCoupon($coupon));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');
        return back();
    }
}
