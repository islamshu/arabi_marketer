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
            'description'=>$this->description,
            'color'=>$this->color,
            'hour'=>$this->hour,
            'minutes'=>$this->minute,
            'price'=>$this->price,
            'url'=>$this->url,
            'payment'=>$this->payment,
            'place'=>$this->place

        ];
    }
}
