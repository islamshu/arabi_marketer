<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Api\BaseController;
use App\Models\Sound;

class SoundController extends BaseController
{
    public function store(Request $request){
        $validation = Validator::make($request->all(), [
            'sound'=>'mimes:mp3',
        ]);
        $sound = new Sound();
        $sound->sound = $request->sound->store('sound');
        $sound->user_id = auth('api')->id();
        $sound->save();
        return asset('public/uploads/'.$sound->sound);
    }
}
