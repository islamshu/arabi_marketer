<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Socialite;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\UserNormalAuthResource;
use Validator;

class GoogleController extends BaseController
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
      
            $user = Socialite::driver('google')->stateless()->user();
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
                $userRes =new  UserNormalAuthResource($finduser);
                return $this->sendResponse($userRes,'تم الدخول بنجاح');
            }else{
                
                $user_val = User::where('email',$user->email)->first();
                if($user_val){
                    return $this->sendError('البريد الالكتروني مسجل من قبل');

                }
                $newUser = User::create([
                    'name' => 'google_user_name_',
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'type'=>'user',
                    'image'=> 'users/defult_user.png',
                    'password' => encrypt('159753')
                ]);
      
                $userRes =new  UserNormalAuthResource($newUser);
                return $this->sendResponse($userRes,'تم التسجيل بنجاح');
            }
      
    }
}
