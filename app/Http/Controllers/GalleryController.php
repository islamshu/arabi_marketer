<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function store(Request $request)
    {
        $image = $request->file('file');
        
        return response()->json(['success' => $image]);
    }
}

