<?php

namespace App\Http\Resources;

use App\Models\Blog;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'user_id'=>$this->user,
            'owner_id'=>$this->owner,
            'service'=>$this->service,
            'price'=>$this->price,
            
            
        ];
    }
 
}
