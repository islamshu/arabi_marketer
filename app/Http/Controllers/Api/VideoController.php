<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\KeywordResource;
use App\Http\Resources\VideoResource;
use App\Models\Category;
use App\Models\KeyWord;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Models\VideoCateogry;
use App\Models\VideoKeyword;
use Youtube;

class VideoController extends BaseController
{
    public function video_category(){
        $category = Category::ofType('video')->orderBy('id', 'asc')->get();
        $userRes =KeywordResource::collection($category);
        return $this->sendResponse($userRes,'جميع التصنيفات الخاصة بالفيديوهات');

    }
    public function video_keyword(){
        $category = KeyWord::ofType('video')->orderBy('id', 'asc')->get();
        $userRes =CategoryResource::collection($category);
        return $this->sendResponse($userRes,'جميع الكلمات المفتاحية الخاصة بالفيديوهات');
    }
    public function single($id){
        $service = Video::find($id);
        $ser = new VideoResource($service);
        return $this->sendResponse($ser,' تم ارجاع الفيديو بنجاح');
    }
    public function get_all(){
       $service = Video::orderby('id','desc')->paginate(5);
       $res = VideoResource::collection($service)->response()->getData(true);
        return $this->sendResponse($res,'جميع الفيديوهات  ');
    }
    public function store(Request $request)
    {
                $vi = new Video();
                $image = $request->image->store('video');
                if($request->type_video == 'file'){
                    $video = Youtube::upload($request->video->getPathName(), [
                        'title'       => $request->title,
                        'description' => $request->description,
                    ])->withThumbnail($request->image->getPathName());
                    $vi->url = "https://www.youtube.com/watch?v=" . $video->getVideoId();

                }else{
                    $vi->url = $request->url;
                }
                $vi->title = $request->title;
                $vi->description = $request->description;
                $vi->user_id =$request->user_id;
                $vi->image = $image;
                $vi->type = $request->type_video;

                $vi->source = 'test';
                $vi->save();
                foreach ($request->types as $category) {
                    $cat = new VideoCateogry();
                    $cat->video_id = $vi->id;
                    $cat->category_id = $category;
                    $cat->save();
                }

                // dd($request->keywords);
                $keywords = explode(',', $request->keywords);
                foreach ($keywords as $s) {
                    $keyword = KeyWord::ofType('podcast')->where('title', $s)->where('title', $s)->first();
                    if ($keyword) {
                        $key = new VideoKeyword();
                        $key->video_id = $vi->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    } else {

                        $keyword = new KeyWord();
                        $keyword->title = ['ar' => $s, 'en' => $s];
                        $keyword->type = 'podcast';
                        $keyword->save();

                        $key = new VideoKeyword();
                        $key->video_id = $vi->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    }
                }
   
        return redirect()->back();
    }
}
