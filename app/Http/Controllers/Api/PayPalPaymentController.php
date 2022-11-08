<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Consulting;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetiles;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
class PayPalPaymentController extends Controller
{
    public function handlePayment()
    {
        $carts = Cart::where('user_id',auth('api')->id())->get();
        $total = $carts->sum('price');
        $order = new Order();
        $order->user_id = auth('api')->id();
        $order->code = date('Ymd-His').rand(10,99);
        $order->payment_status = 'unpaid';
        $order->total = $total;

        $order->save();
       
        $product = [];
        $i=0;
        foreach($carts as $key=>$cart){
            $product['items'][$key]['name']= $cart->service->title;
            $product['items'][$key]['price']= $cart->service->price;
            $product['items'][$key]['desc']= $cart->service->title;
            $product['items'][$key]['qty']= 1;
            $i++;

        }
  
        $product['invoice_id'] = 1;
        $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
        $product['return_url'] = route('success.payment',$order->id);
        $product['cancel_url'] = route('cancel.payment');
        $product['total'] = $total;

        $paypalModule = new ExpressCheckout;
  
        $res = $paypalModule->setExpressCheckout($product);
        $res = $paypalModule->setExpressCheckout($product, true);
        return $res['paypal_link'];
    }
   
    public function paymentCancel()
    {
        dd('Your payment has been declend. The payment cancelation page goes here!');
    }
  
    public function paymentSuccess(Request $request,$id)
    {
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

            $order = Order::find($id);
            $order->status ='paid';
            $user = User::find($order->user_id);
            $carts = Cart::where('user_id',$user->id)->get();
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
            dd('success paid');
        }
  
        dd('Error occured!');
    }
}
