<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use App\Color;
use App\Size;
use App\Order;
use App\Http\Requests\CheckoutRequest;
use App\OrderProduct;
use DB;
use Mail;
use App\Mail\OrderPlaced;
use App\History;
use App\City;
use App\District;
use App\Coupon;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::find($request->prod_id);
        Cart::add(['id' => $product->prod_id, 'name' => $product->prod_name, 'qty' => $request->qty, 'price' => $product->promotion_price,
            'options' => ['size' => $request->size, 'color' => $request->color, 'img' => $request->img, 'slmax' => $request->slmax]]);
        return redirect('cart/show');

    }

    public function getShowCart()
    {

        $data['items'] = Cart::content();
        $data['colorlist'] = Color::all();
        $data['sizelist'] = Size::all();
        return view('frontend.shopping_cart', $data);
    }

    public function getUpdateCart(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
    }

    public function getDeleteCart($id)
    {
        if ($id == 'all') {
            Cart::destroy();
        } else {
            Cart::remove($id);
        }
        return back();
    }

    public function pay()
    {
        $data['items'] = Cart::content();
        $data['colorlist'] = Color::all();
        $data['sizelist'] = Size::all();
        $data['cities'] = DB::table('cities')->pluck("name", "id")->all();
        return view('frontend.checkout', $data);

    }

    public function selectAjax(Request $request)
    {
        if ($request->ajax()) {
            $districts = DB::table('districts')->where('city_id', $request->city_id)->pluck("name", "id")->all();
            $data = view('frontend.ajax-select', compact('districts'))->render();
            return response()->json(['options' => $data]);
        }
    }

    public function checkout(CheckoutRequest $request)
    {
        foreach (City::all() as $city) {
            if ($city->id == $request->city_id) {
                $tinh = $city->name;
            }
        }
        foreach (District::all() as $district) {
            if ($district->id == $request->district_id) {
                $huyen = $district->name;
            }
        }

        $discount = session()->get('coupon')['discount'] ?? 0;

        $code = session()->get('coupon')['name'] ?? null;

        $total = 0;
        $ship = 0;
        foreach (Cart::content() as $value) {
            $total = $total + $value->price * $value->qty;
        }


        if ($total > 1000000) {
            $newTotal = $total - $discount;
            $ship = 0;
        } else {
            $newTotal = $total + 20000 - $discount;
            $ship = 20000;
        }

        $order = new Order;
        $order->user_id = auth()->user() ? auth()->user()->id : null;
        $order->bill_email = $request->email;
        $order->bill_code = rand(100000, 999999);
        $order->bill_name = $request->name;
        $order->bill_payment = $request->payment_method;
        $order->bill_phone = $request->phone;
        $order->bill_discount = $discount;
        $order->bill_discount_code = $code;
        $order->address = $request->address . ' - ' . $huyen . ' - ' . $tinh;
        $order->status = 0;
        $order->subtotal = $total;
        $order->ship_price = $ship;
        $order->total = $newTotal;
        $order->bill_note = $request->note;
        $order->save();

        foreach (Cart::content() as $cart) {
            $options = $cart->options->toArray();
            $order->products()->attach($cart->id, ['qty' => $cart->qty, 'price' => $cart->price, 'options' => serialize($options)]);

            $qty = DB::table('prod_specifi')->select('quantity')->where([
                ['product_id', '=', $cart->id],
                ['prod_color_id', '=', $cart->options->color],
                ['prod_size_id', '=', $cart->options->size],
            ])->get();
            $qtyNow = $qty->toArray();
            $newqty = $qtyNow[0]->quantity - $cart->qty;

            DB::table('prod_specifi')
                ->where([
                    ['product_id', '=', $cart->id],
                    ['prod_color_id', '=', $cart->options->color],
                    ['prod_size_id', '=', $cart->options->size],
                ])
                ->update(array('quantity' => $newqty));

        }

        if (auth()->check()) {
            $history = new History;
            $history->order_id = $order->id;
            $history->user_id = auth()->user()->id;
            $history->save();
        }

        Mail::send(new OrderPlaced($order));

        Cart::destroy();
        DB::table('coupons')->where('code', '=', $code)->delete();
        session()->forget('coupon');
        return redirect()->route('success', $order->bill_code)->with('success', "Đặt hàng thành công! Đang chờ xử lý đơn hàng");

    }
}
