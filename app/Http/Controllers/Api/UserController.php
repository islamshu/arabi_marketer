<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\BlogResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\UserNotAuthResource;
use App\Http\Resources\UserResource;
use App\Models\Blog;
use App\Models\Category;
use App\Models\SouialUser;
use App\Models\UserCategory;
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
        dd($request->all());

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = 'user';
        $user->password =  Hash::make($request->password);
        $user->save();
        $userRes =new  UserNotAuthResource($user);
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
                $res = New UserResource($user);
                return $this->sendResponse($res,'تم تسجيل الدخول بنجاح');
            } else {
                return $this->sendError('كلمة المرور غير صحيحة');
            }
        } else {
            return $this->sendError('لم يتم العثور على المستخدم');

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
        $userRes =new  UserNotAuthResource($user);
        return $this->sendResponse($userRes,'تم تعديل البيانات بنجاح');
    }
    public function edit_profile_step_2(Request $request){
        $user = auth('api')->user();
        $user->pio = $request->cv;
        $user->save();
        if($request->type != null){
            foreach($request->type as $type){
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
        foreach($user->socials as $s){
            $s->delete();
        }
        foreach($request->social as $social){
            $usersocial = new SouialUser();
            $usersocial->user_id = $user->id;
            $usersocial->url = $social;
            $usersocial->save();
        }
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
}
