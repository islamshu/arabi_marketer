<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            'price'=>$this->price,
            'slug'=>$this->slug,
            'url'=>$this->url,
            'images'=>$this->get_image($this),
            'thumb_image'=>asset('public/uploads/'.$this->image),
            'user_info'=>new UserInOtherResourse($this->user),
            'categories'=>$this->get_category($this),
            'keywords'=>$this->get_keywords($this),
            'specialties'=>$this->get_specialties($this),
            'files'=>$this->get_files($this),
            'number_of_view'=>$this->viewer,
            'extra'=>ExtraServics::collection($this->extra),
            'comment_number'=>$this->comments->where('status',1)->count(),
            'comments'=>CommentResourse::collection($this->comments->where('status',1)),
            'buyer_instructions'=>$this->buyer_instructions,
            'time'=>$this->time,
            'status'=>$this->status,
            'type'=>$this->get_type($this),
            'url_to_this_service'=>route('single_service',$this->id),

        ];
    }
    public function get_type($data){
        if($data->type =='service'){
            return 'خدمة';
        }else{
            return'رقمي';
        }
    }
    public function get_image($data){
        $images = $data->images;
        $image_array =[];
        $images = json_decode($images);
        foreach($images as $image){
            array_push($image_array , asset('public/uploads/'.$image));
        }
        return $image_array;
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
            $string = str_replace(' ', '-',$cat->title); // Replaces all spaces with hyphens.

            $title= preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
            array_push($arr, $title);
        }
        $str_json = json_encode($arr); //array to json string conversion
        return json_decode($str_json);
        return KeywordResource::collection($category);
    }
    function get_files($data){
        $category = $data->files;
        
        return FilesServiceResourse::collection($category);
    }
    function get_specialties($data){
        $category = $data->specialty;
        return KeywordResource::collection($category);
    }
}
