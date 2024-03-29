<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuccessPaymentMail extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $url;

   
    public function __construct($order,$url)
    {
        $this->order = $order;
        $this->url= $url;
 
    }
    public function build()
    {
        return $this->view('mail.payment_cons')
        ->with([
           'order_id' => $this->order,
           'url' => $this->url,
        ]);
    }

          
      
}

