<?php

namespace App\Http\Controllers\Api;

use App\GoogleMeetService;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\CartResource;
use App\Mail\ShowBookingInfo;
use App\Mail\SuccessPaymentMail;
use App\Models\BookingConsultion;
use App\Models\Cart;
use App\Models\Consulting;
use App\Models\ExtraService;
use App\Models\Order;
use App\Models\OrderDetiles;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;
use MyFatoorah\Library\PaymentMyfatoorahApiV2;
use Validator;
use Crypt;
use Srmklive\PayPal\Services\ExpressCheckout;

class CartController extends BaseController
{
    public function index(){
        $carts = Cart::where('user_id',auth('api')->id())->orderby('id','desc')->get();
        $res['item'] =  CartResource::collection($carts);
        $res['count'] = $carts->count();
        return $this->sendResponse($res,'all carts');
    }
    public function store(Request $request){
        $validation = Validator::make($request->all(), [
            'service_id' => 'required',
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages());
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
        $price_extra = 0;
        $day_extra = 0;
        
        if($request->extra_ids != null){
            $extra_ids = explode(',',$request->extra_ids);
            $data_send=[]; 
            foreach($extra_ids as $extra){
                $exx = ExtraService::find($extra);
                array_push($data_send,$exx->id);
                $day_extra += $exx->time;

                $price_extra += $exx->price;
            }
            $cart->more_data = json_encode($data_send);

        }
       
      
        $cart->price = $service->price + $price_extra;
        $cart->day = $service->time + $day_extra;

        
        $cart->save();
        $res['item'] = new CartResource($cart);
        $res['count'] = Cart::where('user_id',auth('api')->id())->count();
        return $this->sendResponse($res,'added');
    }
    public function confirm_booking($id){
        $encid = Crypt::decrypt($id);
        $order = BookingConsultion::find($encid);
        $order->booking_status = 1;
        $order->save();
        return redirect('https://sub.arabicreators.com/ConsItemRegistration/'.$order->id);

    }
    public function delete($id){
        $ids = explode(',',$id);
        $carts = Cart::whereIn('id',$ids)->get();
        foreach($carts as $c){
            $c->delete();
        }
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
            // $extra = ExtraService::whereIn($cart->more_data);
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
        return $this->sendResponse('checkout','Added succeffuly');

    }
    public function checkout_cons(Request $request){
        $validation = Validator::make($request->all(), [
            'consult_id' => 'required',
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages());
        }
        $service = Consulting::find($request->consult_id);

        if(!$service){
            return $this->sendError('الاستشارة غير متوفرة');
        }

        // if($request->date == null || $request->start_at == null || $request->end_at == null){
        //     return $this->sendError('اليوم والتاريخ لحجز الاستشارة مطلوب !');
        // }
       
        $newDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $request->date)

        ->format('Y-m-d H:i:s');
        // return $newDate;
     
       
        $data_send = json_encode($request->date);
        $booking = new BookingConsultion();
        $booking->user_id = auth('api')->id();
        $booking->code = date('Ymd-His').rand(10,99);
        $booking->consultiong_id = $request->consult_id;
        $booking->note = $request->note;
        $booking->date = $newDate;
        $booking->emails = $request->emails;
        // $booking->consultiong_id = $request->consult_id;
        $booking->info = $data_send;
        $booking->price = $service->price;
        $booking->paid_status = 'unpaid';
        $booking->paymet_method = $service->payment->title;
        $booking->meeting_app = $service->place->title;
        $booking->notifaction_after = $service->notifaction_after;
        $booking->notifaction_befor = $service->notifaction_befor;
        $booking->save();
        if($service->payment->id == 5){
        $product = [];
        $i=0;
            $product['items'][$i]['name']= $booking->consult->title;
            $product['items'][$i]['price']=$booking->consult->price;
            $product['items'][$i]['desc']= $booking->consult->title;
            $product['items'][$i]['qty']= 1;
        $product['invoice_id'] = $booking->code;
        $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
        $product['return_url'] = route('success.payment.consultion',$booking->id);
        $product['cancel_url'] = route('cancel.payment.consultion',$booking->id);
        $product['total'] = $booking->consult->price;
        $paypalModule = new ExpressCheckout;
        $res = $paypalModule->setExpressCheckout($product);
        $res = $paypalModule->setExpressCheckout($product, true);
        $ress['link']=$res['paypal_link'];
        $ress['payment_type']='paypal';
        return $this->sendResponse($ress,'return to payment link');
        }else{
            $paymentMethodId = 0; // 0 for MyFatoorah invoice or 1 for Knet in test mode

            $curlData = $this->getPayLoadData($booking->id);
            $mfobj=   new PaymentMyfatoorahApiV2(config('myfatoorah.api_key'), config('myfatoorah.country_iso'), config('myfatoorah.test_mode'));
;
            $data     = $mfobj->getInvoiceURL($curlData, $paymentMethodId);
            $ress['link']=$data['invoiceURL'];
            $ress['payment_type']='myfatoorah';
            return $this->sendResponse($ress,'return to payment link');
        }

        
        // return $this->sendResponse($ress,'return to payment link');
    }
    private function getPayLoadData($id) {

        $callbackURL = route('myfatoorah.callback',$id);
        $callerrbackURL = route('myfatoorah.errorcallback',$id);

        $booking= BookingConsultion::find($id);
        $orderId = null;
        return [
            'CustomerName'       => auth('api')->user()->first_name .' '.auth('api')->user()->last_name,
            'InvoiceValue'       => $booking->price,
            'DisplayCurrencyIso' => 'SAR',
            'CustomerEmail'      =>auth('api')->user()->email,
            'CallBackUrl'        => $callbackURL,
            'ErrorUrl'           => $callerrbackURL,
            'MobileCountryCode'  => '+'.auth('api')->user()->Country->code,
            'CustomerMobile'     => '12345678',
            'Language'           => 'en',
            'CustomerReference'  => $orderId,
            'SourceInfo'         => 'Arabicreators ' . app()::VERSION . ' - MyFatoorah Package ' . MYFATOORAH_LARAVEL_PACKAGE_VERSION
        ];
    }

    public function paymentCancel($id)
    {
        $booking = BookingConsultion::find($id);
        $booking->delete();
        dd('Your payment has been declend. The payment cancelation page goes here!');
    }
  
    public function paymentSuccess(Request $request,$id)
    {
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

            $order = BookingConsultion::find($id);
            $order->paid_status ='paid';
            $order->save();
            $user = User::find($order->user_id);
            $owner = $order->consult->user;
            $url = route('confirm-booking',encrypt($order->id));
            $startTime = Carbon::parse($order->date);
            $endTime= $startTime->addMinutes($order->consult->min);
            $email ='';

            $show_booking = 'https://sub.arabicreators.com/ConsItemRegistration/'.$order->id;
            if($order->meeting_app == 'Google Meet'){
                $googleAPI = new GoogleMeetService();
                $event = $googleAPI->createMeet($order->consult->title, $order->consult->description, $startTime, $endTime,$email);
            }

            Mail::to($user->email)->send(new SuccessPaymentMail($order->id,$show_booking));
            Mail::to($owner->email)->send(new ShowBookingInfo($url,$show_booking));
            return response()->json([
                'event' => $event,
            ]);
        
          
        return view('success_paid');
        }
  
        dd('Error occured!');
    }
}

