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
use App\Models\ServiceFiles;
use App\Models\ServiceKeyword;
use App\Models\ServiceSpecialy;
use App\Models\Specialty;
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
                foreach ($request->images as $key => $image) {

                    array_push($image_array, $image->store('service'));
                }
                foreach ($request->images as $key => $im) {
                    if ($key == 0) {
                        $service->image = $im->store('service');
                    }
                }
                $service->images = json_encode($image_array);
                $service->save();
                $specialties = explode()
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


                if ($request->has_file == 'yes') {
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
                return $this->sendResponse($ser,'Addedd Successfuly');

                
       
    }
}
