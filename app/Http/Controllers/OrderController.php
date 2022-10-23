<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::orderby('id','desc')->get();
        return view('pages.orders.index')->with('orders',$orders);
    }
}
