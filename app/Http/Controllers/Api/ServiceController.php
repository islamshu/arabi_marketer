<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\KeywordResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\SpecialtyResource;
use App\Models\Category;
use App\Models\KeyWord;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceComment;
use App\Models\ServiceFiles;
use App\Models\ServiceKeyword;
use App\Models\ServiceSpecialy;
use App\Models\Specialty;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Notification;
use Validator;

class ServiceController extends BaseController
{
    public function get_specialty(){
        $res = SpecialtyResource::collection (Specialty::get());
        return $this->sendResponse($res,'جميع التصنيفات');
    }
    public function service_category(){
        $category = Category::ofType('service')->orderBy('id', 'asc')->get();
        $userRes =KeywordResource::collection($category);
        return $this->sendResponse($userRes,'جميع الكلمات المفتاحية الخاصة بالخدمات');
    }
    public function service_keyword(){
        $category = KeyWord::ofType('service')->orderBy('id', 'asc')->get();
        $userRes =CategoryResource::collection($category);
        return $this->sendResponse($userRes,'جميع التصنيفات الخاصة بالخدمات');
    }
    public function get_all(){
       $service = Service::orderby('id','desc')->paginate(5);
       $res = ServiceResource::collection($service)->response()->getData(true);
        return $this->sendResponse($res,'جميع الخدمات  ');
    }
    public function single($id){
        $service = Service::find($id);
        $service->viewer+=1;
        $service->save();
        $ser = new ServiceResource($service);
        return $this->sendResponse($ser,' تم ارجاع الخدمة بنجاح');
    }
    public function store(Request $request){
        $validation = Validator::make($request->all(), [
            'title'=>'required',
            'description' => 'required',
            'images'=>'required',
            'price'=>'required',
            'url'=>'required',
            'specialties'=>'required',
            'types'=>'required',
            'keywords'=>'required', 
            'has_file'=>'required',
            'attach_file'=>  $request->has_file == 'yes'?'required' : '' ,
          
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }
                $service = new Service();
                $service->title = ['ar' => $request->title, 'en' => $request->title];
                $service->description = ['ar' => $request->description, 'en' => $request->description];
                $service->price = $request->price;
                $service->url = $request->url;
                $service->user_id = auth('api')->id();
                $image_array = array();
                // $images = explode(',',$request->images);
                $images = json_encode($request->images);
                return($images);
                foreach ($images as $key => $image) {

                    array_push($image_array, $image->store('service'));
                }
                return $image_array;

                foreach ($request->images as $key => $im) {
                    if ($key == 0) {
                        $service->image = $im->store('service');
                    }
                }
                $service->images = json_encode($image_array);
                $service->save();

                foreach ($request->specialties as $specialty) {
                    $spe = new ServiceSpecialy();
                    $spe->service_id = $service->id;
                    $spe->specialts_id = $specialty;
                    $spe->save();
                }
                foreach ($request->types as $category) {
                    $cat = new ServiceCategory();
                    $cat->service_id = $service->id;
                    $cat->category_id = $category;
                    $cat->save();
                }

                // dd($request->keywords);
                $keywords = explode(',',$request->keywords);

                foreach ($keywords as $s) {
                    $keyword = KeyWord::ofType('service')->where('title', $s)->where('title', $s)->first();
                    if ($keyword) {
                        $key = new ServiceKeyword();
                        $key->service_id = $service->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    } else {

                        $keyword = new KeyWord();
                        $keyword->title = ['ar' => $s, 'en' => $s];
                        $keyword->type = 'service';
                        $keyword->save();

                        $key = new ServiceKeyword();
                        $key->service_id = $service->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    }
                }


                if ($request->has_file == true) {
                    foreach ($request->attach_file as $keyy => $imagex) {  
                        $imageNamee = '/' . time() + $keyy . '_service_file.' . $imagex->getClientOriginalExtension();
                        $imagex->move('uploads/service_file', $imageNamee);
                        $file = new ServiceFiles();
                        $file->service_id = $service->id;
                        $file->file =  $imageNamee;
                        $file->save();
                    }
                }
                $date = [
                    'id'=>$service->id,
                    'name' => $service->title,
                    'url' => route('services.edit',$service->id),
                    'title' => 'Have a new service',
                    'time' => $service->updated_at
                ];
                $admins = User::where('type','Admin')->get();
                Notification::send($admins, new GeneralNotification($date));
                $ser = new ServiceResource($service);
                return $this->sendResponse($ser,'Addedd Successfuly');  
    }
    public function update(Request $request){
      
                $service = Service::find($request->service_id);
                $service->title = ['ar' => $request->title, 'en' => $request->title];
                $service->description = ['ar' => $request->description, 'en' => $request->description];
                $service->price = $request->price;
                $service->url = $request->url;
                $image_array = array();
                if($request->images != null){
                    foreach ($request->images as $key => $image) {

                        array_push($image_array, $image->store('service'));
                    }
                    foreach ($request->images as $key => $im) {
                        if ($key == 0) {
                            $service->image = $im->store('service');
                        }
                    }
                    $service->images = json_encode($image_array);

                }
                
                $service->save();
                $servicespecialty = ServiceSpecialy::where('service_id',$service->id)->get();
                foreach($servicespecialty as $se){
                    $se->delete();
                }
                foreach ($request->specialties as $specialty) {
                    $spe = new ServiceSpecialy();
                    $spe->service_id = $service->id;
                    $spe->specialts_id = $specialty;
                    $spe->save();
                }
                $servicecategory = ServiceCategory::where('service_id',$service->id)->get();
                foreach($servicecategory as $se){
                    $se->delete();
                }
                foreach ($request->types as $category) {
                    $cat = new ServiceCategory();
                    $cat->service_id = $service->id;
                    $cat->category_id = $category;
                    $cat->save();
                }

                // dd($request->keywords);
                $keywords = explode(',',$request->keywords);
                $servicekey = ServiceKeyword::where('service_id',$service->id)->get();
                foreach($servicekey as $se){
                    $se->delete();
                }
                foreach ($keywords as $s) {
                    $keyword = KeyWord::ofType('service')->where('title', $s)->where('title', $s)->first();
                    if ($keyword) {
                        $key = new ServiceKeyword();
                        $key->service_id = $service->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    } else {

                        $keyword = new KeyWord();
                        $keyword->title = ['ar' => $s, 'en' => $s];
                        $keyword->type = 'service';
                        $keyword->save();

                        $key = new ServiceKeyword();
                        $key->service_id = $service->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    }
                }


                if ($request->has_file == true) {
                    $servicefile = ServiceFiles::where('service_id',$service->id)->get();
                    foreach($servicefile as $se){
                        $se->delete();
                    }
                    foreach ($request->attach_file as $keyy => $imagex) {  
                        $imageNamee = '/' . time() + $keyy . '_service_file.' . $imagex->getClientOriginalExtension();
                        $imagex->move('uploads/service_file', $imageNamee);
                        $file = new ServiceFiles();
                        $file->service_id = $service->id;
                        $file->file =  $imageNamee;
                        $file->save();
                    }
                }
                $ser = new ServiceResource($service);
                return $this->sendResponse($ser,'updated Successfuly');  
    }
    public function delete($video_id)
    {
        $video = Service::find($video_id);
        if ($video->user_id != auth('api')->id()) {
            return $this->sendError('فقط صاحب الخدمة من يمكنه الحذف');
        }
        $video->delete();
        return $this->sendResponse('delete', 'deleted succeffuly');
    }
    public function add_comment(Request $request){
        $service = Service::find($request->service_id);
        $comment = new ServiceComment();
        $comment->service_id = $request->service_id;
        $comment->body = $request->body;
        $comment->save();
        $ser = new ServiceResource($service);
        return $this->sendResponse($ser,'Addedd Comment Successfuly');  
    }
    public function serach(Request $request)
    {
        $title = $request->title;
        $query = Service::query();
        $query->where('status', 1);
        $query->when($request->title != null, function ($q) use ($title) {
            return $q->where('title', 'like', '%' . $title . '%');
        });
        $query->when($request->category_id != null, function ($q) use ($request) {
            return $q->has('category')->with(['category' => function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            }]);
        });


        $blogs = $query->orderby('id', 'desc')->paginate(6);

        $res = ServiceResource::collection($blogs)->response()->getData(true);
        return $this->sendResponse($res, 'جميع المقالات');
    }
}
