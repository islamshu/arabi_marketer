<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use Arr;
use Illuminate\Http\Resources\Json\JsonResource;

class UserNormalNotAuthResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'mention' => $this->mention,
            'email' => $this->email,
            'type' => $this->type,
            'email_verified'=>$this->email_verified_at == null ? 0 : 1,

            // 'first_name'=>$this->first_name,
            // 'last_name'=>$this->last_name,
            'image' => $this->image == null ? asset('public/uploads/users/defult_user.png') : asset('public/uploads/' . $this->image),
            // 'country'=> new CountryResource(Country::find($this->country_id)),
            // 'city'=>new CityResource(City::find($this->city_id)),
            'types' => $this->get_type($this),
            // 'status'=>$this->status,
            // 'number_of_blogs'=>$this->blogs->count(),
            // 'number_of_services'=>$this->services->count(),
            // 'number_of_videos'=>$this->videos->count(),
            // 'number_of_podcasts'=>$this->podcasts->count(),
            // 'number_of_consutiong'=>$this->consutiong->count(),
            // 'finance'=>$this->get_finance($this),
            // 'Social'=>SocialResource::collection($this->socials)
        ];
    }
    function get_finance($data)
    {
        return [
            'total' => $data->total,
            'available' => $data->available,
            'pending' => $data->pending,
        ];
    }
    function get_type($data)
    {
        $type_array = array();
        if ($data->types != null) {
            foreach ($data->types as $type) {
                array_push($type_array, $type->type_id);
            }
            return CategoryResource::collection(Category::whereIn('id', $type_array)->get());
        } else {
            return null;
        }
    }
}
