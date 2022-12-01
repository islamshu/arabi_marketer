<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResourse extends JsonResource
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
            'id' => $this->id,
            'body' => ($this->body),
            'is_show'=>$this->get_show(),
            'user_info'=>$this->get_user($this)
        ];
    }
    function get_show($data){
        if(auth('api')->check()){
            return 1;
        }else{
            return 2;
        }
    }
    function get_user($data){
        $user = @$data->user;
        if($user != null){
            return[
                'name'=>$data->user->name,
                'image'=>$data->user->image == null ? asset('public/uploads/users/defult_user.png') : asset('public/uploads/'.$data->user->image )
            ];
        }else{
            return[
                'name'=>'Guest',
                'image'=>asset('public/uploads/users/defult_user.png')
            ];  
        }
    }
}
