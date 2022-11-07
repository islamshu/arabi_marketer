<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\ChatResource;
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
        $conversations =Message::where('sender_id',auth('api')->id())->orWhere('receiver_id',auth('api')->id())->get();
        $id = auth('api')->id();
        $users = $conversations->map(function($conversation) use($id){
        if($conversation->sender_id == $id) {
            return $conversation->receiver;
        }
        return $conversation->sender;
        })->unique();
        $res = ChatResource::collection($users);
        return $this->sendResponse($res , 'all user that chat with him');

    }
    public function message_betwwen_2($id1,$id2){
        $messages =Message::where('sender_id',$id1)->Where('receiver_id',$id2)->orwhere('sender_id',$id2)->where('receiver_id',$id1)->orderby('id','desc')->get();
        $res = MessageResource::collection($messages);
        return $this->sendResponse($res,'all message');
    }
}
