<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogKeyword;
use App\Models\Category;
use App\Models\Comment;
use App\Models\KeyWord;
use DB;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shareComponent = \Share::page(
            'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
            'Your share text comes here',
        ) ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();
        dd(($shareComponent));
        return view('pages.blogs.index')
        ->with('blogs',Blog::orderby('id','desc')->get())
        ->with('bending_blog',Blog::where('status',0)->orderby('id','desc')->get())
        ->with('categories', Category::ofType('blog')->get())
        ->with('keywords', KeyWord::ofType('blog')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {
        $user = Blog::findOrFail($request->blog_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['message' => 'Blog status updated successfully.']);
    }
    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $service = new Blog();
                $service->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
                $service->description = ['ar' => $request->description_ar, 'en' => $request->description_en];
                $service->small_description = $request->small_description;

                $service->image = $request->images->store('blog');
                $service->user_id = $request->user_id;

                $service->save();

                
                foreach ($request->type as $category) {
                    $cat = new BlogCategory();
                    $cat->blog_id = $service->id;
                    $cat->category_id = $category;
                    $cat->save();
                }

                // dd($request->keywords);

                foreach (json_decode($request->keywords) as $s) {
                    $keyword = KeyWord::ofType('blog')->where('title', $s->value)->where('title', $s->value)->first();
                    if ($keyword) {
                        $key = new BlogKeyword();
                        $key->blog_id = $service->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    } else {

                        $keyword = new KeyWord();
                        $keyword->title = ['ar' => $s->value, 'en' => $s->value];
                        $keyword->type = 'blog';
                        $keyword->save();

                        $key = new BlogKeyword();
                        $key->blog_id = $service->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    }
                }


           
                return $service;
            });
        } catch (\Throwable $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_comments($id){
        $blog = Blog::find($id);
        $comments= $blog->comments;
        return view('pages.blogs.comments')->with('blog',$blog)->with('comments',$comments);
    }
    public function update_comment_status(Request $request){
        $comment  = Comment::find($request->comment_id);
        $comment->status = $request->status;
        $comment->save();
        return true;
    }
    public function edit($id)
    {
        $blog = Blog::find($id);
       
        $selectedtype = $blog->category;
        $selectedkeywords = $blog->keywords;
        $selectedkeywords_array = array();
        $selectecategory_array = array();

        foreach ($selectedkeywords as $selc) {
            array_push($selectedkeywords_array, $selc->title);
        }
        foreach ($selectedtype as $selc) {
            array_push($selectecategory_array, $selc->id);
        }
        return view('pages.blogs.edit')->with('blog', $blog)
            ->with('type_array', $selectecategory_array)
            ->with('keywords_array', $selectedkeywords_array)

            ->with('categories', Category::ofType('blog')->get())
            ->with('keywords', KeyWord::ofType('blog')->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::transaction(function () use ($request,$id) {
                $service = Blog::find($id);
                $service->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
                $service->description = ['ar' => $request->description_ar, 'en' => $request->description_en];
                $service->small_description = $request->small_description;
                if($request->images != null){
                    $service->image = $request->images->store('blog');
                }

                $service->save();

                $blog_category_array = BlogCategory::where('blog_id',$service->id)->get();
                foreach($blog_category_array as $se){
                    $se->delete();
                }
                foreach ($request->type as $category) {
                    $cat = new BlogCategory();
                    $cat->blog_id = $service->id;
                    $cat->category_id = $category;
                    $cat->save();
                }

                // dd($request->keywords);
                $blog_keyword_array = BlogKeyword::where('blog_id',$service->id)->get();

                foreach($blog_keyword_array as $se){
                    $se->delete();
                }
                foreach (json_decode($request->keywords) as $s) {
                    $keyword = KeyWord::ofType('blog')->where('title', $s->value)->where('title', $s->value)->first();

                    if ($keyword) {
                        $key = new BlogKeyword();
                        $key->blog_id = $service->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    } else {

                        $keyword = new KeyWord();
                        $keyword->title = ['ar' => $s->value, 'en' => $s->value];
                        $keyword->type = 'blog';
                        $keyword->save();

                        $key = new BlogKeyword();
                        $key->blog_id = $service->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    }
                }


           
               
            });
            Alert::success('Success', 'Edited successfully');
            return redirect()->back();
            
        } catch (\Throwable $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Blog::find($id)->delete();
        Alert::success('Success', 'Deleted successfully');
        return redirect()->back();
    }
}
