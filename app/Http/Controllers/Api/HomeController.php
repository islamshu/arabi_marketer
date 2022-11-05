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
use App\Http\Resources\CategoryBlogResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\HowItWorksResourse;
use App\Http\Resources\QuestionResourse;
use App\Http\Resources\UserNotAuthResource;
use App\Http\Resources\UserResource;
use App\Models\AboutPage;
use App\Models\Category;
use App\Models\HowItWork;
use App\Models\Quastion;
use App\Models\User;
use FeedReader;
use SimpleXMLElement;
use View;

class HomeController extends BaseController
{
    public function home()
    {
        $about_section = AboutPage::select('title', 'body')->first();
        $res['about'] = $about_section;

        $howItWork = HowItWork::orderby('order', 'asc')->get();
        $hows = HowItWorksResourse::collection($howItWork);
        $res['howItWorks'] = $hows;

        $services = ServiceResource::collection(Service::orderby('id', 'desc')->take(6)->get());
        $res['all_scope'] = CategoryResource::collection(Category::ofType('user')->get());

        $res['service']['home'] = $services;
        $res['service']['new'] = $services;
        $res['service']['best'] = $services;

        $blogs = BlogResource::collection(Blog::orderBy('id', 'desc')->take(6)->get());
        $res['blog']['category'] = CategoryBlogResource::collection(Category::ofType('blog')->get());

        $res['blog']['new'] = $blogs;
        $res['blog']['best'] = $blogs;
        $markter = User::where('type', 'marketer')->where('status', 1)->take(4)->get();
        $res['markter'] = UserNotAuthResource::collection($markter);


        $cons = ConsultingResource::collection(Consulting::orderby('id', 'desc')->take(3)->get());
        $res['consuliong'] = $cons;


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

    public function edit(Request $request)
    {
        // $array = [34,36];
        // dd($request->all());

    }
    public function rssa()
    {
        $f = FeedReader::read('https://feeds.soundcloud.com/users/soundcloud:users:186745249/sounds.rss');

        dd($f, $f->get_title());
        // echo $f->get_items()[0]->get_title();
        // echo $f->get_items()->get_content();
    }
    public function rss()
    {
        $content = file_get_contents('https://feeds.soundcloud.com/users/soundcloud:users:1118915026/sounds.rss');
        $flux = new SimpleXMLElement($content);
        return View::make('pages.rss', compact('flux'));
    }
 
    public function questions()
    {
        $questions = Quastion::orderby('id','desc')->get();
        $res = QuestionResourse::collection($questions);
        return $this->sendResponse($res, 'all question');


    }
}
