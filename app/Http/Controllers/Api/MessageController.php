<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\MessageResource;

class MessageController extends BaseController
{
    public function store(Request $request){
        $message = new Message();
        $message->sender_id = auth('api')->id();
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->save();
        $res = new MessageResource($message);
        return $this->sendResponse($res , 'send');
    }
    public function index(){
        $messages = Message::where('sender_id',auth('api')->id())->orwhere('receiver_id',auth('api')->id())->get();
        $res = MessageResource::collection($messages);
        return $this->sendResponse($res , 'all messages');

    }
}
