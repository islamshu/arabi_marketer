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
use App\Models\NewPodcast;
use App\Models\OwenPodcast;
use App\Models\Podacst;
use App\Models\PodacstKeyword;
use App\Models\PodcastCategory;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Notification;
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
       $service = NewPodcast::orderby('id','desc')->paginate(9);
       
       $res = PodcastResource::collection($service)->response()->getData(true);
        return $this->sendResponse($res,'جميع البودكاست  ');
    }
    public function single($id){
        $service = NewPodcast::find($id);
        $ser = new PodcastResource($service);
        return $this->sendResponse($ser,' تم ارجاع البودكاست بنجاح');
    }
    public function store(Request $request){
        // dd($request->image);
        $validation = Validator::make($request->all(), [
            'title'=>'required',
            'description'=>'required',
            'image'=>'required'
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }


        
        $service = new NewPodcast();
        $service->user_id = auth('api')->id();
        $service->type = 'manual';
        $service->title = $request->title;
        $service->url = null;
        $service->save();
        $attemp = new OwenPodcast();
        $attemp->podcast_id = $service->id;
        $attemp->title = $request->title;
        $attemp->description = $request->description;
        $attemp->image = $request->image->store('podcast');
        $attemp->save();




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
                    $key->podcast_id = $attemp->id;
                    $key->keyword_id = $keyword->id;
                    $key->save();
                }
            }
            
            $date = [
                'id'=>$service->id,
                'name' => $attemp->title,
                'url' => route('podcasts.edit',$service->id),
                'title' => 'Have a new Podcast',
                'time' => $service->updated_at
            ];
            $admins = User::where('type','Admin')->get();
            Notification::send($admins, new GeneralNotification($date));
               send_notification($date);



            $res = new PodcastResource($service);
            return $this->sendResponse($res,'Addedd succeffuly');


    }
    public function update(Request $request){
        // dd($request->image);
        
            $service = Podacst::find($request->podcast_id);
            $service->title = $request->title;
            $service->description = $request->description;
            $service->url = $request->google_SSR;
            $service->apple_url  = $request->apple_SSR ;
            $service->sound_url  = $request->soundCloud_SSR ;
            $service->time = $request->time;
            if($request->image != null){
                $service->image = $request->image->store('podcast');
            }
            $service->save();

            PodcastCategory::where('podcast_id', $service->id)->delete();
            $types = json_decode($request->types, true);

            foreach ($types as $category) {
                $cat = new PodcastCategory();
                $cat->podcast_id = $service->id;
                $cat->category_id = $category;
                $cat->save();
            }

            // dd($request->keywords);
            $keywords = explode(',', $request->keywords);
            PodacstKeyword::where('podcast_id', $service->id)->delete();

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
            return $this->sendResponse($res,'updated succeffuly');
    }
    public function delete($video_id)
    {
        $video = NewPodcast::find($video_id);
        if ($video->user_id != auth('api')->id()) {
            return $this->sendError('فقط صاحب البودكاست من يمكنه التعديل');
        }
        $video->delete();
        return $this->sendResponse('delete', 'deleted succeffuly');
    }
    public function serach(Request $request){
        $title = $request->title;
        $query = NewPodcast::query();
        // $query->where('status',1);
        $query->when($request->title != null, function ($q) use ($title) {
            return $q->where('title','like','%'.$title.'%');
        });
        $query->when($request->category_id !=null, function ($q) use ($request) {
            return $q->has('category')->with(['category' => function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            }]);
        });

       
        $blogs = $query->orderby('id','desc')->paginate(6);

        $res = PodcastResource::collection($blogs)->response()->getData(true);
        return $this->sendResponse($res, 'جميع البودكاست');

    }
    public function podcast_profile_search($id,Request $request){
        $title = $request->title;
        $query = NewPodcast::query()->where('user_id',$id);
        // $query->where('status',1);
        $query->when($request->title != null, function ($q) use ($title) {
            return $q->where('title','like','%'.$title.'%');
        });
     

       
        $blogs = $query->orderby('id','desc')->paginate(6);

        $res = PodcastResource::collection($blogs)->response()->getData(true);
        return $this->sendResponse($res, 'جميع البودكاست');

    }

    
    
}
