<?php

namespace App\Http\Resources',

use Illuminate\Http\Resources\Json\JsonResource',

class SocialResource extends JsonResource
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
            'instagram'=> 'instagram',
            'facebook'=> 'facebook',
            'twitter'=> 'twitter',
            'pinterest'=> 'pinterest',
            'snapchat'=> 'snapchat',
            'linkedin'=> 'linkedin',
            'website'=> 'website',
            'followers_number'=> 'followers_number',
        ];
    }
}
