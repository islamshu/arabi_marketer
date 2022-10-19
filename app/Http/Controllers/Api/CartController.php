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
    public function store(Request $request){
        $validation = Validator::make($request->all(), [
            'service_id' => 'required',
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }
        $service = Service::find($request->service_id);
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
