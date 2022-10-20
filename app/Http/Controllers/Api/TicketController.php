<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\TicketResourse;
use App\Models\Ticket;
use App\Models\TicketFile;
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
        foreach($request->files as $key=>$file){
            dd($key);
            $filename = '/' . time() + $key . '_service_file.' . $file->getClientOriginalExtension();
            $file->move('uploads/service_file', $filename);
            $fi = new TicketFile();
            $fi->file = $filename;
            $fi->ticket_id = $ticket->id;
            $fi->save();
        }

        $res = new TicketResourse($ticket);
        return $this->sendResponse($res,'تم الاضافة بنجاح');
    }
}
