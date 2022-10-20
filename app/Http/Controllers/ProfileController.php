<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit_prr()
    {
        $users = User::get();
        foreach ($users as $user) {
            $user->name = $user->first_name != null ? $user->first_name : $user->name;
            $user->save();
        }
    }
    public function markters()
    {
        $users = User::where('type', 'marketer')->get();
        return view('pages.marketers.index')->with('users', $users);
    }
    public function users()
    {
        $users = User::where('type', 'user')->get();
        return view('pages.customers.index')->with('users', $users);
    }

    public function updateStatus(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }
    public function show($id){
        $user = User::find($id);
        $services = $user->services;
        $blogs = $user->blogs;
        $videos = $user->videos;
        $podcasts = $user->podcasts;
        $consls =$user->consutiong;

        return view('pages.marketers.profile.show')
        ->with('user', $user)
        ->with('services',$services)
        ->with('blogs',$blogs)
        ->with('podcasts',$podcasts)
        ->with('consls',$consls)
        ->with('videos',$videos);


    }
    public function show_customer($id){
        $user = User::find($id);
        $orders = $user->orders;
        $services = $user->services;
        $blogs = $user->blogs;
        $videos = $user->videos;
        $podcasts = $user->podcasts;
        $consls =$user->consutiong;

        return view('pages.marketers.profile.show')
        ->with('user', $user)
        ->with('orders',$orders)
        ->with('services',$services)
        ->with('blogs',$blogs)
        ->with('podcasts',$podcasts)
        ->with('consls',$consls)
        ->with('videos',$videos);


    }

    
}
