<?php

namespace App\Http\Controllers;

use App\Models\Consulting;
use App\Models\Service;
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
        $service = [];
        $cons =[];
        foreach($orders as $order){
            foreach($order->orderdetiles as $detile){
                if($detile->type == 'service'){
                    array_push($service,$detile->service_id);
                }else{
                    array_push($cons,$detile->service_id);
                }
            }
        }
        $services = Service::whereIn('id',$service)->get(); 
        $consls = Consulting::whereIn('id',$cons)->get(); 
        dd($service,$service);

        return view('pages.customers.profile.show')
        ->with('user', $user)
        ->with('orders',$orders)
        ->with('services',$services)
        ->with('consls',$consls)
        ->with('service_count',count($service))
        ->with('consl_count',count($cons));



    }

    
}
