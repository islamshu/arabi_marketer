<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageConfigResourse extends JsonResource
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
            'markert_image_page'=>asset('public/uploads/markter_image.jpg'),
            'home_image_page'=>asset('public/uploads/home_image_page.jpg'),
        ];
    }
}
