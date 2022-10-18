<?php

namespace App\Http\Resources;

use App\Models\Blog;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryBlogResource extends JsonResource
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
            'blogs'=>$this->get_blogs($this),
        ];
    }
    public function get_blogs($data){
        $query = Blog::query()->where('status',1);
        $query->has('category')->with(['category' => function ($query) use ($data) {
            $query->where('category_id', $data->id);
        }]);
        $blogs = $query->orderby('id', 'desc')->take(6)->get();
        return BlogResource::collection($blogs);


    }
}
