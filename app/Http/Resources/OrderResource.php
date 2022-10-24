<?php

namespace App\Http\Resources;

use App\Models\Blog;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'code'=>$this->code,
            'total'=>$this->total,
            'payment_status'=>$this->payment_status,
            'time'=>$this->created_at,
            'orderDetiles'=>OrderDetilesResource::collection($this->orderdetiles)
           
           
        ];
    }
   
}
