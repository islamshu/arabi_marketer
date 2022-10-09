<?php

namespace App\Http\Controllers;

use App\Models\Placetype;
use Illuminate\Http\Request;
use Alert;

class PlacetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.place.index')->with('places',Placetype::orderby('id','desc')->get());
    }
    public function get_form_place(Request $request){
        return view('pages.place.edit')->with('place',Placetype::find($request->id));
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
    public function store(Request $request)
    {
        $place = new Placetype();
        $place->title = ['ar'=>$request->title_ar,'en'=>$request->title_en];
        $place->logo = $request->icon->store('place');
        $place->save();
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Placetype  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Placetype $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Placetype  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Placetype $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Placetype  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $place = Placetype::find($id);
        $place->title = ['ar'=>$request->title_ar,'en'=>$request->title_en];
        if($request->icon != null){
            $place->logo = $request->icon->store('place');
        }
        $place->save();
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Placetype  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Placetype $place)
    {
        $place->delete();
        Alert::success('Success', 'Deleted successfully');
        return redirect()->back();
    }
}
