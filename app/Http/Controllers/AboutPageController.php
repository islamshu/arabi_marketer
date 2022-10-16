<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index(){
        return view('pages.about.index')->with('page',AboutPage::first());
    }
    public function store(Request $request){
        $about = AboutPage::firstOrCreate([
            'id' => 1
        ], [
            'title' => $request->title,
            'body' => $request->body
        ]);
        return true;
    }
}
