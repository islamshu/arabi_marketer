<?php

namespace App\Http\Resources;

use App\Models\Blog;
use App\Models\Consulting;
use Illuminate\Http\Resources\Json\JsonResource;

class CounsutionBuyResource extends JsonResource
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
            'consultion'=>new ConsultingResource($this->consultion),
            'price'=>$this->price,
            'type'=>$this->type,
            'order_number'=>$this->order->code,
            'payment_styatus'=>$this->order->payment_status,
           
        ];
    }
   
}
