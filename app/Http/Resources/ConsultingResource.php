<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConsultingResource extends JsonResource
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
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>strip_tags($this->description ),
            'color'=>$this->color,
            'hour'=>$this->hour,
            'minutes'=>$this->min,
            'price'=>$this->price,
            'url'=>$this->url,
            'payment'=>new PaymentResource($this->payment),
            'place'=>new KeywordResource($this->place),
            'user_info'=> new UserMainInfoResource($this->user),
            'type'=>new KeywordResource($this->type)
        ];
    }
}
