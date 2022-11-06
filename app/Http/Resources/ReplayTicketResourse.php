<?php

namespace App\Http\Resources;

use App\Models\Ticket;
use Illuminate\Http\Resources\Json\JsonResource;

class ReplayTicketResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'user'=>$this->get_user($this),
            'body'=>$this->body,
         
        ];
    }
    function get_user($data){
       $tikeet = Ticket::find($data->ticket_id);
       if($data->user_id == $tikeet->user_id){
        return $tikeet->user->name . '(المالك)';
       }else{
        return $data->user->name . '(الدعم)';
       }
    }
}
