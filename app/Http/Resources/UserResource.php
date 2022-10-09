<?php

namespace App\Http\Resources;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
        'image'=>asset('uploads/'.$this->image),
        'country'=> new CountryResource(Country::find($this->country_id)),
        'city'=>new CityResource(City::find($this->city_id)),
        'token'=>$this->createToken('Personal Access Token')->accessToken,
       ];
    }
}
