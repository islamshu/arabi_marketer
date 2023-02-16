<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use App\Models\City;
use App\Models\Country;

class GeneralController extends BaseController
{
    public function get_all_countires(){
        $res = CountryResource::collection(Country::get());
        return $this->sendResponse($res,'all countires');
    }
    public function pending_cart(){
        $carts = Cart::wherehas('service',function($q){
            $q->where('deleted_at',null);
        })->orderby('id','desc')->get();
        return view('pages.pendingcart')->with('carts',$carts);
    }
    public function all_cites(){
        $res = CityResource::collection(City::get());
        return $this->sendResponse($res,'all cities');
    }
    public function get_all_city_belong_country($country_id){
        $res = CityResource::collection(City::where('country_id',$country_id)->get());
        return $this->sendResponse($res,'all cities');
    }
}
