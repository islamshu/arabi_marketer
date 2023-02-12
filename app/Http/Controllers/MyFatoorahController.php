<?php

namespace App\Http\Controllers;

use App\Mail\ShowBookingInfo;
use App\Mail\SuccessPaymentMail;
use App\Models\BookingConsultion;
use App\Models\User;
use Mail;
use MyFatoorah\Library\PaymentMyfatoorahApiV2;

class MyFatoorahController extends Controller {

    public $mfObj;

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * create MyFatoorah object
     */
    public function __construct() {
        $this->mfObj = new PaymentMyfatoorahApiV2(config('myfatoorah.api_key'), config('myfatoorah.country_iso'), config('myfatoorah.test_mode'));
    }

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * Create MyFatoorah invoice
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        try {
            $paymentMethodId = 0; // 0 for MyFatoorah invoice or 1 for Knet in test mode

            $curlData = $this->getPayLoadData();
            $data     = $this->mfObj->getInvoiceURL($curlData, $paymentMethodId);

            $response = ['IsSuccess' => 'true', 'Message' => 'Invoice created successfully.', 'Data' => $data];
        } catch (\Exception $e) {
            $response = ['IsSuccess' => 'false', 'Message' => $e->getMessage()];
        }
        return response()->json($response);
    }

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * 
     * @param int|string $orderId
     * @return array
     */
    private function getPayLoadData($orderId = null) {
        $callbackURL = route('myfatoorah.callback');

        return [
            'CustomerName'       => 'FName LName',
            'InvoiceValue'       => '10',
            'DisplayCurrencyIso' => 'KWD',
            'CustomerEmail'      => 'test@test.com',
            'CallBackUrl'        => $callbackURL,
            'ErrorUrl'           => $callbackURL,
            'MobileCountryCode'  => '+965',
            'CustomerMobile'     => '12345678',
            'Language'           => 'en',
            'CustomerReference'  => $orderId,
            'SourceInfo'         => 'Laravel ' . app()::VERSION . ' - MyFatoorah Package ' . MYFATOORAH_LARAVEL_PACKAGE_VERSION
        ];
    }

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * Get MyFatoorah payment information
     * 
     * @return \Illuminate\Http\Response
     */
    public function callback($id) {
        try {
            $paymentId = request('paymentId');
            $data      = $this->mfObj->getPaymentStatus($paymentId, 'PaymentId');
            if ($data->InvoiceStatus == 'Paid') {
                $msg = 'Invoice is paid.';
                $order = BookingConsultion::find($id);
                $owner = $order->consult->user->email;
                $order->paid_status ='paid';
                $order->save();
                $user = User::find($order->user_id);
                $url = route('confirm-booking',encrypt($order->id));
                $show_booking = 'https://sub.arabicreators.com/ConsItemRegistration/'.$order->id;
                Mail::to($user->email)->send(new SuccessPaymentMail($order->id,$show_booking));
                Mail::to($owner->email)->send(new ShowBookingInfo($url,$show_booking));

            } else if ($data->InvoiceStatus == 'Failed') {
                $msg = 'Invoice is not paid due to ' . $data->InvoiceError;
            } else if ($data->InvoiceStatus == 'Expired') {
                $msg = 'Invoice is expired.';
            }

            $response = ['IsSuccess' => 'true', 'Message' => $msg, 'Data' => $data];
        } catch (\Exception $e) {
            $response = ['IsSuccess' => 'false', 'Message' => $e->getMessage()];
        }
        return response()->json($response);
    }
    public function errorcallback($id){
        $booking = BookingConsultion::find($id);
        $booking->delete();
        $paymentId = request('paymentId');
        $data      = $this->mfObj->getPaymentStatus($paymentId, 'PaymentId');
    if ($data->InvoiceStatus == 'Failed') {
        $msg = 'Invoice is not paid due to ' . $data->InvoiceError;
    } else if ($data->InvoiceStatus == 'Expired') {
        $msg = 'Invoice is expired.';
    }
    $response = ['IsSuccess' => 'true', 'Message' => $msg, 'Data' => $data];
    return response()->json($response);

}

//-----------------------------------------------------------------------------------------------------------------------------------------
}
