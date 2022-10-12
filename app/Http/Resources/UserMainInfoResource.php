<?php

namespace App\Http\Resources;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Resources\Json\JsonResource;

class UserMainInfoResource extends JsonResource
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
        'name'=>$this->name,
        'email'=>$this->email,
        'first_name'=>$this->first_name,
        'last_name'=>$this->last_name,
        'number_of_blogs'=>$this->blogs->count(),
        'number_of_services'=>$this->services->count(),
        'number_of_videos'=>$this->videos->count(),
        'number_of_podcasts'=>$this->podcasts->count(),
        'number_of_consutiong'=>$this->consutiong->count(),
        'image'=>$this->image == null ? asset('public/uploads/users/defult_user.png') : asset('public/uploads/'.$this->image)
       ];
    }
}
