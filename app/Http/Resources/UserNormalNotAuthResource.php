<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Followr;
use App\Models\Specialty;
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
            'message'=>$this->message,
            'required_change_password'=>$this->required_change,
            'is_follow'=>is_follow_fun($this->id),
            'following_number' => Followr::where('user_id', $this->id)->count(),


            // 'first_name'=>$this->first_name,
            // 'last_name'=>$this->last_name,
            'cover' => $this->cover == null ? asset('public/uploads/cover_profile.jpg') : asset('public/uploads/' . $this->cover),

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
            return CategoryResource::collection(Specialty::whereIn('id', $type_array)->get());
        } else {
            return null;
        }
    }
}
