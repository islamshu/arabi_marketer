<?php

namespace App\Http\Controllers;

use App\Models\Quastion;
use Illuminate\Http\Request;

class QuastionController extends Controller
{
    public function index(){
        return view('pages.question.index')->with('questions',Quastion::orderby('id','desc')->get());
    }
    public function create(){
        return view('pages.question.create');
    }

}
