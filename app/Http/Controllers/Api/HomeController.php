<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Resources\ConsultingResource;
use App\Http\Resources\PodcastResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\VideoResource;
use App\Models\Blog;
use App\Models\Consulting;
use App\Models\Podacst;
use App\Models\Service;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class HomeController extends BaseController
{
    public function home(){
        $services = ServiceResource::collection(Service::orderby('id','desc')->take(6)->get());
        $res['service']['new']= $services;
        $res['service']['best']= $services;

        $blogs = BlogResource::collection(Blog::orderBy('id','desc')->take(6)->get());
        $res['blog']['new']= $blogs;
        $res['blog']['best']= $blogs;

        $videos = VideoResource::collection(Video::orderBy('id','desc')->take(4)->get());
        $res['video']= $videos;

        
        $podcast = PodcastResource::collection(Podacst::orderBy('id','desc')->take(3)->get());
        $res['Podcast']= $podcast;

        return $this->sendResponse($res,'home page');
        


    }
}
