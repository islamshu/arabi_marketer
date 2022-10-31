<?php

namespace App\Http\Resources;

use App\Models\Blog;
use Illuminate\Http\Resources\Json\JsonResource;
use SimpleXMLElement;

class Mp3Resourse extends JsonResource
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
           'title'=>$this->title,
           'mp3'=>utf8_decode((string)$this->enclosure['url']),
        ];
    }
    
}
