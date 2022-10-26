<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\TicketResourse;
use App\Models\Ticket;
use App\Models\TicketFile;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Notification;
use Validator;

class TicketController extends BaseController
{
    public function index(){
        $tickets = Ticket::where('user_id',auth('api')->id())->paginate(6);
        $res = TicketResourse::collection($tickets)->response()->getData(true);
        return $this->sendResponse($res,'جميع التذاكر');
    }
    public function store(Request $request){
        $validation = Validator::make($request->all(), [
            'title'=>'required',
            'body' => 'required',
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }
        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->body = $request->body;
        $ticket->user_id = auth('api')->id();
        $ticket->save();
        // $files = json_decode($request->files);
        foreach ($request->files as $key => $file) {
            if ($key == 'icon') {
                continue;
            } else {
                foreach ($file as $keyy => $imagex) {  
                    $imageNamee = 'ticket_file/' . time() + $keyy . '_ticket_file.' . $imagex->getClientOriginalExtension();
                    $imagex->move('uploads/ticket_file', $imageNamee);
                    $file = new TicketFile();
                    $file->ticket_id = $ticket->id;
                    $file->file =  $imageNamee;
                    $file->save();
                }
            }
        }
        $date = [
            'id'=>$ticket->id,
            'name' => $ticket->title,
            'url' => route('tickets.show',$ticket->id),
            'title' => 'Have a new Consultiong',
            'time' => $ticket->updated_at
        ];
        $admins = User::where('type','Admin')->get();
        Notification::send($admins, new GeneralNotification($date));

        $res = new TicketResourse($ticket);
        return $this->sendResponse($res,'تم الاضافة بنجاح');
    }
}
