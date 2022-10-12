<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit_all(){
        $users = User::where('email','!=','admin@demo.com')->get();
        foreach($users as $user){
            $user->type = 'marketer';
            $user->save();
        }
    }
}
