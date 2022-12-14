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
use App\Models\ConsutingDate;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Notification;
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
    public function single_consultion($id){
        $cons = Consulting::find($id);
        $res = new ConsultingResource($cons);
        return $this->sendResponse($res, 'تم ارجاع الاستشارة بنجاح');
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
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }
        
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
        $date = [
            'id'=>$con->id,
            'name' => $con->title,
            'url' => route('consloution.edit',$con->id),
            'title' => 'Have a new Consultiong',
            'time' => $con->updated_at
        ];
        foreach ($request->day as $key => $value) {
            ConsutingDate::create(['consulte_id'=>$con->id,'day' => $request->day[$key], 'from' => $request->from[$key] , 'to' => $request->to[$key]]);
        }
           // dd($this->day,$this->from,$this->to);
        
        $admins = User::where('type','Admin')->get();
        Notification::send($admins, new GeneralNotification($date));
               send_notification($date);
        $user = auth('api')->user();
        $date_send = [
            'id' => $user->id,
            'name' => $user->name,
            'url' => '',
            'title' => 'سيتم مراجعة  طلبك الخاص بالاستشارة خلال ٢٤ ساعة',
            'time' => $user->updated_at
        ];
        $user->notify(new GeneralNotification($date_send));
        $res = new ConsultingResource($con);
        return $this->sendResponse($res,'تم الاضافة بنجاح');
    }
    public function update(Request $request,$id)
    {
        $con= Consulting::find($id);
        if(!$con){
            return $this->sendError('لم يتم العثور على الاستشارة');
        }
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'type_id' => 'required',
            'place_id' => 'required',
            'color' => 'required',
            'price' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'payment_id' => 'required',
            'hour'=>'required',
            'mints'=>'required',
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }
        $con ->update([
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
            'payment_id'=>$request->payment_id,
        ]);
        if($request->day != null){
            ConsutingDate::where('consulte_id',$con->id)->delete();
            foreach ($request->day as $key => $value) {
                ConsutingDate::create(['consulte_id'=>$con->id,'day' => $request->day[$key], 'from' => $request->from[$key] , 'to' => $request->to[$key]]);
            }
        }
       
        $res = new ConsultingResource($con);
        return $this->sendResponse($res,'تم التعديل بنجاح');
    }
    public function serach(Request $request){
        $title = $request->title;
        $query = Consulting::query();
        // $query->where('status',1);
        $query->when($request->title != null, function ($q) use ($title) {
            return $q->where('title','like','%'.$title.'%');
        });
        $query->when($request->category_id !=null, function ($q) use ($request) {
            return $q->where('type_id',$request->category_id);
        });

       
        $blogs = $query->orderby('id','desc')->paginate(6);

        $res = ConsultingResource::collection($blogs)->response()->getData(true);
        return $this->sendResponse($res, 'جميع البودكاست');

    }
    public function consultation_profile_search($id,Request $request){
        $title = $request->title;
        $query = Consulting::query()->where('user_id',$id);
        // $query->where('status',1);
        $query->when($request->title != null, function ($q) use ($title) {
            return $q->where('title','like','%'.$title.'%');
        });
       

       
        $blogs = $query->orderby('id','desc')->paginate(6);

        $res = ConsultingResource::collection($blogs)->response()->getData(true);
        return $this->sendResponse($res, 'جميع البودكاست');

    }

    
    public function single($id){
        $service = Consulting::find($id);
        $ser = new ConsultingResource($service);
        return $this->sendResponse($ser,' تم ارجاع الاستشارة بنجاح');
    }
}
