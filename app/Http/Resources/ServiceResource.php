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
            'url'=>$this->url,
            'images'=>$this->get_image($this),
            'thumb_image'=>asset('public/uploads/'.$this->image),
            'user_info'=>new UserMainInfoResource($this->user),
            'categories'=>$this->get_category($this),
            'keywords'=>$this->get_keywords($this),
            'specialties'=>$this->get_specialties($this),
            'files'=>$this->get_files($this),
            'number_of_view'=>$this->viewer,
            'comment_number'=>$this->comments->where('status',1)->count(),
            'comments'=>CommentResourse::collection($this->comments->where('status',1)),
            'url_to_this_service'=>route('single_service',$this->id),

        ];
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
            array_push($arr, $cat->title);
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
