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
            'title'=>$this->get_title($this),
            'description'=>$this->get_desription($this),
            'user_info'=>new UserMainInfoResource($this->user),
            // 'categories'=>$this->get_category($this),
            // 'keywords'=>$this->get_keywords($this),
            'image'=>$this->get_image($this),
            // 'google_SSR'=>$this->url,
            // 'Apple_SSR'=>$this->apple_url,
            // 'SoundCloud_SSR'=>$this->sound_url,
            'sound_item'=>$this->get_item($this),
            'url_for_this_podcast'=>route('single_podcast',$this->id),
            'count_item'=>$this->count_item($this)
        ];
  
    }

    function count_item($data){
        $url = $data->url;
        $content = file_get_contents($url);
        $flux = new SimpleXMLElement($content);
        return count($flux->channel->item);
    }
    function get_title($data){
        return (string)get_title_rss($data->url);
        // return 'test';
    }
    function get_desription($data){
        $content = file_get_contents($data->url);
        $flux = new SimpleXMLElement($content);
        return (string)$flux->channel->description;
    }
    function get_image($data){
        $content = file_get_contents($data->url);
        $flux = new SimpleXMLElement($content);
        // dd($flux);
        return (string)$flux->channel->image->url;
    }

    function get_item($data){
        $url = $data->url;
        $content = file_get_contents($url);
        $flux = new SimpleXMLElement($content);
        $aa = array();
        $i =0;
        foreach($flux->channel->item as $flu){
            $aa[$i]['id']=(int)$i;
            $aa[$i]['title']=(string)$flu->title;
            $aa[$i]['link']=utf8_decode((string)$flu->enclosure['url']);
            $i++;
        }
        return $aa;
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
