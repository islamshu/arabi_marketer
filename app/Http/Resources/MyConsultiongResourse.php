<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MyConsultiongResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $url = 'https://sub.arabicreators.com/registration/'.$this->user->mention.'/'.$this->url;
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => ($this->description),
            'color' => $this->color,
            'hour' => $this->hour,
            'categories' => $this->get_category($this),

            'minutes' => $this->min,
            'price' => $this->price,
            'url' => $this->url,
            'payment' => new PaymentResource($this->payment),
            'place' => new KeywordResource($this->place),
            // 'user_info'=> new UserInOtherResourse($this->user),
            'url_for_this_cons'=>$url,
            'message'=>$this->message,
            'type' => new KeywordResource($this->type),
            'date' => ConsultingDateResource::collection($this->date),
            'share' => [
                "facebook" => "https://www.facebook.com/sharer/sharer.php?u=" . $url,
                "twitter" => "https://twitter.com/intent/tweet?text=Default+share+text&url=" . $url,
                "telegram" => "https://telegram.me/share/url?url=" . $url,
                "reddit" => "https://www.reddit.com/submit?title=Default+share+text&url=" . $url,
                "whatsapp" => "https://wa.me/?text=" . $url,
                "linkedin" => "https://www.linkedin.com/sharing/share-offsite?mini=true&url=" . $url,
            ]
            // 'day'=>
        ];
    }
    function get_category($data)
    {
        $category = $data->category;
        return CategoryResource::collection($category);
    }
}
