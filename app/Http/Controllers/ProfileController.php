<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit_prr(){
        $users = User::get();
        foreach($users as $user){
            $user->image = 'users/defult_user.png';
            $user->save();
        }
    }
    public function markters(){
        $users = User::where('type','marketer')->get();
        return view('pages.marketers.index')->with('users',$users);
    }
}
