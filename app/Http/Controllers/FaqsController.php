<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Faqs;
use Illuminate\Http\Request;

class FaqsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.faqs')->with('faqs',Faqs::orderBy('sort','asc')->get());

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
        $page = new Faqs();
        $page->answer = $request->answer;
        $page->qus = $request->qus;
        $page->sort =  Faqs::count() +1;
        $page->save();
        Alert::success('Success', 'تم الاضافة بنجاح');

        return redirect()->back()->with(['succss'=>trans('add succeefully')]);
    }
    public function update_sort_faqs(Request $request)
    {
        if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));
            foreach($arr as $sortOrder => $id){
                $menu = Faqs::find($id); 
                $menu->sort = $sortOrder;
                $menu->update(['sort'=>$sortOrder]);
            }
            return ['success'=>true,'message'=>'Updated'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function show(Faqs $faqs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function edit(Faqs $faqs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faqs $faqs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $about= Faqs::find($id);
       $about->delete();
       Alert::success('Success', 'تم الحذف بنجاح');

       return redirect()->back()->with(['success'=>'faqs deleted successfully']);
       return response()->json(['icon' => 'success', 'title' => 'faqs deleted successfully'], 200);

    }
}