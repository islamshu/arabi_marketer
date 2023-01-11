<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Followr;
use App\Models\Specialty;
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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'mention' => $this->mention,
            'email_verified'=>$this->email_verified_at == null ? 0 : 1,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'type' => $this->type,
            'types' => $this->get_type($this),
            'message'=>$this->message,
            'required_change_password'=>$this->required_change,
            'is_follow'=>is_follow_fun($this->id),
            'followe_number' => Followr::where('marketer_id', $this->id)->count(),
            'rss_url' => route('rss_feed', $this->id),

            'last_name' => $this->last_name,
            'number_of_blogs' => $this->blogs->count(),
            'number_of_services' => $this->services->count(),
            'number_of_videos' => $this->videos->count(),
            'number_of_podcasts' => $this->podcasts->count(),
            'number_of_consutiong' => $this->consutiong->count(),
            'answer_questione' =>  AnsweResourse::collection($this->answer),
            'cover' => $this->cover == null ? asset('public/uploads/cover_profile.jpg') : asset('public/uploads/' . $this->cover),

            'image' => $this->image == null ? asset('public/uploads/users/defult_user.png') : asset('public/uploads/' . $this->image)
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
