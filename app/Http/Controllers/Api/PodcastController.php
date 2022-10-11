<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\KeywordResource;
use App\Models\Category;
use App\Models\KeyWord;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\PodcastResource;
use App\Models\Podacst;
use App\Models\PodacstKeyword;
use App\Models\PodcastCategory;
use Validator;

class PodcastController extends BaseController
{
    public function podcast_category(){
        $category = Category::ofType('podcast')->orderBy('id', 'asc')->get();
        $userRes =KeywordResource::collection($category);
        return $this->sendResponse($userRes,'جميع التصنيفات الخاصة بالخدمات');

    }
    public function podcast_keyword(){
        $category = KeyWord::ofType('podcast')->orderBy('id', 'asc')->get();
        $userRes =CategoryResource::collection($category);
        return $this->sendResponse($userRes,'جميع الكلمات المفتاحية الخاصة بالخدمات');
    }
    public function get_all(){
       $service = Podacst::orderby('id','desc')->paginate(5);
       $res = PodcastResource::collection($service)->response()->getData(true);
        return $this->sendResponse($res,'جميع البودكاست  ');
    }
    public function single($id){
        $service = Podacst::find($id);
        $ser = new PodcastResource($service);
        return $this->sendResponse($ser,' تم ارجاع البودكاست بنجاح');
    }
    public function store(Request $request){
        // dd($request->image);
        $validation = Validator::make($request->all(), [
            'title'=>'required',
            'description' => 'required',
            'image'=>'required',
            'types'=>'required',
            'keywords'=>'required', 
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }
            $service = new Podacst();
            $service->title = $request->title;
            $service->description = $request->description;
            $service->url = $request->google_SSR;
            $service->apple_url  = $request->apple_SSR ;
            $service->sound_url  = $request->soundCloud_SSR ;
            $service->user_id = auth('api')->id();
            $service->time = $request->time;
            $service->image = $request->image->store('podcast');
            $service->save();


            foreach ($request->types as $category) {
                $cat = new PodcastCategory();
                $cat->podcast_id = $service->id;
                $cat->category_id = $category;
                $cat->save();
            }

            // dd($request->keywords);
            $keywords = explode(',', $request->keywords);

            foreach ($keywords as $s) {
                $keyword = KeyWord::ofType('podcast')->where('title',$s)->where('title',$s)->first();
                if ($keyword) {
                    $key = new PodacstKeyword();
                    $key->podcast_id = $service->id;
                    $key->keyword_id = $keyword->id;
                    $key->save();
                } else {

                    $keyword = new KeyWord();
                    $keyword->title = ['ar' =>$s, 'en' =>$s];
                    $keyword->type = 'podcast';
                    $keyword->save();

                    $key = new PodacstKeyword();
                    $key->podcast_id = $service->id;
                    $key->keyword_id = $keyword->id;
                    $key->save();
                }
            }



            $res = new PodcastResource($service);
            return $this->sendResponse($res,'Addedd succeffuly');


    }
}
