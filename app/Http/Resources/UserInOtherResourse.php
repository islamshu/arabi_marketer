<?php

namespace App\Http\Resources;

use App\Models\Blog;
use App\Models\Category;
use App\Models\City;
use App\Models\Consulting;
use App\Models\Country;
use App\Models\Followr;
use App\Models\NewPodcast;
use App\Models\Podacst;
use App\Models\Service;
use App\Models\Video;
use Arr;
use Illuminate\Http\Resources\Json\JsonResource;

class UserInOtherResourse extends JsonResource
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
            'name' => $this->name,
            'mention' => $this->mention,
            'email' => $this->email,
            'pio' => $this->pio,
            'type' => $this->type,
            'first_name' => $this->first_name,
            'email_verified' => $this->email_verified_at == null ? 0 : 1,
            'last_name' => $this->last_name,
            'message'=>$this->message,
            'cover' => $this->cover == null ? asset('public/uploads/cover_profile.jpg') : asset('public/uploads/' . $this->cover),

            'image' => $this->image == null ? asset('public/uploads/users/defult_user.png') : asset('public/uploads/' . $this->image),
        ];
    }
}
