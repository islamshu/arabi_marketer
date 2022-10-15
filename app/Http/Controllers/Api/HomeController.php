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
use App\Http\Resources\UserNotAuthResource;
use App\Models\User;

class HomeController extends BaseController
{
    public function home()
    {
        $services = ServiceResource::collection(Service::orderby('id', 'desc')->take(6)->get());
        $res['service']['new'] = $services;
        $res['service']['best'] = $services;

        $blogs = BlogResource::collection(Blog::orderBy('id', 'desc')->take(6)->get());
        $res['blog']['new'] = $blogs;
        $res['blog']['best'] = $blogs;

        $videos = VideoResource::collection(Video::orderBy('id', 'desc')->take(4)->get());
        $res['video'] = $videos;


        $podcast = PodcastResource::collection(Podacst::orderBy('id', 'desc')->take(3)->get());
        $res['Podcast'] = $podcast;

        return $this->sendResponse($res, 'home page');
    }
    public function get_markter($id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->type != 'marketer') {
                return $this->sendError('هذا ليس حساب مسوق !');
            }
            $userRes = new  UserNotAuthResource($user);
            return $this->sendResponse($userRes, 'الملف الشخصي');
        } else {
            return $this->sendError('لا يوجد حساب !');
        }
    }
    public function get_all_markter()
    {
        $users = User::where('type', 'marketer')->where('status', 1)->get();
        $res = UserNotAuthResource::collection($users)->response()->getData(true);
        return $this->sendResponse($res, 'all markters');
    }
}
