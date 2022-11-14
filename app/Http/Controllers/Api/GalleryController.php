<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlogImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\ImageResource;
use ImageOptimizer;

// the image will be replaced with an optimized version which should be smaller


class GalleryController extends BaseController
{
    public function upload(Request $request)
    {
        foreach ($request->image as $image) {
            $name = preg_replace('/\..+$/', '', $image->getClientOriginalName());
            $pic = new BlogImage();
            $pic->image    = $image->store('blog');
           $imagee =  ImageOptimizer::optimize($pic->image);
            dd($imagee);
            $pic->title = $name;
            $pic->user_id = auth('api')->id();
            $pic->save();
        }
        return $this->sendResponse('Upload', 'تم التسجيل بنجاح');
    }
    public function index()
    {
        $images = BlogImage::where('user_id', auth('api')->id())->get();
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
