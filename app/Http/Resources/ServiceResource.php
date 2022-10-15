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
            'description'=>$this->description,
            'price'=>$this->price,
            'url'=>$this->url,
            'images'=>$this->get_image($this),
            'thumb_image'=>asset('uploads'.$this->image),
            'user_info'=>new UserMainInfoResource($this->user),
            'categories'=>$this->get_category($this),
            'keywords'=>$this->get_keywords($this),
            'specialties'=>$this->get_specialties($this),
            'files'=>$this->get_files($this),
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
            array_push($image_array , asset('uploads/'.$image));
        }
        return $image_array;
    }
    function get_category($data){
        $category = $data->category;
        return CategoryResource::collection($category);
    }
    function get_keywords($data){
        $category = $data->keywords;
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
