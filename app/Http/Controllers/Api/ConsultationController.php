<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KeywordResource;
use App\Models\Category;
use App\Models\KeyWord;
use App\Models\Payment;
use App\Models\Placetype;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\ConsultingResource;
use App\Http\Resources\PaymentResource;
use App\Models\Consulting;
use Validator;

class ConsultationController extends BaseController
{
    public function consultation_category()
    {
        $category = Category::ofType('consultation')->orderBy('id', 'asc')->get();
        $userRes = KeywordResource::collection($category);
        return $this->sendResponse($userRes, 'جميع الكلمات المفتاحية الخاصة بالاستشارات');
    }
    public function consultation_keyword()
    {
        $category = KeyWord::ofType('consultation')->orderBy('id', 'asc')->get();
        $userRes = KeywordResource::collection($category);
        return $this->sendResponse($userRes, 'جميع الكلمات المفتاحية الخاصة بالاستشارات');
    }
    public function places()
    {
        $category = Placetype::orderBy('id', 'asc')->get();
        $userRes = KeywordResource::collection($category);
        return $this->sendResponse($userRes, 'جميع الاماكن لعرض الاستشارة ');
    }
    public function payments()
    {
        $category = Payment::orderBy('id', 'asc')->get();
        $userRes = PaymentResource::collection($category);
        return $this->sendResponse($userRes, 'جميع طرق الدفع المتاحة ');
    }
    public function all_consultation()
    {
        $cons = Consulting::orderby('id', 'desc')->get();
        $res = ConsultingResource::collection($cons)->response()->getData(true);
        return $this->sendResponse($res, 'جميع الاستشارات');
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'type_id' => 'required',
            'place_id' => 'required',
            'color' => 'required',
            'price' => 'required',
            // 'time_duration' => 'required',
            'url' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'payment_id' => 'required',
            'hour'=>'required',
            'mints'=>'required',
        ]);
        $con = Consulting::create([
            'title' => $request->title,
            'description' => $request->description,
            'color' => $request->color,
            'place_id' => $request->place_id,
            'type_id' => $request->type_id,
            'hour' => $request->hour,
            'min' => $request->mints,
            'start_at'=>$request->start_date,
            'end_at'=>$request->end_date,
            'price'=>$request->price,
            'url'=>$request->url,
            'payment_id'=>$request->payment_id,
            'user_id'=>auth('api')->id(),
        ]);
        $res = new ConsultingResource($con);
        return $this->sendResponse($res,'تم الاضافة بنجاح');
    }
}
