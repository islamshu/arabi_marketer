<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\KeyWord;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceFiles;
use App\Models\ServiceKeyword;
use App\Models\ServiceSpecialy;
use App\Models\Specialty;
use DB;
use Illuminate\Http\Request;
use Redirect;
Use Alert;
use App\Models\ExtraService;
use App\Models\Order;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array_category = array();
       $items= DB::table('service_categories')
        ->select('service_categories.category_id',DB::raw('COUNT(category_id) as count'))
        ->groupBy('category_id')
        ->orderBy('count','desc')
        ->take(5)
        ->get();
        foreach($items as $item ){
            array_push($array_category,$item->category_id);
        }
        $category_most = Category::whereIn('id',$array_category)->get();
        $services =  Service::get();
        $market_services =  Service::whereHas('user', function($q){
            $q->where('type', 'marketer');
        })->get();
        $service_user =  Service::whereHas('user', function($q){
            $q->where('type', 'user');
        })->get();
        {{ dd($service_user) }}
        
        $orders = Order::count();
        return view('pages.service.index')
            ->with('services', $services)
            ->with('service_marketer', $market_services)
            ->with('service_user',$service_user)
            ->with('specialty', Specialty::get())
            ->with('orders_count',$orders)
            ->with('category_most',$category_most)
            ->with('categories', Category::ofType('service')->get())
            ->with('keywords', KeyWord::ofType('service')->get());
    }
    public function get_cats(Request $request)
    {
        $cats = Category::where('specialt_id',$request->id)->get();
        return $cats;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        $title = $request->search['value'];
        if ($title == null) {
            $categories = Service::orderBy('id', 'asc');
        } else {
            $categories = Service::where('title', 'like', '%' . $title . '%')->orderBy('id', 'asc');
        }
        return datatable_paginate($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            DB::transaction(function () use ($request) {
                $service = new Service();
                $service->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
                $service->description = ['ar' => $request->description_ar, 'en' => $request->description_en];
                $service->price = $request->price;
                $service->management_ratio = $request->management_ratio;
                $service->url = $request->url;
                $service->user_id = $request->user_id;
                $service->buyer_instructions = $request->buyer_instructions;
                $service->type = $request->type_service;
                $service->time = $request->time;
                $service->status = 1;
                $image_array = array();
                foreach ($request->images as $key => $image) {

                    array_push($image_array, $image->store('service'));
                }
                foreach ($request->images as $key => $im) {
                    if ($key == 0) {
                        $service->image = $im->store('service');
                    }
                }
                // dd(json_encode($image_array));
                $service->images = json_encode($image_array);
                // dd($request->all());
                $service->save();

                foreach ($request->specialty as $specialty) {
                    $spe = new ServiceSpecialy();
                    $spe->service_id = $service->id;
                    $spe->specialts_id = $specialty;
                    $spe->save();
                }
                foreach ($request->type as $category) {
                    $cat = new ServiceCategory();
                    $cat->service_id = $service->id;
                    $cat->category_id = $category;
                    $cat->save();
                }

                // dd($request->keywords);

                foreach (json_decode($request->keywords) as $s) {
                    $keyword = KeyWord::ofType('service')->where('title', $s->value)->where('title', $s->value)->first();
                    if ($keyword) {
                        $key = new ServiceKeyword();
                        $key->service_id = $service->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    } else {

                        $keyword = new KeyWord();
                        $keyword->title = ['ar' => $s->value, 'en' => $s->value];
                        $keyword->type = 'service';
                        $keyword->save();

                        $key = new ServiceKeyword();
                        $key->service_id = $service->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    }
                }


                if ($request->has_file == 'نعم') {
                    foreach ($request->files as $key => $file) {
                        if ($key == 'icon') {
                            continue;
                        } else {
                            foreach ($file as $keyy => $imagex) {  
                                $imageNamee = '/' . time() + $keyy . '_service_file.' . $imagex->getClientOriginalExtension();
                                $imagex->move('uploads/service_file', $imageNamee);
                                $file = new ServiceFiles();
                                $file->service_id = $service->id;
                                $file->file =  $imageNamee;
                                $file->save();
                            }
                        }
                    }
                }
                if(is_array($request->addmore) || is_object($request->addmore)){
                    foreach ($request->addmore as $key => $value) {
                        // $extra = ExtraService::create( $value);
                        $extra = new ExtraService();
                        $extra->service_id =$service->id ;
                        $extra->title =$value['title'];
                        $extra->price =$value['price'];
                        $extra->time= $value['time'];
                        $extra->save();
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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $selectedspecialty = $service->specialty;
        $selectedspecialty_array = array();
        foreach ($selectedspecialty as $selc) {
            array_push($selectedspecialty_array, $selc->id);
        }
        $selectedtype = $service->category;
        $selectedkeywords = $service->keywords;
        $selectedkeywords_array = array();
        foreach ($selectedtype as $selc) {
            array_push($selectedkeywords_array, $selc->title);
        }
        $selectedtype_array = array();
        foreach ($selectedtype as $selc) {

            array_push($selectedtype_array, $selc->id);
        }
        return view('pages.service.show')->with('service', $service)
            ->with('specialty_array', $selectedspecialty_array)
            ->with('type_array', $selectedtype_array)
            ->with('keywords_array', $selectedkeywords_array)

            ->with('specialty', Specialty::get())
            ->with('categories', Category::ofType('service')->get())
            ->with('keywords', KeyWord::ofType('service')->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {

        $selectedspecialty = $service->specialty;
        $selectedspecialty_array = array();
        foreach ($selectedspecialty as $selc) {
            array_push($selectedspecialty_array, $selc->id);
        }
        $selectedtype = $service->category;
        $selectedkeywords = $service->keywords;
        $selectedkeywords_array = array();
        foreach ($selectedtype as $selc) {
            array_push($selectedkeywords_array, $selc->title);
        }
        $selectedtype_array = array();
        foreach ($selectedtype as $selc) {
            array_push($selectedtype_array, $selc->id);
        }
        return view('pages.service.edit')->with('service', $service)
            ->with('specialty_array', $selectedspecialty_array)
            ->with('type_array', $selectedtype_array)
            ->with('keywords_array', $selectedkeywords_array)

            ->with('specialty', Specialty::get())
            ->with('categories', Category::ofType('service')->get())
            ->with('keywords', KeyWord::ofType('service')->get());
    }
    public function get_speclis_service(Request $request)
    {
        $specialty =  Service::find($request->id)->specialty;
        $arr = array();
        foreach ($specialty as $s) {
            array_push($arr, $s->id);
        }
        return ($arr);
    }
    public function get_type_service(Request $request)
    {
        $specialty =  Service::find($request->id)->category;
        $arr = array();
        foreach ($specialty as $s) {
            array_push($arr, $s->id);
        }
        return ($arr);
    }
    public function get_keywords_service(Request $request)
    {
        $specialty =  Service::find($request->id)->keywords;
        $arr = array();
        foreach ($specialty as $s) {
            array_push($arr, $s->title);
        }
        return json_encode($arr);
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::transaction(function () use ($request,$id) {
                $service = Service::find($id);
                $service->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
                $service->description = ['ar' => $request->description_ar, 'en' => $request->description_en];
                $service->price = $request->price;
                $service->management_ratio = $request->management_ratio;
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
                
                foreach ($request->specialty as $specialty) {
                    $spe = new ServiceSpecialy();
                    $spe->service_id = $service->id;
                    $spe->specialts_id = $specialty;
                    $spe->save();
                }
                $servicecategory = ServiceCategory::where('service_id',$service->id)->get();
                foreach($servicecategory as $se){
                    $se->delete();
                }
                foreach ($request->type as $category) {
                    $cat = new ServiceCategory();
                    $cat->service_id = $service->id;
                    $cat->category_id = $category;
                    $cat->save();
                }

                // dd($request->keywords);
                $servicekey = ServiceKeyword::where('service_id',$service->id)->get();
                foreach($servicekey as $se){
                    $se->delete();
                }
                foreach (json_decode($request->keywords) as $s) {
                    $keyword = KeyWord::ofType('service')->where('title', $s->value)->where('title', $s->value)->first();
                    if ($keyword) {
                        $key = new ServiceKeyword();
                        $key->service_id = $service->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    } else {

                        $keyword = new KeyWord();
                        $keyword->title = ['ar' => $s->value, 'en' => $s->value];
                        $keyword->type = 'service';
                        $keyword->save();

                        $key = new ServiceKeyword();
                        $key->service_id = $service->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    }
                }


                if ($request->has_file == 'نعم') {
                    $servicefile = ServiceFiles::where('service_id',$service->id)->get();
                    foreach($servicefile as $se){
                        $se->delete();
                    }
                    
                    foreach ($request->files as $key => $file) {
                        if ($key == 'icon') {
                            continue;
                        } else {
                            foreach ($file as $keyy => $imagex) {  
                                $imageNamee = '/' . time() + $keyy . '_service_file.' . $imagex->getClientOriginalExtension();
                                $imagex->move('uploads/service_file', $imageNamee);
                                $file = new ServiceFiles();
                                $file->service_id = $service->id;
                                $file->file =  $imageNamee;
                                $file->save();
                            }
                        }
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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        Alert::success('Success', 'Deleted successfully');
        return redirect()->back();


    }
}
