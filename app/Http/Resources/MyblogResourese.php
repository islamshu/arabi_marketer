<?php

namespace App\Http\Resources;

use App\Models\Blog;
use Illuminate\Http\Resources\Json\JsonResource;

class MyblogResourese extends JsonResource
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
            'title' => $this->title,
            'description' => ($this->description),
            // 'user_info' => new UserInOtherResourse($this->user),
            'user_mention'=>$this->user->mention,
            'categories' => $this->get_category($this),
            'keywords' => $this->get_keywords($this),
            'tags' => $this->get_tags($this),
            'slug' => $this->slug,
            'image_info' => $this->image_info($this),
            'meta_description' => $this->small_description,
            'meta_title' => $this->meta_title,
            'image' => asset('public/uploads/'.$this->image_blog->image),
            // 'url' => route('single_blog', $this->id),
            'publish_time'=>$this->publish_time,
            'comment_number' => $this->comments->where('status', 1)->count(),
            'comments' => CommentResourse::collection($this->comments),
            'rate' => $this->get_rate($this)
            // 'related_blog' =>$this->get_related($this),

        ];
    }
    function image_info($data)
    {
        return [
            'image' => asset('public/uploads/'.$this->image_blog->image),
            'alt' => $this->image_blog->alt,
            'title' => $this->image_blog->title,
            'description' => $this->image_blog->description,
        ];
    }
    function get_related($data)
    {
        $blogs =   Blog::where('id', '!=', $this->id)->orderby('id', 'desc')->take(5)->get();
        return RelatedBlogResource::collection($blogs);
    }
    function get_category($data)
    {
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
    function get_tags($data)
    {
        $category = $data->tags;
        // $category = $data->keywords;
        $arr = [];
        foreach ($category as $cat) {
            array_push($arr, $cat->title);
        }
        $str_json = json_encode($arr); //array to json string conversion
        return json_decode($str_json);
        return KeywordResource::collection($category);
    }


    function get_rate($data)
    {
        return [
            'number_of_user_rate' => $data->rate->count(),
            'rate' => $data->rate->count() == 0 ? 0 : $data->rate->sum('rate') / $data->rate->count()
        ];
    }
}
