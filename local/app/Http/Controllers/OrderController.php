<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Color;
use App\Size;
use DB;
use Carbon\Carbon;
class OrderController extends Controller
{
    public function index()
    {
        $data['orders'] = Order::orderBy('id', 'DESC')->paginate(5);
        return view('backend.orderlist', $data);
    }

    public function edit($id)
    {
        $data['colorlist'] = Color::all();
        $data['sizelist'] = Size::all();
        $data['order'] = Order::findOrFail($id);
        return view('backend.editorder', $data);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->intended('admin/order')->with('message', 'Cập nhật đơn hàng thành công');
    }


    public function destroy($id)
    {
        foreach (Order::findOrFail($id)->products as $product) {
            $options = unserialize($product->pivot->options);
            $odqty = $product->pivot->qty;
            $qty = DB::table('prod_specifi')->select('quantity')->where([
                ['product_id', '=', $product->prod_id],
                ['prod_color_id', '=', $options['color']],
                ['prod_size_id', '=', $options['size']],
            ])->get();

            $a = $qty->toArray();
            $newqty = $a[0]->quantity + $odqty;

            DB::table('prod_specifi')->where([
                ['product_id', '=', $product->prod_id],
                ['prod_color_id', '=', $options['color']],
                ['prod_size_id', '=', $options['size']],
            ])
                ->update(array('quantity' => $newqty));
        }
        Order::destroy($id);
        return redirect()->back()->with('message', 'Đơn hàng đã được xóa thành công');
    }

    public function filter($id)
    {
        $data['orders'] = Order::where('status', $id)->orderby('id', 'desc')->paginate(5);
        return view('backend.orderlist', $data);
    }

    public function searchorder(Request $request)
    {
        $value = $request->search;
        $value = str_replace(' ', '%', $value);
        $data['orders'] = DB::table('orders')->where('bill_code', 'like', '%' . $value . '%')
            ->orWhere('bill_name', 'like', '%' . $value . '%')
            ->orWhere('bill_email', 'like', '%' . $value . '%')
            ->orWhere('bill_phone', 'like', '%' . $value . '%')
            ->orWhere('address', 'like', '%' . $value . '%')
            ->orWhereDate('created_at', 'like', '%' . $value . '%')
            ->orderBy('id', 'desc')->paginate(5);

        return view('backend.orderlist', $data);
    }
}
