<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ExtraServics;
use App\Http\Resources\KeywordResource;
use App\Http\Resources\PriceExtraResourse;
use App\Http\Resources\PriceResourse;
use App\Http\Resources\ServiceDayResourse;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\SpecialtyResource;
use App\Models\Category;
use App\Models\ExtraService;
use App\Models\KeyWord;
use App\Models\PriceExtraService;
use App\Models\PriceService;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceComment;
use App\Models\ServiceFiles;
use App\Models\ServiceKeyword;
use App\Models\ServiceSpecialy;
use App\Models\Specialty;
use App\Models\TimeExtaService;
use App\Models\TimeService;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Notification;
use Validator;

class ServiceController extends BaseController
{
    public function get_specialty()
    {
        $res = SpecialtyResource::collection(Specialty::get());
        return $this->sendResponse($res, 'جميع التصنيفات');
    }
    public function service_category()
    {
        $category = Specialty::orderBy('id', 'asc')->get();
        $userRes = KeywordResource::collection($category);
        return $this->sendResponse($userRes, 'جميع الكلمات المفتاحية الخاصة بالخدمات');
    }
    public function service_category_by_specialty_id($id)
    {
        $category = Category::ofType('service')->where('specialt_id', $id)->orderBy('id', 'asc')->get();
        $userRes = KeywordResource::collection($category);
        return $this->sendResponse($userRes, 'جميع الكلمات المفتاحية الخاصة بالخدمات');
    }
    public function price_for_servcie()
    {
        $price_service = get_general_value('price_service');
        $prices = explode('-', $price_service);
        $ara = [];
        $price = [];
        for ($i = $prices[0]; $i <= $prices[1]; $i++) {
            
            $price = ['price' => (int)$i];
            array_push($ara, $price);
            
        }

        return $this->sendResponse($ara, 'جميع الاسعار الخاصة بالخدمات');
    }
    public function price_for_extrs_servcie()
    {
        $price_service = get_general_value('price_service_exta');
        $prices = explode('-', $price_service);
        $ara = [];
        $price = [];
        for ($i = $prices[0]; $i <= $prices[1]; $i++) {
            $price = ['price' => (int)$i, 'title' => 'مقابل' . (int)$i . ' دولار اضافة لسعر الخدمة'];
            array_push($ara, $price);
        }

        return $this->sendResponse($ara, 'جميع الاسعار الخاصة بالخدمات');
    }
    public function price_extra($id){
        $ex = ExtraService::find($id);
        if(!$ex){
           return $this->sendError('لم يتم العثور على التطويرة');
        }else{
            $res = new ExtraServics($ex);
            return $this->sendResponse($res,'تم ارجاع التطويرة بنجاح');
        }
    }
    // public function price_for_extrs_servcie(){
    //     $userRes = PriceExtraResourse::collection(PriceExtraService::get());
    //     return $this->sendResponse($userRes, 'جميع الاسعار الخاصة  بالخدمات الاضافية');   
    // }
    public function time_for_servcie()
    {
        $userRes = ServiceDayResourse::collection(TimeService::get());
        return $this->sendResponse($userRes, 'جميع الاوقات الخاصة بالخدمات    ');
    }
    public function time_for_exta_servcie()
    {
        $userRes = ServiceDayResourse::collection(TimeExtaService::get());
        return $this->sendResponse($userRes, 'جميع الاوقات الخاصة بالاضافات    ');
    }
    public function change_status(Request $request, $id)
    {
        // return $request;
        $service = Service::find($id);
        if ($service->user_id != (int)$request->user_id) {
            return $this->sendError('فقط صاحب الخدمة من يقول بتغير الحالة');
        }
        $service->status = (int)$request->status;
        $service->save();
        $res = new ServiceResource($service);
        return $this->sendResponse($res, 'تم تغير الحالة بنجاح');
    }


