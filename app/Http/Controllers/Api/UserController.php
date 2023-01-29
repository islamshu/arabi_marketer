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
use App\Http\Resources\MyblogResourese;
use App\Http\Resources\myPorofileResoures;
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
use App\Mail\WelcomEmail;
use App\Mail\WelcomRgister;
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
use App\Models\Specialty;
use App\Models\UserAnswer;
use App\Models\UserCategory;
use App\Models\VendorChat;
use App\Models\Video;
use App\Notifications\GeneralNotification;
use Carbon\Carbon;
use DB;
use Mail;
use Notification;
use Validator;

class UserController extends BaseController
{
   
    public function create_markter(){
        return view('pages.marketers.create');
    }
   
    public function marketer_category(){
        return view('pages.marketers.create');
    }
    public function number_in_follower_range(){
        $ar['first']= get_general_value('first_follow_range');
        $ar['secand']= get_general_value('secand_follow_range');
        $ar['third']= get_general_value('third_follow_range');
        $ar['four']= get_general_value('fourth_follow_range');
        return $this->sendResponse($ar, 'جميع ارقام المتابعين ');


    }
    public function creator_pending(){
        return view('pages.marketers.pending')->with('users',User::has('markter_order')->get());
    }
    public function marketer_search(Request $request){
        $title = $request->title;
        $query = User::query()->where('type','marketer');
        $category = array();
        $query->where('status', 2);
        // $query->when($request->title != null, function ($q) use ($title) {
        //      $q->where('first_name','like','%'.$title.'%' )->orWhere('last_name','like','%'.$title.'%');
        // });

        $cat = Specialty::where('title->en','like','%'.$title.'%')->first();
        $id_cat = $cat->id;
        $query->when($request->title != null, function ($q) use ($id_cat) {
            return $id_cat;
            return $q->whereHas('specialty',function ($query) use ($id_cat) {
                $query->where('type_id', $id_cat);
            });
        });
        // if($cat != null){
        //     $id_cat = $cat->id;
        //     $query->when($request->title != null, function ($q) use ($id_cat) {
        //         return $q->whereHas('specialty',function ($query) use ($id_cat) {
        //             $query->where('type_id', $id_cat);
        //         });
        //     });
        // }
       
        $cats = explode(',',$request->category_id);


        $query->when($request->category_id != null && $request->category_id != 'undefined', function ($q) use ($cats) {
            return $q->whereHas('specialty',function ($query) use ($cats) {
                $query->whereIn('type_id', $cats);
            });
        });


        $blogs = $query->paginate(9);

        $res = UserResource::collection($blogs)->response()->getData(true);
        return $this->sendResponse($res, 'جميع صناع المحتوى');
    }
    
    
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
        $not = DB::table('notifications')->where('id', $id)->first();
        // return json_decode($not->data)->title;
        // return (string)json_encode($notification->data['title']);
        // $no = json_decode($notification);
        // $res = new NotificationResourse($notification);
        $date = Carbon::parse($not->created_at); // now date is a carbon instance

