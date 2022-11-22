<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data= json_decode($this->data);
        return [
            'id'=>$this->id,
            'title'=>$data->title,
            'url'=>$data->url,
            'created_at'=>$this->created_at
            ];
    }
}
