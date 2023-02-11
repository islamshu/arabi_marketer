<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\linkTool;
use App\Models\Tools;
use DB;
use Illuminate\Http\Request;

class ToolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.tools.index')->with('tools',Tools::orderby('id','desc')->get());
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
        // dd(($request->moreFields));
        try {
            DB::transaction(function () use ($request) {
                foreach ($request->moreFields as $key => $value) {
                    dd($value['url']);
                    linkTool::create($value);
                }
                $vi = new Tools();
                $image = $request->image->store('new_tool');
                // $vi->link = json_encode($request->moreFields);
                
                $vi->title = $request->title;
                $vi->description = $request->description;
                $vi->image = $image;
                $vi->save();
                


             
            });
            Alert::success('Success', 'Tools Uploded successfully');

            // return redirect()->back();
        } catch (\Throwable $e) {
            return $e;
        }
        return redirect()->back();
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tools  $tools
     * @return \Illuminate\Http\Response
     */
    public function show(Tools $tools)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tools  $tools
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.tools.edit')->with('tool',Tools::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tools  $tools
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::transaction(function () use ($request,$id) {
                $vi = Tools::find($id);
                $vi->link = $request->link;
            
                $vi->title = $request->title;
                $vi->description = $request->description;
                if($request->image != null){
                    $image = $request->image->store('new_tool');
                    $vi->image = $image;
                }
                $vi->save();
             
            });
            Alert::success('Success', 'Tools Updated successfully');

            return redirect()->back();
        } catch (\Throwable $e) {
            return $e;
        }
        return redirect()->route('tools.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tools  $tools
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tool = Tools::find($id);
        $tool->delete();
        Alert::success('Success', 'Tools Deleted successfully');

        return redirect()->back();
    }
}
