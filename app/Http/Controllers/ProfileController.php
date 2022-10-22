<?php

namespace App\Http\Controllers;

use App\Models\Consulting;
use App\Models\Message;
use App\Models\Order;
use App\Models\OrderDetiles;
use App\Models\Service;
use App\Models\User;
use DB;
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
    public function show_messages($id){
        $conversations =Message::where('sender_id',$id)->orWhere('receiver_id',$id)->get();
        // return view('pages.marketers.profile.chat')->with('messages',$messages); 

        // $conversations = DB::table('messages')
		// 							->where('sender_id', $id)
		// 							->orWhere('receiver_id', $id)
		// 							->get();

    $users = $conversations->map(function($conversation) use($id){
	if($conversation->sender_id == $id) {
		return $conversation->receiver;
	}
	return $conversation->sender;
    })->unique();
        return view('pages.marketers.profile.chats')->with('users',$users)->with('user',$id); 

    }
    public function show_message_from_user($id1,$id2)
    {
        $messages =Message::where('sender_id',$id1)->Where('receiver_id',$id2)->orwhere('sender_id',$id2)->where('receiver_id',$id1)->orderby('id','desc')->get();
        $conversations =Message::where('sender_id',$id2)->orWhere('receiver_id',$id2)->get();

        $users = $conversations->map(function($conversation) use($id2){
            if($conversation->sender_id == $id2) {
                return $conversation->receiver;
            }
            return $conversation->sender;
            })->unique();
                return view('pages.marketers.profile.chat')
                ->with('users',$users)
                ->with('user',$id2)
                ->with('messages',$messages)
                ->with('sender',User::find($id1))
                ->with('resever',User::find($id2));
    }
    public function show_customer($id){
        $user = User::find($id);
        $orders = $user->orders;
        $service = [];
        $cons =[];
        foreach($orders as $order){
            foreach($order->orderdetiles as $detile){
                if($detile->type == 'service'){
                    array_push($service,$detile->id);
                }else{
                    array_push($cons,$detile->id);
                }
            }
        }
        $services = OrderDetiles::whereIn('id',$service)->get(); 
        $consls = OrderDetiles::whereIn('id',$cons)->get(); 

        return view('pages.customers.profile.show')
        ->with('user', $user)
        ->with('orders',$orders)
        ->with('services',$services)
        ->with('consls',$consls)
        ->with('service_count',count($service))
        ->with('consl_count',count($cons));
    }
    public function show_order($id){
        $order = Order::find($id);
        return view('pages.customers.order')->with('order',$order);

    
    }

    
}
