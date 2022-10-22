<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class MessageController extends BaseController
{
    public function store(Request $request){
        $message = new Message();
        $message->sender_id = auth('api')->id();
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->save();
        return $this->sendResponse($message , 'send');
    }
}
