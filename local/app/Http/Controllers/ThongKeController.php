<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Color;
use App\Size;
use App\Product;
use App\ProductSpecifi;
use App\Category;
use DB;
use App\User;
use App\OrderProduct;
use DateTime;
use Carbon\Carbon;

class ThongKeController extends Controller
{
    public function thongKeOrder()
    {
        $data['status'] = count(Order::all());
        $data['status0'] = count(Order::where('status', 0)->get());
        $data['status1'] = count(Order::where('status', 1)->get());
        $data['status2'] = count(Order::where('status', 2)->get());
        $data['status3'] = count(Order::where('status', 3)->get());
        $data['prices'] = DB::table('orders')->orderby('total', 'desc')->take(5)->get();
        $data['users'] = User::all();
        $data['orders'] = Order::all();
        $data['products'] = Product::all();

//        foreach (Order::all() as $order) {
//            if ($order->user_id != null) {
//            }
//        }
        $data['orderusers'] = DB::table('orders')
            ->select('users.id', \DB::raw("COUNT('orders.id') AS order_count"))
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->orderBy('order_count', 'desc')
            ->groupBy('users.id')
            ->take(5)
            ->get();
        return view('backend.thongkeorder', $data);
    }

    public function thongKeProduct()
    {
        $data['products'] = DB::table('products')->
        join('categories', 'products.prod_cate', '=', 'categories.cate_id')->get();

//SP ban chay
        $data['productmosts'] = DB::table('order_product')
            ->select('products.prod_id', DB::raw('SUM(order_product.qty) as order_count'))
            ->join('products', 'products.prod_id', '=', 'order_product.product_id')
            ->orderBy('order_count', 'desc')
            ->groupBy('products.prod_id')
//            ->paginate(2);
            ->take(5)
            ->get();

//Sp con it
        $data['productless'] = DB::table('prod_specifi')
            ->select('products.prod_id', DB::raw('SUM(prod_specifi.quantity) as order_count'))
            ->join('products', 'products.prod_id', '=', 'prod_specifi.product_id')
            ->orderBy('order_count', 'asc')
            ->groupBy('products.prod_id')
//            ->paginate(2);
            ->take(5)
            ->get();
//        dd($data);

        return view('backend.thongkeproduct', $data);
    }

    public function thongKeDoanhThu()
    {
        $data['totalToday'] = 0;
        $data['totalweek'] = 0;
        $data['totalmonth'] = 0;
        $data['totalyear'] = 0;
        $data['day7'] = Carbon::now()->subDays(7)->toDateString();
        $data['day1'] = Carbon::now()->subDays(1)->toDateString();
        //ngay cach 7
        for ($i = 1; $i <= 7; $i++) {

            $data['dayweek'] = Carbon::now()->subDays($i)->toDateString();
            $data['orderweek'] = DB::table('orders')->whereDate('created_at', $data['dayweek'])->get();
            foreach ($data['orderweek'] as $ordertoday) {
                $data['totalweek'] = $data['totalweek'] + $ordertoday->total;
            }

        }

        $data['today'] = Carbon::now()->toDateString(); // same as ->format('Y-m-d');
        $data['ordertoday'] = DB::table('orders')->whereDate('created_at', $data['today'])->get();
        foreach ($data['ordertoday'] as $ordertoday) {
            $data['totalToday'] = $data['totalToday'] + $ordertoday->total;
        }

        $data['thismonth'] = Carbon::now()->format('m');
        $data['ordermonth'] = DB::table('orders')->whereMonth('created_at', $data['thismonth'])->get();
        foreach ($data['ordermonth'] as $ordertoday) {
            $data['totalmonth'] = $data['totalmonth'] + $ordertoday->total;
        }

        for ($j = 1; $j <= $data['thismonth']; $j++) {
            $data['totaleachmonth' . $j] = 0;
            $data['ordereachmonth' . $j] = DB::table('orders')->whereMonth('created_at', $j)->get();
            foreach ($data['ordereachmonth' . $j] as $ordertoday) {
                $data['totaleachmonth' . $j] = $data['totaleachmonth' . $j] + $ordertoday->total;
            }

        }

        return view('backend.thongkedoanhthu', $data);
    }
}
