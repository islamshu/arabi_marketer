<?php

namespace App\Http\Resources;

use App\Models\Blog;
use App\Models\Category;
use App\Models\City;
use App\Models\Consulting;
use App\Models\Country;
use App\Models\Followr;
use App\Models\NewPodcast;
use App\Models\Podacst;
use App\Models\Service;
use App\Models\Specialty;
use App\Models\UserConsultion;
use App\Models\Video;
use Arr;
use Illuminate\Http\Resources\Json\JsonResource;

class myPorofileResoures extends JsonResource
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
            'pio' => $this->pio,
            'type' => $this->type,
            'first_name' => $this->first_name,
            'email_verified'=>$this->email_verified_at == null ? 0 : 1,
            'last_name' => $this->last_name,
            'cover' => $this->cover == null ? asset('public/uploads/cover_profile.jpg') : asset('public/uploads/' . $this->cover),
            'image' => $this->image == null ? asset('public/uploads/users/defult_user.png') : asset('public/uploads/' . $this->image),
            'country' => new CountryResource(Country::find($this->country_id)),
            'city' => new CityResource(City::find($this->city_id)),
            'types' => $this->get_type($this),
            'status' => $this->status,
            'have_defult_consultion_value'=>$this->have_defult_value(),
            'followe_number' => Followr::where('marketer_id', $this->id)->count(),
            'following_number' => Followr::where('user_id', $this->id)->count(),

            'number_of_blogs' => $this->blogs->count(),
            'number_of_services' => $this->services->count(),
            'number_of_videos' => $this->videos->count(),
            'number_of_podcasts' => $this->podcasts->count(),
            'number_of_consutiong' => $this->consutiong->count(),
            'finance' => $this->get_finance($this),
            'social' => new SocialResource($this->soical),
            'rss_url' => route('rss_feed', $this->id),
            'services' => $this->get_service($this),
            'blogs' => $this->get_blog($this),
            'podcasts' => $this->get_podcasts($this),
            'videos' => $this->get_videos($this),
            'consulting' => $this->get_consult($this),
            'bank_info' => $this->bank_info($this),
            'answer_questione' =>  AnsweResourse::collection($this->answer),
            'message'=>$this->message,
            'defult_consultion_value'=>$this->defult_consultion_value(),


        ];
    }
    function have_defult_value(){
        $UserConsultion = UserConsultion::where('user_id',auth('api')->id())->first();
        if($UserConsultion){
            return 1;
        }else{
            return 0;
        }
    }
    function defult_consultion_value(){
        $UserConsultion = UserConsultion::where('user_id',auth('api')->id())->first();
        if($UserConsultion){
            $con = 
            [
                'start_at'=>$UserConsultion->start_at,
                'end_at'=>$UserConsultion->end_at,
                'days'=>$UserConsultion->dates
            ];
        }else{
            $con =[];
        }
        
        return $con;

    }
    function get_service($data)
    {
        $service = Service::where('user_id', $data->id)->orderby('id', 'desc')->paginate(5);
        $res = MyserviceResoures::collection($service)->response()->getData(true);
        return $res;
    }
    function get_videos($data)
    {
        $cons = Video::where('user_id', $data->id)->orderby('id', 'desc')->paginate(5);
        $res = MyVideoResourse::collection($cons)->response()->getData(true);
        return $res;
    }
    function get_blog($data)
    {
        $cons = Blog::where('user_id', $data->id)->orderby('id', 'desc')->paginate(5);
        $res = MyblogResourese::collection($cons)->response()->getData(true);
        return $res;
    }
    function get_podcasts($data)
    {
        $cons = NewPodcast::where('user_id', $data->id)->orderby('id', 'desc')->paginate(5);
        $res = MyBodcastResourse::collection($cons)->response()->getData(true);
        return $res;
    }
    function get_consult($data)
    {
        $cons = Consulting::where('user_id', $data->id)->orderby('id', 'desc')->paginate(5);
        $res = MyConsultiongResourse::collection($cons)->response()->getData(true);
        return $res;
    }

    function bank_info($data)
    {
        $datainfo = $data->bank_info;
        if ($datainfo == null) {
            return null;
        }
        return [
            'bank_name' => $datainfo->bank_name,
            'account_name' => $datainfo->account_name,
            'account_number' => $datainfo->account_number
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
