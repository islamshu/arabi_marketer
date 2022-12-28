<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialties = Specialty::orderBy('id', 'asc')->get();
        return view('pages.specialty.index')->with('specialties',$specialties);
    }

    public function getData(Request $request){
        $title = $request->search['value'];
        if($title == null){
            $specialties = Specialty::orderBy('id', 'asc');
        }else{
            $specialties = Specialty::where('title','like','%'.$title.'%')->orderBy('id', 'asc');

        }

        return datatable_paginate($specialties);
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
        $specialty = new Specialty();
        $specialty->image = $request->icon->store('specialty');
        $specialty->title=['ar'=>$request->title_ar,'en'=>$request->title_en];
        $specialty->save();
        return $specialty;
    }
    public function get_form_specialty(Request $request){
        return view('pages.specialty.edit')->with('specialty',Specialty::find($request->id));
    }
    public function update_specialty(Request $request,$id){
     
        
        $specialty = Specialty::find($id);
        $specialty->title = ['ar'=>$request->title_ar,'en'=>$request->title_en];
        if($request->icon != null){
            $request->validate([
                'icon'=>'required|'  
            ]);
            $specialty->image = $request->icon->store('soical');
        }
        $specialty->save(); 
        Alert::success('Success', 'Updated successfully');
        return redirect()->back();
        // return $specialty;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function show(Specialty $specialty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialty $specialty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialty $specialty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialty $specialty)
    {
        $specialty->delete();
        Alert::success('Success', 'Deleted successfully');
        return redirect()->back();
    }
}
