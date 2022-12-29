<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Models\NewPodcast;
use SimpleXMLElement;

class NewPodcastContoller extends BaseController
{
    public function store(Request $request){
        try {

            $content = file_get_contents($request->url);
          
          } catch (\Exception $e) {
            return $this->sendError('الرابط المرسل خاطيء');  
          }
        $flux = new SimpleXMLElement($content);
        $podcast = new NewPodcast();
        $podcast->user_id = auth('api')->id();
        $podcast->type='rss';
        $podcast->url=$request->url;
        $podcast->title = (string)$flux->channel->title;
        $podcast->title = 
        $podcast->save();
        return $this->sendResponse($podcast , 'added sussefuly');
    }
}