        $res = [
            'id' => $not->id,
            'title' => json_decode($not->data)->title,
            'url' => json_decode($not->data)->url,
            'is_read' => $not->read_at != null ? 1 : 0,
            'created_at' => $not->created_at,
            'time'=>$date->diffForHumans()

        ];
        return $this->sendResponse($res, 'جميع الاشعارات');
    }
    public function check_name(Request $request)
    {
        if($request->mention == null){
            return $this->sendError('يرجى ادخال اسم');

        }
        $user = User::where('mention','@'.$request->mention)->first();
        if ($user) {
            return $this->sendError('الاسم مستخدم');
        } else {
            return $this->sendResponse('success', 'الاسم متاح');
        }
    }
    public function edit_pio(Request $request)
    {
        $user = auth('api')->user();
        if($request->pio == null){
            return $this->sendError('يرجى ال pio الخاص بك ');

        }
        $user->pio = $request->pio;
        $user->save();

        return $this->sendResponse('success', 'تم تعديل الpio ');

    }
    public function edit_profile_user(Request $request){
        $user = auth('api')->user();
        $validation = Validator::make($request->all(), [
        
            'first_name' => 'required',
            'last_name' => 'required',
            'country_id' => 'required',

        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->first());
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->country_id = $request->country_id;
        $user->save();
        return $this->sendResponse('success', 'تم تعديل  البروفايل');

    }
    public function edit_password(Request $request){
        $user = auth('api')->user();
        $validation = Validator::make($request->all(), [
        
            'old_password' => 'required',
            'new_password' => 'required|different:old_password',
            'confirm_password' => 'required|same:new_password',

        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->first());
        }
        if (Hash::check($request->old_password, $user->password)) {
               $user->password= Hash::make($request->new_password);
               $user->required_change= 0;
               $user->save();
         }else{
            return $this->sendError('كلمة المرور الحالية خاطئة');
 
         }


        return $this->sendResponse('success', 'تم تعديل  البروفايل');

    }
    public function check_mention_name(Request $request){
        if($request->mention == null){
            return $this->sendError('يجب ادخال الاسم');
        }
        $user = auth('api')->user();
        $userr = User::where('mention',$request->mention)->where('id','!=',$user->id)->first(); 
        if($userr){
            return $this->sendError('الاسم مستخدم');
        }else{
            $user->mention = $request->mention;
            $user->save();
            return $this->sendResponse('success', 'يمكنك استخدام الاسم');
  
        }
    }

    
    public function edit_soical(Request $request)
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
            $social->podcast = $request->podcast;
            $social->ecommerce = $request->ecommerce;
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
        return $this->sendResponse('success', 'تم تعديل السوشل ميديا');


            
    }
    
    public function check_email(Request $request)
    {
        if($request->email == null){
            return $this->sendError('يرجى ادخال البريد الاكتروني');

        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            return $this->sendError('البريد الاكتروني مستخدم');
        } else {
            return $this->sendResponse('success', 'البريد متاح ');
        }
    }

    public function change_mention()
    {
        $user = User::get();
        foreach ($user as $us) {
            $us->mention = '@' . str_replace(' ', '_', $us->name) . '_' . $us->id;
            $us->save();
        }
        return true;
    }
    public function register(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $validation = Validator::make($request->all(), [
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'first_name' => 'required',
            'last_name' => 'required',
            'country_id' => 'required',
            'mention' => 'required|unique:users,mention'
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages());
        }

        $user = new User();
        $user->name = $request->first_name;
        $user->email = $request->email;
        $user->mention =  '@'.$request->mention;
        $user->type = 'user';
        $user->cover = 'cover_profile.jpg';
        $user->image = 'users/defult_user.png';
        $user->password =  Hash::make($request->password);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->country_id = $request->country_id;
        $user->save();
        $enc = encrypt($user->id);
        $url = route('send_email.verfy', $enc);
        $date = [
            'id' => $user->id,
            'name' => $user->name,
            'url' => route('customer.show', $user->id),
            'title' => 'لديك مستقل جديد',
            'time' => $user->updated_at
        ];
        $admins = User::where('type', 'Admin')->get();
        Notification::send($admins, new GeneralNotification($date));
        send_notification($date);
        Mail::to($request->email)->send(new WelcomRgister($user->name,$user->email));
        Mail::to($request->email)->send(new VerifyEmail($url));
      
        $userRes = new  UserNormalAuthResource($user);
        return $this->sendResponse($userRes, 'تم التسجيل بنجاح');
    }
    public function send_email()
    {
        // $url = 'd';
        $enc = encrypt(20);
        $url = route('send_email.verfy', $enc);
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
            return $this->sendError($validation->messages());
        }
        $user = User::where('email', $request->email)->where('type', '!=', 'staff')->first();
    
        if ($user) {
            if($user->is_pan == 1){
                $arrrr = [];
                array_push($arrrr, 'هذا المستخدم محظور');
                return $this->sendError($arrrr);
            }
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Personal Access Token')->accessToken;
                if ($user->type == 'user') {
                    $res = new UserNormalAuthResource($user);
                } else {
                    $res = new UserResource($user);
                }
                return $this->sendResponse($res, 'تم تسجيل الدخول بنجاح');
            } else {
                $arrr = [];
                array_push($arrr, 'كلمة المرور غير صحيحة');
                return $this->sendError($arrr);
            }
        } else {
            $arr = [];
            array_push($arr, 'لم يتم العثور على المستخدم');

            return $this->sendError($arr);
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
            $user->message = null;
            $user->status=1;
            $user->save();
            $date = [
                'id' => $user->id,
                'name' => $user->name,
                'url' => route('show_customer_markter', $user->id),
                'title' => 'لديك صانع محتوى جديد',
                'time' => $user->updated_at
            ];
            $date_send = [
                'id' => $user->id,
                'name' => $user->name,
                'url' => 'https://sub.arabicreators.com/marketerProfile',
                'title' => 'سيتم مراجعة طلب ان تكون صانع محتوى خلال ٢٤ ساعة',
                'time' => $user->updated_at
            ];
            $user->notify(new GeneralNotification($date_send));

            $admins = User::where('type', 'Admin')->get();
            Notification::send($admins, new GeneralNotification($date));
               send_notification($date);

            $res = new UserResource($user);
            return $this->sendResponse($res, 'تم ارسال طلبك للادارة');
        } elseif ($user->type == 'marketer') {
            return $this->sendError('انت بالفعل صانع محتوى لدينا ');
        } elseif ($user->type != 'user' && $user->type != 'marketer') {
            return $this->sendError('يوجد خطا ما لدينا');
        }
    }
    public function upload_image(Request $request){
        $user = auth('api')->user();
        if($request->image == null){
            return $this->sendError('يرجى اضافة صورة ');
        }
        $user->image = $request->image->store('users');
        $user->save();
        $userRes = new  UserNormalAuthResource($user);
        return $this->sendResponse($userRes, 'تم تعديل البيانات بنجاح');


    }
    public function chat_with_seller(Request $request,$id){
        $validation = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->first());
        }
        $product = Service::find($id);
        if(!$product){
            return $this->sendError('لم يتم العثور على الخدمة');
        }
        $chat = new VendorChat();
        $chat->title = $request->title;
        $chat->service_id = $id;
        $chat->seller_id = $product->user_id;
        $chat->user_id = auth('api')->id();
        $chat->save();
        return $this->sendResponse('success', 'تم تعديل البيانات بنجاح');

    }
    public function upload_cover(Request $request){
        $user = auth('api')->user();
        if($request->cover == null){
            return $this->sendError('يرجى اضافة صورة ');
        }
        $user->cover = $request->cover->store('users');
        $user->save();
        $userRes = new  UserNormalAuthResource($user);
        return $this->sendResponse($userRes, 'تم تعديل البيانات بنجاح');


    }

    
    public function edit_profile(Request $request)
    {
        $types = json_decode($request->type, true);

        
        $user = auth('api')->user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->lang = 'ar';
        $user->country_id = $request->country_id;
        $user->city_id = $request->city_id;
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
            $social->podcast = $request->podcast;
            $social->ecommerce = $request->ecommerce;
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
        // foreach ($request->title as $key => $q) {
        //     $ans = new UserAnswer();
        //     $ans->user_id = auth('api')->id();
        //     $ans->question = $request->title[$key];
        //     $ans->answer = $request->answer[$key];
        //     $ans->save();
        // }
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
    public function remmeber_markter(){
        $user = auth('api')->user();
        if($user->status == 2){
            $date = [
                'id' => $user->id,
                'name' => $user->name,
                'url' => route('customer.show', $user->id),
                'title' => 'تذكير لمراجعة حالة صناع المحتوى',
                'time' => $user->updated_at
            ];
            $admins = User::where('type', 'Admin')->get();
            Notification::send($admins, new GeneralNotification($date));
               send_notification($date);
            return $this->sendResponse('success', 'تم ارسال تذكير بنجاح');

        }else{
            return $this->sendError('لم يتم ارسال التذكير');
        }
    }
    public function profile()
    {
        $user = auth('api')->user();
        $userRes = new  myPorofileResoures($user);
        return $this->sendResponse($userRes, 'الملف الشخصي');
    }
    public function type_of_user()
    {
        $category = Specialty::orderBy('id', 'asc')->get();
        $userRes = CategoryResource::collection($category);
        return $this->sendResponse($userRes, 'جميع المجالات الخاصة بالمستخدمين');
    }
    public function get_blog(Request $request)
    {

        $blogs = Blog::where('user_id', auth('api')->id())->orderBy('id', 'desc')->paginate(9);
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
