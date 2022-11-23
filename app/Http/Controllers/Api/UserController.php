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
use App\Http\Resources\CounsutionBuyResource;
use App\Http\Resources\NotificationResourse;
use App\Http\Resources\OrderResource;
use App\Http\Resources\PodcastResource;
use App\Http\Resources\ServiceBuyResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\UserNormalAuthResource;
use App\Http\Resources\UserNormalNotAuthResource;
use App\Http\Resources\UserNotAuthResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\VideoResource;
use App\Mail\VerifyEmail;
use App\Models\Answer;
use App\Models\BankInfo;
use App\Models\Blog;
use App\Models\Category;
use App\Models\MarkterOrder;
use App\Models\MarkterSoical;
use App\Models\NewPodcast;
use App\Models\Notification as ModelsNotification;
use App\Models\Order;
use App\Models\OrderDetiles;
use App\Models\Podacst;
use App\Models\Service;
use App\Models\SouialUser;
use App\Models\UserAnswer;
use App\Models\UserCategory;
use App\Models\Video;
use App\Notifications\GeneralNotification;
use Carbon\Carbon;
use DB;
use Mail;
use Notification;
use Validator;

class UserController extends BaseController
{
    public function my_notification()
    {
        $notification = auth('api')->user()->notifications;
        // $not = DB::table('notifications')->where('notifiable_id',auth('api')->id())->get();
        // dd($notification);
        $res = NotificationResourse::collection($notification);
        return $this->sendResponse($res, 'جميع الاشعارات');
    }
    public function show_notification($id)
    {
        $notification = ModelsNotification::find($id);
        $notification->read_at = Carbon::now();
        $notification->save();
        $not = DB::table('notifications')->where('id',$id)->first();
        // return json_decode($not->data)->title;
        // return (string)json_encode($notification->data['title']);
        // $no = json_decode($notification);
        // $res = new NotificationResourse($notification);
        $res =[
            'id'=>$not->id,
            'title'=>json_decode($not->data)->title,
            'url'=>json_decode($not->data)->url,
            'is_read'=>$not->read_at != null ? 1 : 0,
            'created_at'=>$not->created_at,

        ];
        return $this->sendResponse($res, 'جميع الاشعارات');
    }
    public function check_name(Request $request){
        $user = User::where('mention',$request->mention)->first();
        if($user){
            return $this->sendError('الاسم مستخدم');
        }else{
            return $this->sendResponse('success','الاسم متاح');
        }
    }

