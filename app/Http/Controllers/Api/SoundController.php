<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Api\BaseController;
use App\Models\Sound;
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
            $sound->mp3 = $filename;
            $sound->user_id = auth('api')->id();
            $sound->save();
            return $sound;
        }
    }
}
