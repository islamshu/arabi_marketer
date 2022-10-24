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
use App\Models\User;
use Carbon\Carbon;
use Hash;
use Mail;
use Str;
use Validator;

class ForgotPasswordController extends BaseController
{
    public function forgot(Request $request)
    {
        $credentials = request()->validate(['email' => 'required|email']);
        $cc = CodeMail::where('email', $request->email)->first();
        if ($cc) {
            $cc->delete();
        }
        $code = new CodeMail();
        $code->email = $request->email;
        $code->code = rand(11111, 99999);
        $code->save();

        Mail::to(request()->email)->send(new SendResetMail($code));


        return $this->sendResponse('forget', 'Reset password link sent on your email id.');
    }


    public function reset(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'code' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }
        $code = CodeMail::where('code', $request->code)->first();
        if (!$code) {
            return $this->sendError('خطأ بالرمز المرسل');
        }
        $email = $code->email;
        $user = User::where('email', $email)->first();
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        $code->delete();
        return $this->sendResponse('reset', "Password has been successfully changed");
    }
}