    public function change_mention(){
        $user = User::get();
        foreach($user as $us){
            $us->mention = '@'. str_replace(' ','_',$us->name).'_'.$us->id ;
            $us->save();
        }
        return true;
    }
    public function register(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $validation = Validator::make($request->all(), [
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'first_name'=>'required',
            'last_name'=>'required',
            'country_id'=>'required',
            'mention'=>'required|unique:users,mention'

            
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mention =  $request->mention ;
        $user->type = 'user';
        $user->image = 'users/defult_user.png';
        $user->password =  Hash::make($request->password);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->country_id = $request->country_id;
        $user->save();
        $enc= encrypt(20);
        $url = route('send_email.verfy',$enc);

        Mail::to($request->email)->send(new VerifyEmail($url));
        // return 'Email sent Successfully';
        $userRes = new  UserNormalAuthResource($user);
        return $this->sendResponse($userRes, 'تم التسجيل بنجاح');
    }
    public function send_email(){
        // $url = 'd';
        $enc= encrypt(20);
        $url = route('send_email.verfy',$enc);
        Mail::to('islamshu12@gmail.com')->send(new VerifyEmail($url));
        return 'Email sent Successfully';
    }
    public function add_bank_info(Request $request)
    {
        $user = auth('api')->user();
        $bank = $user->bank_info;
        if ($bank == null) {
            $bank = new BankInfo();
            $bank->bank_name = $request->bank_name;
            $bank->account_name = $request->account_name;
            $bank->account_number = $request->account_number;
            $bank->user_id = auth('api')->id();
            $bank->save();
        } else {
            $bank->bank_name = $request->bank_name;
            $bank->account_name = $request->account_name;
            $bank->account_number = $request->account_number;
            $bank->save();
        }
        $res = new UserNotAuthResource($user);
        return $this->sendResponse($res, 'تم تعديل بيانات الدفع');
    }
    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }
        $user = User::where('email', $request->email)->where('type','!=','staff')->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Personal Access Token')->accessToken;
                if ($user->type == 'user') {
                    $res = new UserNormalAuthResource($user);
                } else {
                    $res = new UserResource($user);
                }
                return $this->sendResponse($res, 'تم تسجيل الدخول بنجاح');
            } else {
                return $this->sendError('كلمة المرور غير صحيحة');
            }
        } else {
            return $this->sendError('لم يتم العثور على المستخدم');
        }
    }
    public function be_marketer(Request $request)
    {
        $user = User::find($request->user_id);


        if ($user->type == 'user') {

            $order = new MarkterOrder();
            $order->user_id = auth('api')->id();
            $order->status = 1;
            $order->save();

            $date = [
                'id' => $user->id,
                'name' => $user->name,
                'url' => route('customer.show', $user->id),
                'title' => 'لديك مسوق جديد',
                'time' => $user->updated_at
            ];
            $admins = User::where('type', 'Admin')->get();
            Notification::send($admins, new GeneralNotification($date));
            $res = new UserResource($user);
            return $this->sendResponse($res, 'تم ارسال طلبك للادارة');
        } elseif ($user->type == 'marketer') {
            return $this->sendError('انت بالفعل مسوق لدينا ');
        } elseif ($user->type != 'user' && $user->type != 'marketer') {
            return $this->sendError('يوجد خطا ما لدينا');
        }
    }

    public function edit_profile(Request $request)
    {
        $user = auth('api')->user();
        // if($request->email != $user->email ){
        //     return $this->sendError('البريد الاكتروني خاطيء');

        // }
        
        if ($request->image != null) {
            $user->image = $request->image->store('users');
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->lang = $request->lang;
        $user->country_id = $request->country_id;
        $user->city_id = $request->city_id;
        // $user->email = $request->email;
        $user->pio = $request->cv;
        $user->save();

        if ($request->type != null) {
            $types = json_decode($request->type, true);

            foreach ($types as $type) {
                $is_ext = UserCategory::where('user_id', $user->id)->where('type_id', $type)->first();
                if ($is_ext) {
                    continue;
                }
                $usertype = new UserCategory();
                $usertype->user_id = $user->id;
                $usertype->type_id = $type;
                $usertype->save();
            }
        }
        $social = $user->soical;
        if ($social == null) {
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
        } else {
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
        foreach ($request->title as $key => $q) {
            $ans = new UserAnswer();
            $ans->user_id = auth('api')->id();
            $ans->question = $request->title[$key];
            $ans->answer = $request->answer[$key];
            $ans->save();
        }
        $userRes = new  UserNormalAuthResource($user);
        return $this->sendResponse($userRes, 'تم تعديل البيانات بنجاح');
    }
    public function edit_profile_step_2(Request $request)
    {
        $user = auth('api')->user();
        $user->pio = $request->cv;
        $user->save();

        if ($request->type != null) {
            $types = json_decode($request->type, true);

            foreach ($types as $type) {
                $is_ext = UserCategory::where('user_id', $user->id)->where('type_id', $type)->first();
                if ($is_ext) {
                    continue;
                }
                $usertype = new UserCategory();
                $usertype->user_id = $user->id;
                $usertype->type_id = $type;
                $usertype->save();
            }
        }
        $userRes = new  UserNotAuthResource($user);
        return $this->sendResponse($userRes, 'تم تعديل البيانات بنجاح');
    }
    public function edit_profile_step_3(Request $request)
    {
        $user = auth('api')->user();
        $social = $user->soical;
        if ($social == null) {
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
        } else {
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
        $userRes = new  UserNotAuthResource($user);
        return $this->sendResponse($userRes, 'تم تعديل البيانات بنجاح');
    }
    public function edit_profile_step_4(Request $request)
    {
        foreach ($request->title as $key => $q) {
            $ans = new UserAnswer();
            $ans->user_id = auth('api')->id();
            $ans->question = $request->title[$key];
            $ans->answer = $request->answer[$key];
            $ans->save();
        }
        return $this->sendResponse('success', 'success');
    }
    public function profile()
    {
        $user = auth('api')->user();
        $userRes = new  UserNotAuthResource($user);
        return $this->sendResponse($userRes, 'الملف الشخصي');
    }
    public function type_of_user()
    {
        $category = Category::ofType('user')->orderBy('id', 'asc')->get();
        $userRes = CategoryResource::collection($category);
        return $this->sendResponse($userRes, 'جميع المجالات الخاصة بالمستخدمين');
    }
    public function get_blog()
    {
        $blogs = Blog::where('user_id', auth('api')->id())->orderBy('id', 'desc')->paginate(5);
        $res = BlogResource::collection($blogs)->response()->getData(true);
        return $this->sendResponse($res, 'جميع المقالات');
        // return ['success'=>true,'blogs'=>BlogResource::collection($blogs)->response()->getData(true),'message'=>'جميع المقالات'];
    }

    public function get_consultations()
    {
        $cons = Consulting::where('user_id', auth('api')->id())->orderby('id', 'desc')->paginate(5);
        $res = ConsultingResource::collection($cons)->response()->getData(true);
        return $this->sendResponse($res, 'جميع الاستشارات');
    }
    public function get_videos()
    {
        $cons = Video::where('user_id', auth('api')->id())->orderby('id', 'desc')->paginate(5);
        $res = VideoResource::collection($cons)->response()->getData(true);
        return $this->sendResponse($res, 'جميع الاستشارات');
    }
    public function get_service()
    {
        $service = Service::where('user_id', auth('api')->id())->orderby('id', 'desc')->paginate(5);
        $res = ServiceResource::collection($service)->response()->getData(true);
        return $this->sendResponse($res, 'جميع الخدمات  ');
    }
    public function get_podcasts()
    {
        $service = NewPodcast::where('user_id', auth('api')->id())->orderby('id', 'desc')->paginate(5);
        $res = PodcastResource::collection($service)->response()->getData(true);
        return $this->sendResponse($res, 'جميع البدوكاست  ');
    }
    public function my_service_buy()
    {
        $user = auth('api')->user();
        $orders = $user->orders;
        $service = [];
        foreach ($orders as $order) {
            foreach ($order->orderdetiles as $detile) {
                if ($detile->type == 'service') {
                    array_push($service, $detile->id);
                }
            }
        }
        $services = OrderDetiles::whereIn('id', $service)->get();
        $res['service'] = ServiceBuyResource::collection($services);

        return $this->sendResponse($res, 'جميع الخدمات المشتراه  ');
    }
    public function my_consultations_buy()
    {
        $user = auth('api')->user();
        $orders = $user->orders;
        $cons = [];
        foreach ($orders as $order) {
            foreach ($order->orderdetiles as $detile) {
                if ($detile->type == 'consultation') {
                    array_push($cons, $detile->id);
                }
            }
        }
        $consltuin = OrderDetiles::whereIn('id', $cons)->get();
        $res['consulting'] = CounsutionBuyResource::collection($consltuin);
        return $this->sendResponse($res, 'جميع الاستشارات المشتراه  ');
    }
    public function order()
    {
        $user = auth('api')->user();
        $orders = $user->orders;
        $res = OrderResource::collection($orders);
        return $this->sendResponse($res, 'جميع الطلبات');
    }
    public function order_show($id)
    {

        $order = Order::find($id);
        $res = new OrderResource($order);
        return $this->sendResponse($res, 'الطلب');
    }

    public function get_markter_blog($id)
    {
        $blogs = Blog::where('user_id', $id)->orderBy('id', 'desc')->paginate(5);
        $res = BlogResource::collection($blogs)->response()->getData(true);
        return $this->sendResponse($res, 'جميع المقالات');
        // return ['success'=>true,'blogs'=>BlogResource::collection($blogs)->response()->getData(true),'message'=>'جميع المقالات'];
    }

    public function get_markter_consultations($id)
    {
        $cons = Consulting::where('user_id', $id)->orderby('id', 'desc')->paginate(5);
        $res = ConsultingResource::collection($cons)->response()->getData(true);
        return $this->sendResponse($res, 'جميع الاستشارات');
    }
    public function get_markter_videos($id)
    {
        $cons = Video::where('user_id', $id)->orderby('id', 'desc')->paginate(5);
        $res = VideoResource::collection($cons)->response()->getData(true);
        return $this->sendResponse($res, 'جميع الاستشارات');
    }
    public function get_markter_service($id)
    {
        $service = Service::where('user_id', $id)->orderby('id', 'desc')->paginate(5);
        $res = ServiceResource::collection($service)->response()->getData(true);
        return $this->sendResponse($res, 'جميع الخدمات  ');
    }
    public function get_markter_podcasts($id)
    {
        $service = Podacst::where('user_id', $id)->orderby('id', 'desc')->paginate(5);
        $res = PodcastResource::collection($service)->response()->getData(true);
        return $this->sendResponse($res, 'جميع البدوكاست  ');
    }
}
