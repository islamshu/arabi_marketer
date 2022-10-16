<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SocialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $this
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'instagram'=> $this->instagram,
            'facebook'=> $this->facebook,
            'twitter'=> $this->twitter,
            'pinterest'=> $this->pinterest,
            'snapchat'=> $this->snapchat,
            'linkedin'=> $this->linkedin,
            'website'=> $this->website,
            'followers_number'=> (int)$this->followers_number,
        ];
    }
}
