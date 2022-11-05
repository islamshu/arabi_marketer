<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Models\NewPodcast;

class NewPodcastContoller extends BaseController
{
    public function store(Request $request){
        $podcast = new NewPodcast();
        $podcast->user_id = auth('api')->id();
        $podcast->type='rss';
        $podcast->url=$request->url;
        $podcast->save();
        return $this->sendResponse($podcast , 'added sussefuly');
    }
}
