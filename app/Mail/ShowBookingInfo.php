<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShowBookingInfo extends Mailable
{
    use Queueable, SerializesModels;
    public $url;
    public $show_booking;

   
    public function __construct($url,$show_booking)
    {
        $this->url = $url;
        $this->show_booking = $show_booking;
 
    }
    public function build()
    {
        return $this->view('mail.confirm_booking')
        ->with([
           'url' => $this->url,
           'show_booking'=>$this->show_booking
        ]);
    }

          
      
}

