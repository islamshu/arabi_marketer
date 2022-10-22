<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Followr;
use Arr;
use Illuminate\Http\Resources\Json\JsonResource;

class UserNotAuthResource extends JsonResource
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
            'pio'=>$this->pio,
            'type'=>$this->type,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'image'=>$this->image == null ? asset('public/uploads/users/defult_user.png') : asset('public/uploads/'.$this->image),
            'country'=> new CountryResource(Country::find($this->country_id)),
            'city'=>new CityResource(City::find($this->city_id)),
            'type'=>$this->get_type($this),
            'status'=>$this->status,
            'followe_number'=>Followr::where('marketer_id',$this->id)->count(),
            'number_of_blogs'=>$this->blogs->count(),
            'number_of_services'=>$this->services->count(),
            'number_of_videos'=>$this->videos->count(),
            'number_of_podcasts'=>$this->podcasts->count(),
            'number_of_consutiong'=>$this->consutiong->count(),
            'finance'=>$this->get_finance($this),
            'social'=>new SocialResource($this->soical)
        ];
    }
    function get_finance($data){
        return [
            'total'=>$data->total,
            'available'=>$data->available,
            'pending'=>$data->pending,
        ];
    }
    function get_type($data){
        $type_array = array();
        foreach($data->types as $type){
            array_push($type_array,$type->type_id);
        }
        return CategoryResource::collection(Category::whereIn('id',$type_array)->get());
    }
}
