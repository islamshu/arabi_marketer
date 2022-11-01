<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Api\BaseController;
use App\Models\Sound;
use App\Models\User;
use Symfony\Component\Console\Input\Input;

class SoundController extends BaseController
{
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'sound' => 'mimes:mp3',
        ]);

        $music_file = $request->sound;
        $sound = new Sound();

        if (isset($music_file)) {
            $filename = $music_file->getClientOriginalName();
            $location = public_path('audio/');
            $music_file->move($location, $filename);
            $sound->sound = $filename;
            $sound->user_id = auth('api')->id();
            $sound->save();
            return $sound;
        }
    }
    public function rss_feed($id){
        $user = User::find($id);
        if($user->type != 'marketer'){
            $this->sendError('هناك خطأ');
        }else{
            $sound = Sound::where('user_id',$user->id)->get();
            return view('pages.rss')->with('sounds',$sound)->with('user',$user);
        }
    }
}
