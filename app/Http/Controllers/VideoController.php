<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Category;
use App\Models\KeyWord;
use App\Models\Video;
use App\Models\VideoCateogry;
use App\Models\VideoKeyword;
use DB;
use Illuminate\Http\Request;
use Youtube;

class VideoController extends Controller
{
    public function index()
    {
        return view('pages.videos.index')
            ->with('videos', Video::orderby('id', 'desc')->get())
            ->with('categories', Category::ofType('video')->get());
    }
    public function update_status_video (Request $request){
        $worker = Video::find($request->booked_id);
        
        $worker->status = $request->status ;
        $worker->save();
       
        return response()->json(['status'=>true]);

    }
    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $vi = new Video();
                $image = $request->image->store('video');
                if($request->type == 'file'){
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
                // foreach ($request->type as $category) {
                //     $cat = new VideoCateogry();
                //     $cat->video_id = $vi->id;
                //     $cat->category_id = $category;
                //     $cat->save();
                // }

                // dd($request->keywords);

                foreach (json_decode($request->keywords) as $s) {
                    $keyword = KeyWord::ofType('podcast')->where('title', $s->value)->where('title', $s->value)->first();
                    if ($keyword) {
                        $key = new VideoKeyword();
                        $key->video_id = $vi->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    } else {

                        $keyword = new KeyWord();
                        $keyword->title = ['ar' => $s->value, 'en' => $s->value];
                        $keyword->type = 'podcast';
                        $keyword->save();

                        $key = new VideoKeyword();
                        $key->video_id = $vi->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    }
                }
            });
            Alert::success('Success', 'Video Uploded successfully');

            return redirect()->back();
        } catch (\Throwable $e) {
            return $e;
        }
        return redirect()->back();
    }
    public function edit($id){
        $video = Video::find($id);
        $selectedtype = $video->category;
        $selectedkeywords = $video->keywords;
        $selectedkeywords_array = array();
        foreach ($selectedkeywords as $selc) {
            array_push($selectedkeywords_array, $selc->title);
        }
        $selectedtype_array = array();
        foreach ($selectedtype as $selc) {
            array_push($selectedtype_array, $selc->id);
        }
        return view('pages.videos.edit')
        ->with('video', $video)
        ->with('type_array', $selectedtype_array)
        ->with('keywords_array', $selectedkeywords_array)
        ->with('categories', Category::ofType('video')->get());
                $url = $video->url ;
        $video_id = substr($url, -11);
    

    }
    public function update(Request $request,$id){
       
       
        
        try {
            DB::transaction(function () use ($request,$id) {
                $vi = Video::find($id);
                $url = $vi->url ;
                $videoId = substr($url, -11);
                // Youtube::delete($videoId);

                // if($request->image != null){
                //     $video = Youtube::update($videoId, [
                //         'title'       => $request->title,
                //         'description' => $request->description,
                        
                //  ])->withThumbnail($request->image->getPathName());
                // }else{
                //     $video = Youtube::update($videoId, [
                //         'title'       => $request->title,
                //         'description' => $request->description,
                //  ]);
                // }                $video = Youtube::upload($request->video->getPathName(), [
                //     'title'       => $request->title,
                //     'description' => $request->description,
                // ])->withThumbnail($request->image->getPathName());
                $vi->title = $request->title;
                $vi->url = $request->url;
                $vi->description = $request->description;
                if($request->image != null){
                    $vi->image = $request->image->store('video');
                }
                $vi->save();
               $vv= VideoCateogry::where('video_id',$vi->id)->get();
               foreach($vv as $e){
                $e->delete();
               }
                foreach ($request->type as $category) {
                    $cat = new VideoCateogry();
                    $cat->video_id = $vi->id;
                    $cat->category_id = $category;
                    $cat->save();
                }

                // dd($request->keywords);
                $vvd= VideoKeyword::where('video_id',$vi->id)->get();
                foreach($vvd as $e){
                    $e->delete();
                   }
                foreach (json_decode($request->keywords) as $s) {
                    $keyword = KeyWord::ofType('podcast')->where('title', $s->value)->where('title', $s->value)->first();
                    if ($keyword) {
                        $key = new VideoKeyword();
                        $key->video_id = $vi->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    } else {

                        $keyword = new KeyWord();
                        $keyword->title = ['ar' => $s->value, 'en' => $s->value];
                        $keyword->type = 'podcast';
                        $keyword->save();

                        $key = new VideoKeyword();
                        $key->video_id = $vi->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    }
                }
            });
            Alert::success('Success', 'Video Edited successfully');

            return redirect()->back();
        } catch (\Throwable $e) {
            return $e;
        }
        return redirect()->back();

    }
    public function destroy($id){
        $vi = Video::find($id);
        $url = $vi->url ;
        $videoId = substr($url, -11);
        Youtube::delete($videoId);
        $vi->delete();
        Alert::success('Success', 'Deleted successfully');
        return redirect()->back();
    }
}
