<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResourse extends JsonResource
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
            'id'=>$this->id,
            'code'=>'#'.$this->code,
            'title'=>$this->title,
            'body'=>$this->body,
            'status'=>$this->get_status($this),
            'user_info'=>new UserMainInfoResource($this->user),
            'files'=>TicketFileResourse::collection($this->files),
            'last_update'=>$this->updated_at,
            'relapy'=>ReplayTicketResourse::collection($this->replay)
        ];
    }
    function get_status($data){
        if($data->status == 1){
            return 'لم يتم الرد';
        }else{
            return 'تم الرد';
        }
    }
    
}
