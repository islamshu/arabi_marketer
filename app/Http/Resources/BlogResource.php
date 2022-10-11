<?php

namespace App\Http\Resources;

use App\Models\Blog;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'user_info'=>new UserMainInfoResource($this->user),
            'categories'=>$this->get_category($this),
            'keywords'=>$this->get_keywords($this),
            'image'=>asset('public/uploads/'.$this->image),
            'url'=>route('single_blog',$this->id),
            // 'related_blog' =>$this->get_related($this),
            
        ];
    }
    function get_related($data){
      $blogs =   Blog::where('id','!=',$this->id)->orderby('id','desc')->take(5)->get();
      return RelatedBlogResource::collection($blogs);
    }
    function get_category($data){
        $category = $data->category;
        return CategoryResource::collection($category);
    }
    function get_keywords($data){
        $category = $data->keywords;
        return KeywordResource::collection($category);
    }
}
