<?php

namespace App\Http\Resources;

use App\Models\Blog;
use Illuminate\Http\Resources\Json\JsonResource;
use SimpleXMLElement;

class PodcastResource extends JsonResource
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
            'user_info'=>new UserMainInfoResource($this->user),
            'categories'=>$this->get_category($this),
            'keywords'=>$this->get_keywords($this),
            'image'=>asset('public/uploads/'.$this->image),
            'google_SSR'=>$this->url,
            'Apple_SSR'=>$this->apple_url,
            'SoundCloud_SSR'=>$this->sound_url,
            'sound_item'=>$this->get_item($this),
            'url_for_this_podcast'=>route('single_podcast',$this->id)
        ];
    }
    function get_item($data){
        $url = $data->sound_url;
        $content = file_get_contents($url);
        $flux = new SimpleXMLElement($content);
        return Mp3Resourse::collection($flux->channel->item)
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
