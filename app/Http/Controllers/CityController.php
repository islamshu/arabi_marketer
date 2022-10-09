<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        return view('pages.city.index')->with('cities', City::orderby('id', 'desc')->get());
    }
    public function store(Request $request)
    {
        $city = new City();
        $city->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $city->country_id = $request->country_id;
        $city->save();
        return true;
    }
    public function get_form_city(Request $request)
    {
        return view('pages.city.edit')->with('city', City::find($request->id));
    }
    public function update_city(Request $request, $id)
    {
        $city = City::find($id);
        $city->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $city->country_id = $request->country_id;
        $city->save();
        return $city;
    }
    public function destroy($id)
    {
        $city = City::find($id)->delete();
        Alert::success('Success', 'Deleted successfully');
        return redirect()->back();
    }
}
