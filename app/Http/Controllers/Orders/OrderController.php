<?php

namespace App\Http\Controllers\Orders;

use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function orderList()
    {
        $orders = DB::table('orders')->paginate();

        return view('order.lists', compact('orders'));
    }

    public function order($id)
    {
        dd(DB::table('orders')->whereId($id)->first());
    }
}
