<?php

namespace App\Http\Controllers;

use App\Models\HowItWork;
use Illuminate\Http\Request;

class HowItWorkController extends Controller
{
    public function index(){
        return view('pages.howWorks.index')->with('hows',HowItWork::orderby('order','asc')->get());
    }
    public function store(Request $request){
        $order = new HowItWork();
        $order->image = $request->image->store('HowWork');
        $order->title = $request->title;
        $order->body = $request->body;
        $order->order = HowItWork::count() +1 ;
        $order->save();
        return $order;
    }
}
