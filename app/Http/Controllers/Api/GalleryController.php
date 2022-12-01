<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlogImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\ImageResource;
use ImageOptimizer;
use Intervention\Image\Facades\Image;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer as FacadesImageOptimizer;

// the image will be replaced with an optimized version which should be smaller


class GalleryController extends BaseController
{
    public function upp(Request $request){
        foreach(BlogImage::get() as $blog){

            $input['imagename'] = str_replace('blog/','',$blog->image);
            $rand = $input['imagename'].rand(111111111,999999999);
            $destinationPath = public_path('uploads/blog').$input['imagename'];
            $dess = public_path('uploads/blog');
            // dd($destinationPath);
            $img = Image::make($destinationPath);
            $img->resize(850, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($dess.'/'.$rand);    
            dd($img);           
           $imagee= 'blog/'.$rand;
           $blog->image = $imagee;
           $blog->save();
           dd($blog);
        }

           dd('true');
    }
    public function upload(Request $request)
    {
        foreach ($request->image as $image) {
        //     $input['imagename'] = time().'.'.$image->extension();
         
        //     $destinationPath = public_path('uploads/blog');
        //     $img = Image::make($image->path());
        //     $img->resize(1300, 1300, function ($constraint) {
        //         $constraint->aspectRatio();
        //     })->save($destinationPath.'/'.$input['imagename']);
    
                
                
        //    $imagee= 'uploads/blog/'.$input['imagename'];
            




            $name = preg_replace('/\..+$/', '', $image->getClientOriginalName());
            $pic = new BlogImage();
            $pic->image    = $image->store('blog');
            $pic->title = $name;
            $pic->user_id = auth('api')->id();
            $pic->save();
        }
        return $this->sendResponse('Upload', 'تم التسجيل بنجاح');
    }
    public function index()
    {
        $images = BlogImage::where('user_id', auth('api')->id())->orderby('id','desc')->get();
        $res = ImageResource::collection($images);
        return $this->sendResponse($res, 'تم رجاع جميع الصور بنجاح');
    }
    public function single($id)
    {
        $images = BlogImage::find($id);
        $res = new ImageResource($images);
        return $this->sendResponse($res, 'تم ارجاع الصورة بنجاح');
    }
    public function edit(Request $request, $id)
    {
        $image = BlogImage::find($id);
        $image->title = $request->title;
        $image->alt = $request->alt;
        $image->description = $request->description;
        $image->save();

        $res = new ImageResource($image);
        return $this->sendResponse($res, 'تم تعديل بيانات الصورة بنجاح');
    }
}
