<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\CartResource;
use App\Models\BookingConsultion;
use App\Models\Cart;
use App\Models\Consulting;
use App\Models\Order;
use App\Models\OrderDetiles;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class CartController extends BaseController
{
    public function index(){
        $carts = Cart::where('user_id',auth('api')->id())->orderby('id','desc')->get();
        $res =  CartResource::collection($carts);
        return $this->sendResponse($res,'all carts');
    }
    public function store(Request $request){
        $validation = Validator::make($request->all(), [
            'service_id' => 'required',
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }
        $service = Service::find($request->service_id);

        

        if(!$service){
            return $this->sendError('الخدمة غير متوفرة');
        }
       

        $cart = Cart::where('user_id',auth('api')->id())->where('service_id',$service->id)->first();
        if($cart){
            $cart->delete();
        }
        $cart = new Cart();
        $cart->user_id = auth('api')->id();
        $cart->owner_id = $service->user_id;
        $cart->service_id = $service->id;
        $cart->type ='service';
        $cart->price = $service->price;
        // $cart->more_data = $data_send;
        $cart->save();
        $res = new CartResource($cart);
        return $this->sendResponse($res,'added');
    }
    public function delete($id){
        $cart = Cart::find($id);
        if(!$cart){
            return $this->sendError('يوجد خطأ ما !');
        }
        $cart->delete();
        return $this->sendResponse('delete', 'deleted succeffuly');

    }
    public function checkout(){
        $carts = Cart::where('user_id',auth('api')->id())->get();
        $total = $carts->sum('price');
        $order = new Order();
        $order->user_id = auth('api')->id();
        $order->code = date('Ymd-His').rand(10,99);
        $order->payment_status = 'paid';
        $order->total = $total;

        $order->save();
        foreach($carts as $cart){
            if($cart->type == 'service'){
                $service = Service::find($cart->service_id);
            }else{
                $service = Consulting::find($cart->service_id);
            }
            $OrderDetiles = new OrderDetiles();
            $OrderDetiles->order_id = $order->id;
            $OrderDetiles->owner_id = $service->user_id;
            $OrderDetiles->price = $service->price;
            $OrderDetiles->type = $cart->type;
            $OrderDetiles->product_id = $cart->service_id;
            $OrderDetiles->save();
            $user = User::find($OrderDetiles->owner_id);
            $user->total = $user->total + $service->price;
            $user->available = $user->available + $service->price;
            $user->save();
        }
        foreach($carts as $cart){
            $cart->delete();
        }
        return $this->sendResponse('checkout','Added succeffuly');

    }
    public function checkout_cons(Request $request){
        $validation = Validator::make($request->all(), [
            'consult_id' => 'required',
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }
        $service = Consulting::find($request->consult_id);

        if(!$service){
            return $this->sendError('الاستشارة غير متوفرة');
        }
        if($request->date == null || $request->time == null){
            return $this->sendError('اليوم والتاريخ لحجز الاستشارة مطلوب !');
        }
        if(strpos($request->time,",") !== false){
            list($d, $l) = explode(',', $request->time, 2);
        }else{
            return $this->sendError('وقت البداية والنهاية مكتوب بشكل خاطيء !');
        }
        $time = explode(',',$request->time);
        $from = $time[0];
        $to = $time[1];
        $is_exisit=  $service->date->where('day',$request->date)->where('from',$from)->where('to',$to)->first();
        if($is_exisit == null){
        return $this->sendError(' لا يوجد وقت للاستشارة متاح بهذه الاوقات يرجى التأكد من الاوقات وكتابتهم بشكل صحيح');
        }
        $date['day']=$request->date;
        $date['form']=$from;
        $date['to']=$to;
        $data_send = json_encode($date);
        $booking = new BookingConsultion();
        $booking->user_id = auth('api')->id();
        $booking->consultiong_id = $request->consult_id;
        $booking->consultiong_id = $request->consult_id;
        $booking->info = $data_send;
        $booking->price = $service->price;
        $booking->save();

        
        return $this->sendResponse($booking,'success');
    }
}
