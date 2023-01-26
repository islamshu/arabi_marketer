<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Livewire\EditConsoltion;
use App\Models\Consulting;
use Illuminate\Http\Request;

class ConsultingController extends Controller
{
    public function index(){
        return view('pages.consulting.index')->with('consls',Consulting::orderby('id','desc')->get());
 
    }
    public function edit($id){
        return view('pages.consulting.edit');
    }
    public function create(){
        return view('pages.consulting.create');
    }
    
    public function destroy($id){
        Consulting::find($id)->delete();
        Alert::success('Success', 'Deleted successfully');
        return redirect()->back();    }
}
