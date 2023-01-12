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
use App\Http\Controllers\Api\BaseController;
use App\Mail\OrderMail;
use App\Mail\WelcomEmail;
use App\Models\ExtraService;
use App\Notifications\GeneralNotification;
use Mail;
use Notification;

class PayPalPaymentController extends BaseController
{
    public function handlePayment()
    {
        $carts = Cart::where('user_id',auth('api')->id())->get();
        if($carts->count() == 0){
            return $this->sendError('السلة فارغة');
        }
        $total = $carts->sum('price');
        $order = new Order();
        $order->user_id = auth('api')->id();
        $order->code = date('Ymd-His').rand(10,99);
        $order->payment_status = 'unpaid';
        $order->method_type ='paypal';
        $order->total = $total;
        $order->save();
        $product = [];
        $i=0;
        foreach($carts as $key=>$cart){
            $product['items'][$key]['name']= $cart->service->title;
            $product['items'][$key]['price']= $cart->price;
            $product['items'][$key]['desc']= $cart->service->title;
            $product['items'][$key]['qty']= 1;
            $i++;
        }
        $product['invoice_id'] = $order->code;
        $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
        $product['return_url'] = route('success.payment',$order->id);
        $product['cancel_url'] = route('cancel.payment');
        $product['total'] = $total;
        $paypalModule = new ExpressCheckout;
        $res = $paypalModule->setExpressCheckout($product);
        $res = $paypalModule->setExpressCheckout($product, true);
        $order->more_info=json_encode($res);
        $order->save();
        $ress['link']=$res['paypal_link'];
        $ress['payment_type']='paypal';

        return $this->sendResponse($ress,'Open Link');
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
            $order->payment_status ='paid';
            $order->save();
            $user = User::find($order->user_id);
            $date_admin = [
                'id'=>$order->id,
                'name' => 'هناك طلبية جديدة',
                'url' => route('order.show',$order->id),
                'title' => 'هناك طلبية جديدة',
                'time' => $order->updated_at
            ];
            $date_markter = [
                'id'=>$order->id,
                'name' => 'هناك طلبية جديدة',
                'url' => route('order_show',$order->id),
                'title' => 'هناك طلبية جديدة',
                'time' => $order->updated_at
            ];
            $date_user = [
                'id'=>$order->id,
                'name' => 'تم ارسال الطلبية',
                'url' => route('order_show',$order->id),
                'title' => 'تم ارسال الطبية',
                'time' => $order->updated_at
            ];
            Notification::send($user, new GeneralNotification($date_user));
            $admins = User::where('type','Admin')->get();
            Notification::send($admins, new GeneralNotification($date_admin));
            $orders = $order->orderdetiles;
            foreach($orders as $order){
                $owner = $order->owner_id;
                $seller = User::find($owner);
                Notification::send($seller, new GeneralNotification($date_markter));
            }


            $carts = Cart::where('user_id',$user->id)->get();
            foreach($carts as $cart){
                if($cart->type == 'service'){
                    $service = Service::find($cart->service_id);
                }else{
                    $service = Consulting::find($cart->service_id);
                }
                $pricc= 0;

                if(json_decode($cart->more_data) != null){

               
                $extra = ExtraService::whereIn('id',json_decode($cart->more_data))->get();
                foreach($extra as $s){
                    $pricc = $pricc + $s->price;
                }
                }
                // dd($pricc);
                $OrderDetiles = new OrderDetiles();
                $OrderDetiles->order_id = $order->id;
                $OrderDetiles->owner_id = $service->user_id;
                $OrderDetiles->price = $service->price + $pricc;
                $OrderDetiles->type = $cart->type;
                $OrderDetiles->product_id = $cart->service_id;
                $OrderDetiles->extra_data = $cart->more_data;
                $OrderDetiles->save();
                $user = User::find($OrderDetiles->owner_id);
                $user->total = $user->total + $service->price;
                $user->available = $user->available + $service->price;
                $user->save();
            }
            foreach($carts as $cart){
                $cart->delete();
            }
            $ordermail = Order::find($id);
            $userorder = User::find($ordermail->user_id);


            Mail::to($userorder->email)->send(new OrderMail($ordermail->id));
            dd('test');


        return redirect('https://sub.arabicreators.com/');
        }
  
        dd('Error occured!');
    }
}
