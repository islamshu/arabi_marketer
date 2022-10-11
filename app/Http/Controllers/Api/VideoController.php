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

class VideoController extends Controller
{
    public function video_category(){
        $category = Category::ofType('video')->orderBy('id', 'asc')->get();
        $userRes =KeywordResource::collection($category);
        return $this->sendResponse($userRes,'جميع التصنيفات الخاصة بالخدمات');

    }
    public function video_keyword(){
        $category = KeyWord::ofType('video')->orderBy('id', 'asc')->get();
        $userRes =CategoryResource::collection($category);
        return $this->sendResponse($userRes,'جميع الكلمات المفتاحية الخاصة بالخدمات');
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
}
