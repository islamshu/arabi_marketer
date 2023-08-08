<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogImage;
use App\Models\BlogKeyword;
use App\Models\Category;
use App\Models\Comment;
use App\Models\KeyWord;
use App\Models\Specialty;
use App\Models\Tag;
use DB;
use Illuminate\Http\Request;
use Jorenvh\Share\ShareFacade;
use Share;
use Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.blogs.index')
            ->with('images',BlogImage::orderby('id', 'desc')->get())
            ->with('blogs', Blog::orderby('id', 'desc')->get())
            ->with('bending_blog', Blog::where('status', 0)->orderby('id', 'desc')->get())
            ->with('categories', Specialty::get())
            ->with('keywords', KeyWord::ofType('blog')->get());
    }
    public function show_pending(){
        return view('pages.blogs.pending')->with('blogs',Blog::where('status',0)->get());
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
        $customMessages = [
            'title_ar.required' => 'The title field is required.',
            'description_ar.required' => 'The description field is required.',
            'small_description.required' => 'The small description field is required.',
            'image_id.required' => 'The image field is required.',
            'user_id.required' => 'The user field is required.',
            'type.required' => 'The type field is required.',
            'tags.required' => 'The tags field is required.',
            'keywords.required' => 'The keywords field is required.',
        ];
        
        $validation = Validator::make($request->all(), [
            'title_ar' => 'required',
            'description_ar' => 'required',
            'small_description' => 'required',
            'image_id' => 'required',
            'user_id' => 'required',
            'type' => 'required',
            'tags' => 'required',
            'keywords' => 'required',
        ], $customMessages);
        
        if ($validation->fails()) {
            return response()->json(['success' => false, 'message' => $validation->messages()->first()]);
        }
        
        
        try {
            DB::transaction(function () use ($request) {
                $service = new Blog();
                $service->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
                $service->meta_title = $request->title_ar;
                $service->description = ['ar' => $request->description_ar, 'en' => $request->description_en];
                $service->small_description = $request->small_description;

                // $name = preg_replace('/\..+$/', '', $request->file->getClientOriginalName());
                // $pic = new BlogImage();
                // $pic->image    = $request->file->store('blog');
                // $pic->title = $name;
                // $pic->user_id = $request->user_id;
                // $pic->save();

                $service->user_id = $request->user_id;
                $service->image_id =  $request->image_id;
                $service->slug = str_replace(' ', '_', $request->title_ar . '_' . Blog::count() + 1);
                if($request->publish_time != null){
                    $service->publish_time = $request->$request->publish_time;
                }else{
                    $service->publish_time = now(); 
                }

                $service->save();



                foreach ($request->type as $category) {
                    $cat = new BlogCategory();
                    $cat->blog_id = $service->id;
                    $cat->category_id = $category;
                    $cat->save();
                }



                foreach (json_decode($request->tags) as $s) {
                    $tag = new Tag();
                    $tag->title =  $s->value;
                    $tag->blog_id = $service->id;
                    $tag->save();
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

                // return redirect()->back()->with(['success'=>'تم اضافة المقال بنجاح']);

                return response()->json(['success'=>'true','message' => 'تم الاضافة بنجاح']);

            });
        } catch (\Throwable $e) {
            // return redirect()->back()->with(['error'=>'لقد حدث خلل ما']);

            return response()->json(['success'=>'false','errors' =>'لقد حدث خطأ ما']);

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
    public function show_comments($id)
    {
        $blog = Blog::find($id);
        $comments = $blog->comments;
        return view('pages.blogs.comments')->with('blog', $blog)->with('comments', $comments);
    }
    public function update_comment_status(Request $request)
    {
        $comment  = Comment::find($request->comment_id);
        $comment->status = $request->status;
        $comment->save();
        return true;
    }
    public function delete_comment($id)
    {
        $comment  = Comment::find($id);
        $comment->delete();
        Alert::success('Success', 'Deleted successfully');


    }
    public function edit($id)
    {
        $blog = Blog::find($id);

        $selectedtype = $blog->category;
        $selectedkeywords = $blog->keywords;
        $selectedtags = $blog->tags;

        $selectedkeywords_array = array();
        $selectecategory_array = array();
        $selectetages_array = array();

        foreach ($selectedkeywords as $selc) {
            array_push($selectedkeywords_array, $selc->title);
        }
        foreach ($selectedtype as $selc) {
            array_push($selectecategory_array, $selc->id);
        }
        foreach ($selectedtags as $selc) {
            array_push($selectetages_array, $selc->id);
        }
        return view('pages.blogs.edit')->with('blog', $blog)
            ->with('type_array', $selectecategory_array)
            ->with('keywords_array', $selectedkeywords_array)
            ->with('tags', $selectetages_array)
            ->with('images',BlogImage::orderby('id', 'desc')->get())
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
            DB::transaction(function () use ($request, $id) {
                $service = Blog::find($id);
                $service->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
                $service->description = ['ar' => $request->description_ar, 'en' => $request->description_en];
                $service->small_description = $request->small_description;
                $service->image_id =  $request->image_id;


                $service->save();

                $blog_category_array = BlogCategory::where('blog_id', $service->id)->get();
                foreach ($blog_category_array as $se) {
                    $se->delete();
                }
                foreach ($request->type as $category) {
                    $cat = new BlogCategory();
                    $cat->blog_id = $service->id;
                    $cat->category_id = $category;
                    $cat->save();
                }

                // dd($request->keywords);
                $blog_keyword_array = BlogKeyword::where('blog_id', $service->id)->get();

                foreach ($blog_keyword_array as $se) {
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
