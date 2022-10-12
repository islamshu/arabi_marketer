<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function markters(){
        $users = User::where('type','marketer')->get();
        return view('pages.marketers.index')->with('users',$users);
    }
}
