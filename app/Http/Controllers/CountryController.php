<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Country;
use Illuminate\Http\Request;
use Storage;

class CountryController extends Controller
{
    public function index(){
        $country = Country::orderBy('id', 'asc')->get();
        return view('pages.country.index')->with('country',$country);
    }
    public function getData(Request $request){
        $title = $request->search['value'];
        if($title == null){
            $country = Country::orderBy('id', 'asc');
        }else{
            $country = Country::where('title','like','%'.$title.'%')->orderBy('id', 'asc');

        }

        return datatable_paginate($country);
    }
    public function store(Request $request)
    {
        $country = new Country();
        $url = $request->flag;
        $contents = file_get_contents($url);
        $name = 'country/'. \Carbon\Carbon::now()->timestamp.'.svg';
        Storage::put($name, $contents);
        $country->flag = $name = $name;
        $country->title=['ar'=>$request->title_ar,'en'=>$request->title_en];
        $country->code = $request->code;
        $country->save();
        Alert::success('Success', 'Updated  successfully');

        return redirect()->back();    }
    public function get_form_country(Request $request)
    {
        $country = Country::find($request->id);
        return view('pages.country.edit')->with('country',$country);
    }
    public function update_country(Request $request,$id){
        $country = Country::find($id);
        $country->title = ['ar'=>$request->title_ar,'en'=>$request->title_en];
        if($request->flag != null){
            $country->flag = $request->flag->store('country');
        }
        $country->code = $request->code;
        $country->save(); 
        Alert::success('Success', 'Updated  successfully');

        return redirect()->back();
    }

   
    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();
        Alert::success('Success', 'Deleted  successfully');

        return redirect()->back();  
          }
}
