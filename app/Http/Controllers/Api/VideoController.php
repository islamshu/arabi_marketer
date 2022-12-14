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
use App\Jobs\UploadVideo;
use App\Models\Specialty;
use App\Models\User;
use App\Models\VideoCateogry;
use App\Models\VideoKeyword;
use App\Notifications\GeneralNotification;
use Notification;
use Socialite;
use Validator;
use Youtube;

class VideoController extends BaseController
{
    public function video_category()
    {
        $category = Specialty::orderBy('id', 'asc')->get();
        $userRes = KeywordResource::collection($category);
        return $this->sendResponse($userRes, 'جميع التصنيفات الخاصة بالفيديوهات');
    }
    public function video_keyword()
    {
        $category = KeyWord::ofType('video')->orderBy('id', 'asc')->get();
        $userRes = CategoryResource::collection($category);
        return $this->sendResponse($userRes, 'جميع الكلمات المفتاحية الخاصة بالفيديوهات');
    }
    public function single($id)
    {
        $service = Video::find($id);
        $ser = new VideoResource($service);
        return $this->sendResponse($ser, ' تم ارجاع الفيديو بنجاح');
    }
    public function get_all()
    {
        $service = Video::orderby('id', 'desc')->where('status',1)->paginate(9);
        $res = VideoResource::collection($service)->response()->getData(true);
        return $this->sendResponse($res, 'جميع الفيديوهات  ');
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'thum_image' => 'required',
            'types' => 'required',
            'keywords' => 'required',
            'type' => 'required',
            'url' =>  $request->type == "false" ? 'required' : '',
            'video' =>  $request->type == "true" ? 'required' : '',
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }
        $vi = new Video();
        $image = $request->thum_image->store('video');
        // dd($request->video->getPathName());
        if ($request->type == "true") {
            // return $request->all();
            $video = Youtube::upload($request->video->getPathName(), [
                'title'       => $request->title,
                'description' => $request->description,
            ])->withThumbnail($request->thum_image->getPathName());
            $vi->url = "https://www.youtube.com/watch?v=" . $video->getVideoId();
        } else {
            $vi->url = $request->url;
        }
        // if($request->type != true){
        //     $vi->url = $request->url;
        // }
        $vi->title = $request->title;
        $vi->description = $request->description;
        $vi->user_id = auth('api')->id();
        $vi->image = $image;
        $vi->type = $request->type;

        $vi->source = 'test';
        $vi->save();
        
        $data =[
            'video'=>$vi->id,
            'video_name'=>$request->video,
            'image_name'=>$request->thum_image->getPathName()

        ];
        // if($request->type == true){
        //     dispatch(new UploadVideo($data));
        // }
        $types = json_decode($request->types, true);

        foreach ($types as $category) {
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
        $date = [
            'id'=>$vi->id,
            'name' => $vi->title,
            'url' => route('videos.edit',$vi->id),
            'title' => 'Have a new Video',
            'time' => $vi->updated_at
        ];
        $admins = User::where('type','Admin')->get();
        Notification::send($admins, new GeneralNotification($date));
               send_notification($date);
        $user = auth('api')->user();
        $date_send = [
            'id' => $user->id,
            'name' => $user->name,
            'url' => '',
            'title' => 'سيتم مراجعة  طلبك الخاص بالفيديو خلال ٢٤ ساعة',
            'time' => $user->updated_at
        ];
        $user->notify(new GeneralNotification($date_send));

        $res = new VideoResource($vi);
        return $this->sendResponse($res, 'addedd succeffuly');
    }
    public function update(Request $request)
    {
        $vi = Video::find($request->video_id);
        if ($vi->user_id != auth('api')->id()) {
            return $this->sendError('فقط صاحب الفيديو من يمكنه التعديل');
        }



        if ($request->thum_image != null) {
            $image = $request->thum_image->store('video');
            $vi->image = $image;
        }
        $vi->url = $request->url;
        $vi->title = $request->title;
        $vi->description = $request->description;
        $vi->source = 'test';
        $vi->save();
        $types = json_decode($request->types, true);
        $vv = VideoCateogry::where('video_id', $vi->id)->get();
        foreach ($vv as $e) {
            $e->delete();
        }
        foreach ($types as $category) {
            $cat = new VideoCateogry();
            $cat->video_id = $vi->id;
            $cat->category_id = $category;
            $cat->save();
        }

        // dd($request->keywords);
        $vvd = VideoKeyword::where('video_id', $vi->id)->get();
        foreach ($vvd as $e) {
            $e->delete();
        }
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

        $res = new VideoResource($vi);
        return $this->sendResponse($res, 'Updated succeffuly');
    }
    public function delete($video_id)
    {
        $video = Video::find($video_id);
        if ($video->user_id != auth('api')->id()) {
            return $this->sendError('فقط صاحب الفيديو من يمكنه الحذف');
        }
        $video->delete();
        return $this->sendResponse('delete', 'deleted succeffuly');
    }
    public function serach(Request $request){
        $title = $request->title;
        $query = Video::query();
        $query->where('status',1);
        $query->when($request->title != null, function ($q) use ($title) {
            return $q->where('title','like','%'.$title.'%');
        });
        $query->when($request->category_id !=null, function ($q) use ($request) {
            return $q->has('category')->with(['category' => function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            }]);
        });

       
        $blogs = $query->orderby('id','desc')->paginate(6);

        $res = VideoResource::collection($blogs)->response()->getData(true);
        return $this->sendResponse($res, 'جميع الفيديوهات');

    }
    public function video_profile_search($id,Request $request){
        $title = $request->title;
        $query = Video::query()->where('user_id',$id);
        // $query->where('status',1);
        $query->when($request->title != null, function ($q) use ($title) {
            return $q->where('title','like','%'.$title.'%');
        });
      

       
        $blogs = $query->orderby('id','desc')->paginate(6);

        $res = VideoResource::collection($blogs)->response()->getData(true);
        return $this->sendResponse($res, 'جميع الفيديوهات');

    }

    
    public function related_videos($id)
    {
        $category_id = [];
        $blog = Video::find($id);
        foreach ($blog->category as $cat) {
            array_push($category_id, $cat->id);
        }
        $blogs =   Video::has('category')->where('status',1)->with(['category' => function ($query) use ($category_id) {
            $query->whereIn('category_id', $category_id);
        }])->where('id', '!=', $id)->orderby('id', 'desc')->take(5)->get();
        $res = VideoResource::collection($blogs);
        return $this->sendResponse($res, 'جميع الفيديوهات');
    }
}

