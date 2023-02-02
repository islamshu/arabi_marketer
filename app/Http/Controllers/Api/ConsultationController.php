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
use App\Models\ConsultingCategory;
use App\Models\ConsutingDate;
use App\Models\Specialty;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Notification;
use Validator;

class ConsultationController extends BaseController
{
    public function consultation_category()
    {
        $category = Specialty::orderBy('id', 'asc')->get();
        $userRes = KeywordResource::collection($category);
        return $this->sendResponse($userRes, 'جميع الانواع  الخاصة بالاستشارات');
    }
    public function consultion_user($id){
        $user = User::where('mention',$id)->first();
        $cons = Consulting::where('user_id',$user->id)->where('status',1)->orderby('id','desc')->paginate(6);
        $res = ConsultingResource::collection($cons)->response()->getData(true);
        return $this->sendResponse($res, 'تم ارجاع الاستشارات بنجاح');
    }
    public function consultation_keyword()
    {
        $category = KeyWord::ofType('consultation')->orderBy('id', 'asc')->get();
        $userRes = KeywordResource::collection($category);
        return $this->sendResponse($userRes, 'جميع الكلمات المفتاحية الخاصة بالاستشارات');
    }
    public function price_for_consultion(){
        $ara['first_price'] = get_general_value('first_price_consultion');
        $ara['last_price'] = get_general_value('last_price_consultion');

        return $this->sendResponse($ara, 'جميع الاسعار الخاصة بالخدمات');
    }
    public function get_json($id){
        $time1 = new DateTime('2022-01-01 12:00:00');
        $time2 = new DateTime('2022-01-01 14:30:00');
        $duration = new DateInterval('PT1H');
        // dd($duration);
        $period = new DatePeriod($time1, 30, $time2);
        dd($period);
        
        $hours = iterator_count($period);
        
        echo $hours;
    //    return $start->diff($end)->format('%H:%I:%S');
        // {
        //     "date": "2021-01-13T00:00:00.000Z",
        //     "slots": [
        //       {
        //         "date": "2021-01-13T13:30:00.000Z"
        //       },
        //       {
        //         "date": "2021-01-13T14:00:00.000Z"
        //       },
        //       {
        //         "date": "2021-01-13T14:30:00.000Z"
        //       },
        //       {
        //         "date": "2021-01-13T15:00:00.000Z"
        //       }
        //     ]
        //   }
    }
    public function places()
    {
        $category = Placetype::orderBy('id', 'asc')->get();
        $userRes = KeywordResource::collection($category);
        return $this->sendResponse($userRes, 'جميع الاماكن لعرض الاستشارة ');
    }
    public function single_consultion($mention,$url){
        $user = User::where('mention',$mention)->first();
        $cons = Consulting::where('url',$url)->where('user_id',$user->id)->first();
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
        $cons = Consulting::orderby('id', 'desc')->where('status',1)->get();
        $res = ConsultingResource::collection($cons)->response()->getData(true);
        return $this->sendResponse($res, 'جميع الاستشارات');
    }
    public function check_url($id,$title)
    {
        if($title == null){
            return $this->sendError('يجب ادخال الرابط');
        }
        $cons = Consulting::where('user_id',$id)->where('url',str_replace(' ','_',$title))->first();
        if($cons){
            return $this->sendError('الرابط موجود بالفعل');
        }else{
            return $this->sendResponse('success', 'الاسم متاح');  
        }
      
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'type_id' => 'required',
            'place_id' => 'required',
            // 'color' => 'required',
            'price' => 'required',
            // 'time_duration' => 'required',
            'url' => 'required',
            // 'start_date' => 'required',
            // 'end_date' => 'required',
            'payment_id' => 'required',
            // 'hour'=>'required',
            'mints'=>'required',
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages());
        }
        $date_explode = explode(',',$request->start_date) ;
        $min_api = str_replace('د','',$request->mints);
        $con = Consulting::create([
            'title' => $request->title,
            'description' => $request->description,
            'color' => $request->color,
            'place_id' => $request->place_id,
            // 'type_id' => $request->type_id,
            'hour' => $request->hour,
            'min' => $min_api,
            'start_at'=>$date_explode[0],
            'end_at'=>$date_explode[1],
            'price'=>$request->price,
            'url'=>$request->url,
            'payment_id'=>$request->payment_id,
            'status'=>2,
            'user_id'=>auth('api')->id(),
            'notifaction_after'=>$request->notifaction_after,
            'notifaction_befor'=>$request->notifaction_befor,

        ]);
    
        // $category = json_decode($request->type_id);
        $category = explode(',', $request->type_id);
        foreach ($category as $category) {
            $cat = new ConsultingCategory();
            $cat->consultion_id = $con->id;
            $cat->category_id = $category;
            $cat->save();
        }
        $date = [
            'id'=>$con->id,
            'name' => $con->title,
            'url' => route('consloution.show',$con->id),
            'title' => 'Have a new Consultiong',
            'time' => $con->updated_at
        ];
        if($request->day != null){
            foreach ($request->day as $key => $value) {
                ConsutingDate::create(['consulte_id'=>$con->id,'day' => $request->day[$key], 'from' => $request->from[$key] , 'to' => $request->to[$key]]);
            }
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
            // 'color' => 'required',
            'price' => 'required',
            // 'start_date' => 'required',
            // 'end_date' => 'required',
            'payment_id' => 'required',
            'hour'=>'required',
            'mints'=>'required',
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages());
        }
        $min_api = str_replace('د','',$request->mints);

        $date_explode = explode(',',$request->start_date) ;
        $con ->update([
            'title' => $request->title,
            'description' => $request->description,
            'color' => $request->color,
            'place_id' => $request->place_id,
            // 'type_id' => $request->type_id,
            'hour' => $request->hour,
            'min' => $min_api,
            'start_at'=>$date_explode[0],
            'end_at'=>$date_explode[1],
            'price'=>$request->price,
            'payment_id'=>$request->payment_id,
            'status'=>2,
            'message'=>null
        ]);
        $blog_category_array = ConsultingCategory::where('blog_id', $con->id)->get();
        foreach ($blog_category_array as $se) {
            $se->delete();
        }
        $category = explode(',', $request->type_id);
        foreach ($category as $category) {
            $cat = new ConsultingCategory();
            $cat->blog_id = $con->id;
            $cat->category_id = $category;
            $cat->save();
        }
        if($request->day != null){
            ConsutingDate::where('consulte_id',$con->id)->delete();
            foreach ($request->day as $key => $value) {
                ConsutingDate::create(['consulte_id'=>$con->id,'day' => $request->day[$key], 'from' => $request->from[$key] , 'to' => $request->to[$key]]);
            }
        }
        $admins = User::where('type','Admin')->get();
        $date = [
            'id'=>$con->id,
            'name' => $con->title,
            'url' => route('consloution.show',$con->id),
            'title' => 'قد تم تعديل استشارة',
            'time' => $con->updated_at
        ];
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
        return $this->sendResponse($res,'تم التعديل بنجاح');
    }
    public function serach(Request $request){
        $title = $request->title;
        $query = Consulting::query();
        $query->where('status',1);
        $query->when($request->title != null, function ($q) use ($title) {
            return $q->where('title','like','%'.$title.'%');
        });
        $cats = explode(',',$request->category_id);

        $query->when($request->category_id != null && $request->category_id != 'undefined', function ($q) use ($cats) {
            return $q->whereHas('category',function ($query) use ($cats) {
                $query->whereIn('category_id', $cats);
            });
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
