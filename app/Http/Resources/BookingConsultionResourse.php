<?php

namespace App\Http\Resources;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingConsultionResourse extends JsonResource
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
            'code'=>$this->code,
            'user_id'=>new UserNormalNotAuthResource($this->user),
            'consultion'=>new ConsultingResource($this->consult),
            'start_at'=>$this->date,
            'end_at'=>Carbon::createFromFormat('Y-m-d H:i:s', $this->date)->addMinutes($this->consult->min)->format('Y-m-d H:i:s'),
            'payment_method'=>$this->paymet_method,
            'price'=>$this->price,
            'meeting_app'=>$this->meeting_app,
            'meeting_url'=>$this->meeting_link,
            'booking_status'=>$this->booking_status == 0 ? 'pending' : 'success',
            'guests'=>$this->emails
        ];
    }
    function get_type($data){
        if($data->type == 'service'){
            return new ServiceResource($this->service);
        }else{
            return new ConsultingResource($this->consltuon);

        }
    }
 
}
