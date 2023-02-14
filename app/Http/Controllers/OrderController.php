<?php

namespace App\Http\Controllers;

use App\Models\BookingConsultion;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::orderby('id','desc')->get();
        return view('pages.orders.index')->with('orders',$orders);
    }
    public function order_consulting(){
        $bookings = BookingConsultion::wherehas('user',function($q){
            $q->where('deleted_at',null);
        })->where('paid_status','paid')->orderby('id','desc')->get();
        return view('pages.orders.booking')->with('orders',$bookings);
    }
    public function order_consulting_show($id){
        $booking = BookingConsultion::find($id);
        return view('pages.customers.order_cons')->with('order',$booking);
    }
    
}