    public function service_keyword()
    {
        $category = KeyWord::ofType('service')->orderBy('id', 'asc')->get();
        $userRes = CategoryResource::collection($category);
        return $this->sendResponse($userRes, 'جميع التصنيفات الخاصة بالخدمات');
    }
    public function get_all()
    {
        $service = Service::orderby('id', 'desc')->where('status', 1)->paginate(5);
        $res = ServiceResource::collection($service)->response()->getData(true);
        return $this->sendResponse($res, 'جميع الخدمات  ');
    }
    public function single($id)
    {
        $service = Service::where('slug',$id)->first();
        if(!$service){
            return $this->sendError('لأم يتم العثور على الخدمة');
        }
        $service->viewer += 1;
        $service->save();
        $ser = new ServiceResource($service);
        return $this->sendResponse($ser, ' تم ارجاع الخدمة بنجاح');
    }
    public function store(Request $request)
    {

        // return $request->all();
        $validation = Validator::make($request->all(), [
            'type_service' => 'required',
            'title' => 'required',
            'description' => 'required',
            'images' => 'required',
            'price' => 'required',
            // 'url' => 'required',
            'specialties' => 'required',
            'types' => 'required',
            'keywords' => 'required',
            'has_file' => 'required',
            'time' => 'required',
            // 'buyer_instructions' => 'required',
            'attach_file' =>  $request->has_file == 1 ? 'required' : '',
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages());
        }
        $service = new Service();
        $service->title = $request->title;
        $service->description =  $request->description;
        $service->price = $request->price;
        $service->url = $request->url;
        $service->buyer_instructions = $request->buyer_instructions;
        $service->type = $request->type_service;
        $service->time = $request->time;
        $service->management_ratio = get_general_value('admin_service');
        $service->user_id = auth('api')->id();
        $image_array = array();
        // $images = explode(',',$request->images);


        foreach ($request->images as $key => $im) {
            if ($key == 0) {
                $service->image = $im->store('service');
            }
        }
        foreach ($request->images as $key => $im) {


            array_push($image_array, $im->store('service'));
        }
        $service->images = json_encode($image_array);
        $service->save();
        $service->slug = str_replace(' ','_',$request->title).'_'.$service->id;
        $service->save();

        if (is_array($request->addmore) || is_object($request->addmore)) {
            foreach ($request->addmore as $key => $value) {
                // $extra = ExtraService::create( $value);
                $extra = new ExtraService();
                $extra->service_id = $service->id;
                $extra->title = $value['title'];
                $extra->price = $value['price'];
                if ($value['has_time'] == 0) {
                    $extra->time = 0;
                } else {
                    $extra->time = $value['time'];
                }

                $extra->save();
            }
        }

        // foreach (json_decode($request->specialties) as $specialty) {
        $spe = new ServiceSpecialy();
        $spe->service_id = $service->id;
        $spe->specialts_id = $request->specialties;
        $spe->save();
        // }
        $types = json_decode($request->types);

        foreach ($types as $category) {
            $cat = new ServiceCategory();
            $cat->service_id = $service->id;
            $cat->category_id = $category;
            $cat->save();
        }

        // dd($request->keywords);
        $keywords = explode(',', $request->keywords);

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


        if ($request->attach_file == 1) {
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
            'id' => $service->id,
            'name' => $service->title,
            'url' => route('services.show', $service->id),
            'title' => 'تم اضافة خدمة جديدة',
            'time' => $service->updated_at
        ];
        $user = auth('api')->user();
        $date_send = [
            'id' => $user->id,
            'name' => $user->name,
            'url' => '',
            'title' => 'سيتم مراجعة  طلبك الخاص بالخدمة خلال ٢٤ ساعة',
            'time' => $user->updated_at
        ];
        $user->notify(new GeneralNotification($date_send));
        $admins = User::where('type', 'Admin')->get();
        Notification::send($admins, new GeneralNotification($date));
        send_notification($date);


        $ser = new ServiceResource($service);
        return $this->sendResponse($ser, 'Addedd Successfuly');
    }
    public function update(Request $request)
    {

        $service = Service::find($request->service_id);
        // return $request->all();
        $validation = Validator::make($request->all(), [
            'type_service' => 'required',
            'title' => 'required',
            'description' => 'required',
            // 'url' => 'required',
            'specialties' => 'required',
            'types' => 'required',
            'keywords' => 'required',
            'has_file' => 'required',
            // 'time'=>'required',
            // 'buyer_instructions' => 'required',
            'attach_file' =>  $request->has_file == 1 ? 'required' : '',
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages());
        }
        $service->title = $request->title;
        $service->description =  $request->description;
        $service->url = $request->url;
        $service->buyer_instructions = $request->buyer_instructions;
        $service->type = $request->type_service;
        // $service->time = $request->time;
        $image_array = array();
        if ($request->images != null) {
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
        $service->slug = str_replace(' ','_',$request->title).'_'.$service->id;
        $service->save();

        if (is_array($request->addmore) || is_object($request->addmore)) {
            foreach ($request->addmore as $key => $value) {
                // $extra = ExtraService::create( $value);
                $extra = new ExtraService();
                $extra->service_id = $service->id;
                $extra->title = $value['title'];
                $extra->price = $value['price'];
                if ($value['has_time'] == 0) {
                    $extra->time = 0;
                } else {
                    $extra->time = $value['time'];
                }
                $extra->save();
            }
        }
        $servicespecialty = ServiceSpecialy::where('service_id', $service->id)->get();
        foreach ($servicespecialty as $se) {
            $se->delete();
        }
        $spe = new ServiceSpecialy();
        $spe->service_id = $service->id;
        $spe->specialts_id = $request->specialties;
        $spe->save();

        $servicecategory = ServiceCategory::where('service_id', $service->id)->get();
        foreach ($servicecategory as $se) {
            $se->delete();
        }
        $types = json_decode($request->types);

        foreach ($types as $category) {
            $cat = new ServiceCategory();
            $cat->service_id = $service->id;
            $cat->category_id = $category;
            $cat->save();
        }

        // dd($request->keywords);
        $keywords = explode(',', $request->keywords);
        $servicekey = ServiceKeyword::where('service_id', $service->id)->get();
        foreach ($servicekey as $se) {
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
            $servicefile = ServiceFiles::where('service_id', $service->id)->get();
            foreach ($servicefile as $se) {
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
        return $this->sendResponse($ser, 'updated Successfuly');
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
    public function add_comment(Request $request)
    {
        $service = Service::find($request->service_id);
        $comment = new ServiceComment();
        $comment->service_id = $request->service_id;
        $comment->body = $request->body;
        $comment->save();
        $ser = new ServiceResource($service);
        return $this->sendResponse($ser, 'Addedd Comment Successfuly');
    }
    public function serach(Request $request)
    {
        $title = $request->title;
        $query = Service::query();
        $query->where('status', 1);
        $query->when($request->title != null, function ($q) use ($title) {
            return $q->where('title', 'like', '%' . $title . '%');
        });
        $cats = explode(',', $request->category_id);


        $query->when($request->category_id != null && $request->category_id != 'undefined', function ($q) use ($cats) {
            return $q->whereHas('specialty', function ($query) use ($cats) {
                $query->whereIn('specialts_id', $cats);
            });
        });




        $blogs = $query->orderby('id', 'desc')->paginate(6);

        $res = ServiceResource::collection($blogs)->response()->getData(true);
        return $this->sendResponse($res, 'جميع المقالات');
    }
    public function service_profile_search($id, Request $request)
    {
        $title = $request->title;
        $query = Service::query()->where('user_id', $id);
        // $query->where('status', 1);
        $query->when($request->title != null, function ($q) use ($title) {
            return $q->where('title', 'like', '%' . $title . '%');
        });


        $blogs = $query->orderby('id', 'desc')->paginate(6);

        $res = ServiceResource::collection($blogs)->response()->getData(true);
        return $this->sendResponse($res, 'جميع المقالات');
    }
}
