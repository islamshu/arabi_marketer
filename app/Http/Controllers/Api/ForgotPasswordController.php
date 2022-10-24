<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Api\BaseController;
use App\Mail\SendResetMail;
use App\Models\CodeMail;
use App\Models\Password as ModelsPassword;
use Carbon\Carbon;
use Mail;
use Str;

class ForgotPasswordController extends BaseController
{
    public function forgot(Request $request) {
        $credentials = request()->validate(['email' => 'required|email']);

        $code = new CodeMail();
        $code->email = $request->email;
        $code->code = rand(11111,99999);
        $code->save();

        Mail::to(request()->email)->send(new SendResetMail($code));


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
