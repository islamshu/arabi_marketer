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
use App\Http\Resources\FaqsResource;
use App\Http\Resources\HowItWorksResourse;
use App\Http\Resources\QuestionResourse;
use App\Http\Resources\ToolsResoures;
use App\Http\Resources\UserInOtherResourse;
use App\Http\Resources\UserNotAuthResource;
use App\Http\Resources\UserResource;
use App\Models\AboutPage;
use App\Models\Category;
use App\Models\Faqs;
use App\Models\HowItWork;
use App\Models\NewPodcast;
use App\Models\Quastion;
use App\Models\Tools;
use App\Models\User;
use Carbon\Carbon;
use FeedReader;
use SimpleXMLElement;
use View;

class HomeController extends BaseController
{


    public function about(){
        $about_section = AboutPage::select('title', 'body')->first();
        $res['about'] = $about_section;
        $howItWork = HowItWork::orderby('order', 'asc')->get();
        $hows = HowItWorksResourse::collection($howItWork);
        $res['howItWorks'] = $hows;
        return $this->sendResponse($res, 'home page');

    }
    
    public function return_exchange_policy(){
        $res =[
            'body' => get_general_value('return_exchange_policy')
        ];
        return $this->sendResponse($res, 'return exchange policy page');
    }
    public function usage_policy(){
        $res =[
            'body' => get_general_value('usage_policy')
        ];
        return $this->sendResponse($res, 'usage policy page');
    }

    public function privacy_policy(){
        $res =[
            'body' => get_general_value('privacy_policy')
        ];
        return $this->sendResponse($res, 'privacy policy page');
    }
    public function pay_policy(){
        $res =[
            'body' => get_general_value('pay_policy')
        ];
        return $this->sendResponse($res, 'pay policy page');
    }
    public function faqs(){
        $faqs = Faqs::orderby('sort','asc')->get();
        $res = FaqsResource::collection($faqs);
        return $this->sendResponse($res, ' faqs page');

    }

    

    
    public function about_forntend(){
        $res =[
            'body' => get_general_value('about_frontend')
        ];
        return $this->sendResponse($res, 'about page');
    }
    public function get_home_tools(){
        $res['all_tools'] = ToolsResoures::collection(Tools::orderby('id','desc')->take(8)->get());
        return $this->sendResponse($res, 'home page');
    }
    public function single_tool($id){
        $res = new ToolsResoures(Tools::find($id));
        return $this->sendResponse($res, 'home page');
    }
    public function all_scope(){
        $res['all_scope'] = CategoryResource::collection(Category::ofType('user')->get());
        return $this->sendResponse($res, 'home page');
    }
    public function get_service(){

        $services = ServiceResource::collection(Service::orderby('id', 'desc')->take(6)->get());

        $res['service']['home'] = $services;
        $res['service']['new'] = $services;
        $res['service']['best'] = $services;
        return $this->sendResponse($res, 'home page');

    }
    public function get_blog(){
        $blogs = BlogResource::collection(Blog::where('publish_time','<=',now())->orderBy('id', 'desc')->take(3)->get());
        // $res['blog']['category'] = CategoryBlogResource::collection(Category::ofType('blog')->get());

        $res['blog']['new'] = $blogs;
        $res['blog']['best'] = $blogs;
        return $this->sendResponse($res, 'home page');

    }
    public function get_markter_home(){

        $markter = User::where('type', 'marketer')->where('status', 1)->take(5)->get();
        $markter2 = User::where('type', 'marketer')->where('status', 1)->skip(5)->take(5)->get();

        $res['markter'] = UserInOtherResourse::collection($markter);
        $res['markter2'] = UserInOtherResourse::collection($markter2);
        return $this->sendResponse($res, 'home page');

    }
    public function main_image(){
        $images = [
            'markert_image_page'=>asset('public/uploads/markters_image.png'),
            'home_image_page'=>asset('public/uploads/home_image_page2.jpg'),
        ];
        return $this->sendResponse($images, 'all image page');  
    }
    public function first_section(){
        $res['auth']=[
            'title'=>get_general_value('auth_title') ,
            'body'=>get_general_value('auth_body') ,
            'image'=>asset('public/uploads/'.get_general_value('home_image_section')),
        ];
        $res['not_auth']=[
            'title'=>get_general_value('not_auth_title') ,
            'body'=>get_general_value('not_auth_body') ,
            'image'=>asset('public/uploads/'.get_general_value('home_image_section')),

        ];
    
        return $this->sendResponse($res, 'all image page');  
    }

    
    public function get_consulting(){
        $cons = ConsultingResource::collection(Consulting::orderby('id', 'desc')->take(3)->get());
        $res['consuliong'] = $cons;
        return $this->sendResponse($res, 'home page');

    }
    public function get_video(){
        
        $videos = VideoResource::collection(Video::orderBy('id', 'desc')->take(4)->get());
        $res['video'] = $videos;
        return $this->sendResponse($res, 'home page');

    }
    public function get_podcast()
    {
        $podd = NewPodcast::orderBy('id', 'desc')
        ->with(['user' => function ($query) {
            $query->where('type', 'marketer');
        }])->take(3)->get();
        $podcast = PodcastResource::collection($podd);
        $res['Podcast'] = $podcast;

        return $this->sendResponse($res, 'home page');
    }
    public function get_podcast_admin()
    {
        $podd = NewPodcast::orderBy('id', 'desc')
        ->whereHas('user', function ($query) {
            return $query->where('type', 'Admin');
        })->take(3)->get();
        $podcast = PodcastResource::collection($podd);
        $res['Podcast'] = $podcast;

        return $this->sendResponse($res, 'home page');
    }
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
        $markter = User::where('type', 'marketer')->where('status', 1)->take(8)->get();
        $res['markter'] = UserNotAuthResource::collection($markter);


        $cons = ConsultingResource::collection(Consulting::orderby('id', 'desc')->take(3)->get());
        $res['consuliong'] = $cons;


        $videos = VideoResource::collection(Video::orderBy('id', 'desc')->take(4)->get());
        $res['video'] = $videos;


        $podcast = PodcastResource::collection(NewPodcast::orderBy('id', 'desc')->take(3)->get());
        $res['Podcast'] = $podcast;

        return $this->sendResponse($res, 'home page');
    }
    public function testapi(Request $request){
        $mystring = 'islamshu12@gmail.com';
        $first = strtok($mystring, '@');
        dd($first);
    }
    public function get_markter($id)
    {
        // $name = str_replace('@','',$id);
        $user = User::where('mention',$id)->first();
        if ($user) {
            // if ($user->type != 'marketer' || $user->type != 'Admin') {
            //     return $this->sendError('هذا ليس حساب مسوق !');
            // }
            $userRes = new  UserNotAuthResource($user);
            return $this->sendResponse($userRes, 'الملف الشخصي');
        } else {


            return $this->sendError('لا يوجد حساب !');
        }
    }
    public function get_all_markter()
    {
        $users = User::where('status', 1)
        ->whereHas('blogs')
        ->orWhereHas('videos')
        ->orWhereHas('podcasts')
        ->orWhereHas('consutiong')
        ->orWhereHas('services')
        ->where('type', 'marketer')
        ->get();
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
        // $res['sinlge'] = QuestionResourse::collection($questions->where('type','single'));
        // $res['multi'] = QuestionResourse::collection($questions->where('type','!=','single'));
        return $this->sendResponse($res, 'all question');


    }
}
