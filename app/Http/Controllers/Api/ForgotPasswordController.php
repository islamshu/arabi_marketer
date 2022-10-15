<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Api\BaseController;
use App\Mail\SendResetMail;
use App\Models\Password as ModelsPassword;
use Mail;
use Str;

class ForgotPasswordController extends BaseController
{
    public function forgot() {
        $credentials = request()->validate(['email' => 'required|email']);

      $password =   ModelsPassword::create([
        'email'=>request()->email,
        'token'=>Str::random(60),
        ]);
        $url = route('api_reset').'/'.$password->token;
        Mail::to(request()->email)->send(new SendResetMail($url));


        return $this->sendResponse('forget','Reset password link sent on your email id.');
    }


    public function reset(ResetPasswordRequest $request) {
        $reset_password_status = Password::reset($request->validated(), function ($user, $password) {
            $user->password = $password;
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return $this->sendError('INVALID_RESET_PASSWORD_TOKEN');
        }

        return $this->sendResponse('reset',"Password has been successfully changed");
    }
}
