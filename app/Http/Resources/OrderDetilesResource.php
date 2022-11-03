<?php

namespace App\Http\Resources;

use App\Models\Blog;
use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetilesResource extends JsonResource
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
            'service'=>$this->get_service($this),
            'price'=>$this->price,


           
        ];
    }
    function get_service($data){
        if($data->type == 'service'){
            return new ServiceResource($data->service);
        }else{
            return null;
        }
    }
    function get_consution($data){
        if($data->type = 'consultation'){
            return new ConsultingResource($data->consultion);
        }else{
            return null;
        }
    }
   
}
