<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\TicketResourse;
use App\Models\Ticket;
use App\Models\TicketFile;
use App\Models\TicketReply;
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
    public function single_ticket($id){
        $ticket = Ticket::find($id);
        $res = new TicketResourse($ticket);
        return $this->sendResponse($res,'تم ارجاع بيانات التذكرة');

    }
    public function send_replay(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);

        $validation = Validator::make($request->all(), [
            'ticket_id'=>'required',
            'body' => 'required',
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }
        if($ticket->user_id != auth('api')->id()){
            return $this->sendError('هذه التذكرة غير خاصة بك');
        }
        $replay = new TicketReply();
        $replay->body = $request->body;
        $replay->ticket_id = $request->ticket_id;
        $replay->user_id = auth('api')->id();
        $replay->save();
        $ticket = Ticket::find($request->ticket_id);
        $ticket->status = 1;
        $ticket->save();
        $res = new TicketResourse($ticket);
        return $this->sendResponse($res,'تم الرد بنجاح');

        return redirect()->back();
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
        $ticket->code = 'DSC-'.date('Ymd-His');
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
            'title' => 'Have a new Ticket',
            'time' => $ticket->updated_at
        ];
        $admins = User::where('type','Admin')->get();
        Notification::send($admins, new GeneralNotification($date));
               send_notification($date);

        $res = new TicketResourse($ticket);
        return $this->sendResponse($res,'تم الاضافة بنجاح');
    }
}
