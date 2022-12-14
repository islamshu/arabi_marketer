<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'user_id'=>$this->id,
            'mention' => $this->mention,
            'user_name'=>$this->name,
            'image'=>$this->image == null ? asset('public/uploads/users/defult_user.png') : asset('public/uploads/'.$this->image),
            'user_type'=>$this->type,
            'message_url'=>route('message_two',[$this->id,auth('api')->id()])
        ];
    }
}
