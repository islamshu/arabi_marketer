<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Models\Consulting;
use App\Http\Resources\BlogResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ConsultingResource;
use App\Http\Resources\PodcastResource;
use App\Http\Resources\ServiceBuyResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\UserNormalAuthResource;
use App\Http\Resources\UserNormalNotAuthResource;
use App\Http\Resources\UserNotAuthResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\VideoResource;
use App\Models\Blog;
use App\Models\Category;
use App\Models\MarkterSoical;
use App\Models\OrderDetiles;
use App\Models\Podacst;
use App\Models\Service;
use App\Models\SouialUser;
use App\Models\UserCategory;
use App\Models\Video;
use App\Notifications\BeMarkterNotification;
use Notification;
use Validator;

class UserController extends BaseController
{
    public function register(Request $request){
        $user = User::where('email',$request->email)->first();
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email'=>'required|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = 'user';
        $user->image = 'users/defult_user.png';
        $user->password =  Hash::make($request->password);
        $user->save();
        $userRes =new  UserNormalNotAuthResource($user);
        return $this->sendResponse($userRes,'تم التسجيل بنجاح');
    }
    public function login(Request $request){
        $validation = Validator::make($request->all(), [
            'email'=>'required',
            'password' => 'required',
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }
        $user = User::where('email',$request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Personal Access Token')->accessToken;
                if($user->type =='user'){
                    $res = New UserNormalAuthResource($user);
                }else{
                    $res = New UserResource($user);

                }
                return $this->sendResponse($res,'تم تسجيل الدخول بنجاح');
            } else {
                return $this->sendError('كلمة المرور غير صحيحة');
            }
        } else {
            return $this->sendError('لم يتم العثور على المستخدم');

        }
    }
    public function be_marketer(Request $request){
        $user = User::find($request->user_id);

        if($user->type == 'user'){
            $user->type = 'marketer';
            $user->save();
            $date = [
                'id'=>$user->id,
                'name' => $user->name,
                'url' => route('marketer.show',$user->id),
                'title' => 'Have a new Markter',
                'time' => $user->updated_at
            ];
            $admins = User::where('type','Admin')->get();
            Notification::send($admins, new BeMarkterNotification($date));
            $res = new UserResource($user);
            return $this->sendResponse($res,'تم التحويل الى مسوق  بنجاح بانتظار موافقة الادارة');
        }elseif($user->type =='marketer'){
            return $this->sendError('انت بالفعل مسوق لدينا ');
        }elseif($user->type != 'user' && $user->type !='marketer'){
            return $this->sendError('يوجد خطا ما لدينا');
        }
    }
    public function edit_profile(Request $request){
        $user = auth('api')->user();
        $validation = Validator::make($request->all(), [
            'email'=>'required|unique:users,email,'.$user->id,
   
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }       
         if($request->image != null){
            $user->image = $request->image->store('users');
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->lang = $request->lang;
        $user->country_id = $request->country_id;
        $user->city_id = $request->city_id;
        $user->email = $request->email;
        $user->save();
        $userRes =new  UserNormalAuthResource($user);
        return $this->sendResponse($userRes,'تم تعديل البيانات بنجاح');
    }
    public function edit_profile_step_2(Request $request){
        $user = auth('api')->user();
        $user->pio = $request->cv;
        $user->save();

        if($request->type != null){
            $types = json_decode($request->type, true);

            foreach($types as $type){
                $is_ext = UserCategory::where('user_id',$user->id)->where('type_id',$type)->first();
                if($is_ext){
                    continue;
                }
                $usertype = new UserCategory();
                $usertype->user_id = $user->id;
                $usertype->type_id = $type;
                $usertype->save();
            }
        }
        $userRes =new  UserNotAuthResource($user);
        return $this->sendResponse($userRes,'تم تعديل البيانات بنجاح');
    }
    public function edit_profile_step_3(Request $request){
        $user = auth('api')->user();
        $social = $user->soical;
        if($social == null){
            $social = new MarkterSoical();
            $social->instagram = $request->instagram;
            $social->facebook = $request->facebook;
            $social->twitter = $request->twitter;
            $social->pinterest = $request->pinterest;
            $social->snapchat = $request->snapchat;
            $social->linkedin = $request->linkedin;
            $social->website = $request->website;
            $social->followers_number = $request->followers_number;
            $social->user_id = $user->id;
            $social->save();
        }else{
            $social->instagram = $request->instagram;
            $social->facebook = $request->facebook;
            $social->twitter = $request->twitter;
            $social->pinterest = $request->pinterest;
            $social->snapchat = $request->snapchat;
            $social->linkedin = $request->linkedin;
            $social->website = $request->website;
            $social->followers_number = $request->followers_number;
            $social->save(); 
        }
       
        // foreach($request->social as $social){
        //     $usersocial = new SouialUser();
        //     $usersocial->user_id = $user->id;
        //     $usersocial->url = $social;
        //     $usersocial->save();
        // }
        $userRes =new  UserNotAuthResource($user);
        return $this->sendResponse($userRes,'تم تعديل البيانات بنجاح');
    }
    public function profile(){
        $user = auth('api')->user();
        $userRes =new  UserNotAuthResource($user);
        return $this->sendResponse($userRes,'الملف الشخصي');
    }
    public function type_of_user(){
        $category = Category::ofType('user')->orderBy('id', 'asc')->get();
        $userRes =CategoryResource::collection($category);
        return $this->sendResponse($userRes,'جميع المجالات الخاصة بالمستخدمين');
    }
    public function get_blog()
    {
        $blogs = Blog::where('user_id',auth('api')->id())->orderBy('id', 'desc')->paginate(5);
        $res = BlogResource::collection($blogs)->response()->getData(true);
        return $this->sendResponse($res, 'جميع المقالات');
        // return ['success'=>true,'blogs'=>BlogResource::collection($blogs)->response()->getData(true),'message'=>'جميع المقالات'];
    }
    public function get_consultations()
    {
        $cons = Consulting::where('user_id',auth('api')->id())->orderby('id', 'desc')->paginate(5);
        $res = ConsultingResource::collection($cons)->response()->getData(true);
        return $this->sendResponse($res, 'جميع الاستشارات');
    }
    public function get_videos()
    {
        $cons = Video::where('user_id',auth('api')->id())->orderby('id', 'desc')->paginate(5);
        $res = VideoResource::collection($cons)->response()->getData(true);
        return $this->sendResponse($res, 'جميع الاستشارات');
    }
    public function get_service(){
        $service = Service::where('user_id',auth('api')->id())->orderby('id','desc')->paginate(5);
        $res = ServiceResource::collection($service)->response()->getData(true);
         return $this->sendResponse($res,'جميع الخدمات  ');
     }
     public function get_podcasts(){
        $service = Podacst::where('user_id',auth('api')->id())->orderby('id','desc')->paginate(5);
        $res = PodcastResource::collection($service)->response()->getData(true);
         return $this->sendResponse($res,'جميع البدوكاست  ');
     }
     public function my_service_buy(){
        $user = auth('api')->user();
        $orders = $user->orders;
        $service = [];
        foreach($orders as $order){
            foreach($order->orderdetiles as $detile){
                if($detile->type == 'service'){
                    array_push($service,$detile->id);
                }
            }
        }
        $services = OrderDetiles::whereIn('id',$service)->get(); 
        $res = ServiceBuyResource::collection($service);
        return $this->sendResponse($res,'جميع الخدمات المشتراه  ');

        
     }
}
