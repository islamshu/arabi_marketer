<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function upload(Request $request){
        foreach($request->image as $image){
            $name = $image->getClientOriginalName();
            dd($name);
        }
    }
}
