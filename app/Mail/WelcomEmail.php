<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $email;
    public $password;

   
    public function __construct($name,$email,$password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;

    }
    public function build()
    {
        return $this->view('mail.welcom')
        ->with([
           'name' => $this->name,
           'email' => $this->email,
           'password' => $this->password

        ]);
    }

          
      
}

