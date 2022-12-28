<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Category;
use App\Models\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function service_index()
    {
        $categories = Category::ofType('service')->orderBy('id', 'asc')->get();

        return view('pages.category_service.index')->with('categories',$categories);

    }
    public function user_index()
    {
        return response()->view('pages.category_user.index');
    }
    public function blog_index()
    {
        $categories = Category::ofType('blog')->orderBy('id', 'asc')->get();

        return view('pages.category_blog.index')->with('categories',$categories);
    }
    public function consultation_index()
    {
        return response()->view('pages.category_consultation.index');
    }
    public function podcast_index()
    {
        return response()->view('pages.category_podcast.index');
    }
    public function video_index()
    {
        return response()->view('pages.category_video.index');
    }
    public function getVideoData(Request $request)
    {
        $title = $request->search['value'];
        if($title == null){
            $categories = Category::ofType('video')->orderBy('id', 'asc');
        }else{
            $categories = Category::ofType('video')->where('title','like','%'.$title.'%')->orderBy('id', 'asc');
        }
        return datatable_paginate($categories);
    }
    public function getUsereData(Request $request)
    {
        $title = $request->search['value'];
        if($title == null){
            $categories = Category::ofType('user')->orderBy('id', 'asc');
        }else{
            $categories = Category::ofType('user')->where('title','like','%'.$title.'%')->orderBy('id', 'asc');
        }
        return datatable_paginate($categories);
    }
    public function getConsultationData(Request $request)
    {
        $title = $request->search['value'];
        if($title == null){
            $categories = Category::ofType('consultation')->orderBy('id', 'asc');
        }else{
            $categories = Category::ofType('consultation')->where('title','like','%'.$title.'%')->orderBy('id', 'asc');
        }
        return datatable_paginate($categories);
    }


    
    public function getServiceData(Request $request)
    {
        $title = $request->search['value'];
        if($title == null){
            $categories = Category::ofType('service')->orderBy('id', 'asc');
        }else{
            $categories = Category::ofType('service')->where('title','like','%'.$title.'%')->orderBy('id', 'asc');
        }
        return datatable_paginate($categories);
    }
    public function getPodcastData(Request $request)
    {
        $title = $request->search['value'];
        if($title == null){
            $categories = Category::ofType('podcast')->orderBy('id', 'asc');
        }else{
            $categories = Category::ofType('podcast')->where('title','like','%'.$title.'%')->orderBy('id', 'asc');
        }
        return datatable_paginate($categories);
    }
    public function store_podcast_category(Request $request)
    {
        $category = new Category();
        $category->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $category->type = 'podcast';
        $category->save();
        // $category->category()->associate($category);
        return $category;
    }
    public function store_user_category(Request $request)
    {
        $category = new Category();
        $category->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $category->type = 'user';
        $category->save();
        // $category->category()->associate($category);
        return $category;
    }
    
    public function store_consultation_category(Request $request)
    {
        $category = new Category();
        $category->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $category->type = 'consultation';
        $category->save();
        // $category->category()->associate($category);
        return $category;
    }

    public function store_video_category(Request $request)
    {
        $category = new Category();
        $category->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $category->type = 'video';
        $category->save();
        // $category->category()->associate($category);
        return $category;
    }
    public function getBlogData(Request $request)
    {
        $title = $request->search['value'];
        if($title == null){
            $categories = Category::ofType('blog')->orderBy('id', 'asc');
        }else{
            $categories = Category::ofType('blog')->where('title','like','%'.$title.'%')->orderBy('id', 'asc');
        }
        return datatable_paginate($categories);
    }
    
    public function store_blog_category(Request $request)
    {
        $category = new Category();
        $category->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $category->type = 'blog';
        $category->save();
        // $category->category()->associate($category);
        return $category;
    }
    public function store_service_category(Request $request)
    {
        $category = new Category();
        $category->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $category->type = 'service';
        $category->specialt_id = $request->specialt_id;
        $category->save();
        $category->category()->associate($category);
        Alert::success('Success', 'Added  successfully');

        return redirect()->back();
    }
    public function update_category(Request $request,$id){
        $category = Category::find($id);
        $category->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $category->save();
        return $category;
    }
    public function update_category_service(Request $request,$id){
        $category = Category::find($id);
        $category->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $category->specialt_id = $request->specialt_id;
        $category->save();
        return $category;
    }

    
    public function delete_service_category($category){
        Category::find($category)->delete();
        Alert::success('Success', 'Deleted  successfully');

        return redirect()->back();
    }
    public function get_form_category(Request $request){
        $category=Category::find($request->id);
        return view('pages.category_service.edit')->with('category',$category);
    }
    public function get_form_category_service(Request $request){
        $category=Category::find($request->id);
        return view('pages.category_service.edit')->with('category',$category);
    }

    
}
