<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Service;
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
        $cart->price = $service->price;
        $cart->save();
        $res = new CartResource($cart);
        return $this->sendResponse($res,'added');
    }
}
