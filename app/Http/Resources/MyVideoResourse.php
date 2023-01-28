<?php

namespace App\Http\Resources;

use App\Models\Blog;
use Illuminate\Http\Resources\Json\JsonResource;

class MyVideoResourse extends JsonResource
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
            'title'=>$this->title,
            'description'=>($this->description ),
            // 'user_info'=>new UserInOtherResourse($this->user),
            'categories'=>$this->get_category($this),
            'keywords'=>$this->get_keywords($this),
            'thum_image'=>asset('public/uploads/'.$this->image),
            'url'=>$this->url,
            'slug'=>$this->slug,
            'embede'=>get_video_form_url($this->url),
            'url_for_this_video'=>route('single_video',$this->id)
        ];
    }
    function get_category($data){
        $category = $data->category;
        return CategoryResource::collection($category);
    }
    function get_keywords($data)
    {
        $category = $data->keywords;
        $arr = [];
        foreach ($category as $cat) {
            array_push($arr, $cat->title);
        }
        $str_json = json_encode($arr); //array to json string conversion
        return json_decode($str_json);
        return KeywordResource::collection($category);
    }
}
