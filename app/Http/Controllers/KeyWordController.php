<?php

namespace App\Http\Controllers;

use App\Models\KeyWord;
use Illuminate\Http\Request;

class KeyWordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function service_index()
    {
        return response()->view('pages.keyword_service.index');
    }
    public function blog_index()
    {
        return response()->view('pages.keyword_blog.index');
    }
    public function consoltion_index()
    {
        return response()->view('pages.keyword_consoltion.index');
    }
    
    public function podcast_index()
    {
        return response()->view('pages.keyword_podcast.index');
    }
    public function video_index()
    {
        return response()->view('pages.keyword_video.index');
    }
    public function getServiceData(Request $request)
    {
        $title = $request->search['value'];
        if($title == null){
            $categories = Keyword::ofType('service')->orderBy('id', 'asc');
        }else{
            $categories = Keyword::ofType('service')->where('title','like','%'.$title.'%')->orderBy('id', 'asc');
        }
        return datatable_paginate($categories);
    }
    public function getConsoltionData(Request $request)
    {
        $title = $request->search['value'];
        if($title == null){
            $categories = Keyword::ofType('consoltion')->orderBy('id', 'asc');
        }else{
            $categories = Keyword::ofType('consoltion')->where('title','like','%'.$title.'%')->orderBy('id', 'asc');
        }
        return datatable_paginate($categories);
    }

    
    public function getVideoData(Request $request)
    {
        $title = $request->search['value'];
        if($title == null){
            $categories = Keyword::ofType('video')->orderBy('id', 'asc');
        }else{
            $categories = Keyword::ofType('video')->where('title','like','%'.$title.'%')->orderBy('id', 'asc');
        }
        return datatable_paginate($categories);
    }
    public function getPodcastData(Request $request)
    {
        $title = $request->search['value'];
        if($title == null){
            $categories = Keyword::ofType('podcast')->orderBy('id', 'asc');
        }else{
            $categories = Keyword::ofType('podcast')->where('title','like','%'.$title.'%')->orderBy('id', 'asc');
        }
        return datatable_paginate($categories);
    }
    public function getBlogData(Request $request)
    {
        $title = $request->search['value'];
        if($title == null){
            $categories = Keyword::ofType('blog')->orderBy('id', 'asc');
        }else{
            $categories = Keyword::ofType('blog')->where('title','like','%'.$title.'%')->orderBy('id', 'asc');
        }
        return datatable_paginate($categories);
    }
    public function store_podcast_keyword(Request $request)
    {
        $keyword = new Keyword();
        $keyword->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $keyword->type = 'podcast';
        $keyword->save();
        
        return $keyword;
    }
    public function store_consoltion_keyword(Request $request)
    {
        $keyword = new Keyword();
        $keyword->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $keyword->type = 'consoltion';
        $keyword->save();
        
        return $keyword;
    }
    
    public function store_video_keyword(Request $request)
    {
        $keyword = new Keyword();
        $keyword->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $keyword->type = 'video';
        $keyword->save();
        
        return $keyword;
    }
    public function store_blog_keyword(Request $request)
    {
        $keyword = new Keyword();
        $keyword->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $keyword->type = 'blog';
        $keyword->save();
        
        return $keyword;
    }
    public function store_service_keyword(Request $request)
    {
        $keyword = new Keyword();
        $keyword->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $keyword->type = 'service';
        $keyword->save();
        
        return $keyword;
    }
    public function update_keyword(Request $request,$id){
        $keyword = Keyword::find($id);
        $keyword->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $keyword->save();
        return $keyword;

    }
    public function delete_service_keyword($keyword){
        Keyword::find($keyword)->delete();
        return true;
    }
    public function get_form_keyword(Request $request){
        $keyword=Keyword::find($request->id);
        return view('pages.keyword_service.edit')->with('keyword',$keyword);
    }

}
