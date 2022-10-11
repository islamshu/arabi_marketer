<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogKeyword;
use App\Models\Category;
use App\Models\KeyWord;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\BlogResource;
use App\Http\Resources\KeywordResource;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use DateInterval;
use DatePeriod;
use DateTime;
use Validator;

class BlogController extends BaseController
{
    public function blog_category()
    {
        $category = Category::ofType('blog')->orderBy('id', 'asc')->get();
        $userRes = KeywordResource::collection($category);
        return $this->sendResponse($userRes, 'جميع الكلمات المفتاحية الخاصة بالمقالات');
    }
    public function blog_keyword()
    {
        $category = KeyWord::ofType('blog')->orderBy('id', 'asc')->get();
        $userRes = CategoryResource::collection($category);
        return $this->sendResponse($userRes, 'جميع التصنيفات الخاصة بالمقالات');
    }
    public function get_all()
    {
        $blogs = Blog::orderBy('id', 'desc')->paginate(6);
        $res = BlogResource::collection($blogs)->response()->getData(true);
        return $this->sendResponse($res, 'جميع المقالات');
        // return ['success'=>true,'blogs'=>BlogResource::collection($blogs)->response()->getData(true),'message'=>'جميع المقالات'];
    }
    public function get_week()
    {
        $date1 = Carbon::parse('2022-10-01');
        $date_name = strtoupper($date1->format('l'));
        $date2 = Carbon::parse('2022-10-30');

        $p = new DatePeriod(
            new DateTime($date1), 
            new DateInterval('P1W'), 
            new DateTime($date2)
        );
        $dates =[];
        
        foreach ($p as $key=> $w) {
            if($key == 0){
                $dates[$key]['start']= Carbon::parse($w);
                $dates[$key]['end']= Carbon::parse($w)->addDays(7);
            }else{
                $dates[$key]['start']= Carbon::parse($w)->addDays(1);
                $dates[$key]['end']= Carbon::parse($w)->addDays(7);
            }
            $dateddd = Carbon::parse($w)->addDays(7);
            
            if ($dateddd->gt($date2)) { 
                $dates[$key]['start']= Carbon::parse($w)->addDays(1);
                $dates[$key]['end']=$date2 ;
            }
         

        }
        return($dates);
    }
    public function serach(Request $request){
        $title = $request->title;
        $query = Blog::query();
        $query->when(request('title') != null, function ($q) use ($title) {
            return $q->where('title','like',$title);
        });
        $blogs = $query->paginate(6);

        $res = BlogResource::collection($blogs)->response()->getData(true);
        return $this->sendResponse($res, 'جميع المقالات');

    }
    public function single($id){
        $blog = Blog::find($id);
        $res = new BlogResource($blog);
        return $this->sendResponse($res,'تم أرجاع المقال بنجاح');
    }


    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title'=>'required',
            'description' => 'required',
            'image'=>'required',
            'category'=>'required',
            'keywords'=>'required', 
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }
        $service = new Blog();
        $service->title = ['ar' => $request->title, 'en' => $request->title];
        $service->description = ['ar' => $request->description, 'en' => $request->description];
        $service->image = $request->image->store('blog');
        $service->user_id = 3;
        $service->save();
        $category = json_decode($request->category);
        // $categorys = explode(',', $request->keywords);
        foreach ($category as $category) {
            $cat = new BlogCategory();
            $cat->blog_id = $service->id;
            $cat->category_id = $category;
            $cat->save();
        }

        // dd($request->keywords);
        $keywords = explode(',', $request->keywords);
        foreach ($keywords as $s) {
            $keyword = KeyWord::ofType('blog')->where('title', $s)->first();
            if ($keyword) {
                $key = new BlogKeyword();
                $key->blog_id = $service->id;
                $key->keyword_id = $keyword->id;
                $key->save();
            } else {

                $keyword = new KeyWord();
                $keyword->title = ['ar' => $s, 'en' => $s];
                $keyword->type = 'blog';
                $keyword->save();

                $key = new BlogKeyword();
                $key->blog_id = $service->id;
                $key->keyword_id = $keyword->id;
                $key->save();
            }
        }

        $res = new BlogResource($service);
        return $this->sendResponse($res,'تم الاضافة بنجاح');

    }
}
