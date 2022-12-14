<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Blog;
use App\Models\BookingConsultion;
use App\Models\Consulting;
use App\Models\Message;
use App\Models\Order;
use App\Models\OrderDetiles;
use App\Models\Service;
use App\Models\User;
use App\Models\Video;
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
    public function show_customer_markter($id){
        $user = User::find($id);
        return view('pages.customers.profile.show_new')->with('user', $user);
    }
    public function markters()
    {
        $users = User::where('type', 'marketer')->orderby('id','desc')->get();
        return view('pages.marketers.index')->with('users', $users);
    }
    public function users()
    {
        $users = User::where('type', 'user')->orderBy('id','desc')->get();
        return view('pages.customers.index')->with('users', $users);
    }
    public function markter_order(){
        $users = User::where('type', 'user')->has('markter_order')->get();
        return view('pages.customers.index_new')->with('users', $users);
    }

    public function updateStatus(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }
    public function updatepan(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->is_pan = $request->status;
        $user->save();
        if($request->status == 1){
            $user->tokens->each(function ($token, $key) {
                $token->delete();
            });
            $user->save();
        $service = Service::where('user_id',$user->id)->get();
        foreach($service as $s){
            $s->status = 0;
            $s->save();
        }
        $blogs = Blog::where('user_id',$user->id)->get();
        foreach($blogs as $s){
            $s->status = 0;
            $s->save();
        }
        $videos = Video::where('user_id',$user->id)->get();
        foreach($videos as $s){
            $s->status = 2;
            $s->save();
        }
    }
            

        return response()->json(['message' => 'User status updated successfully.']);
    }
    
    public function show($id){
        $user = User::find($id);
        $services = $user->services;
        $blogs = $user->blogs;
        $videos = $user->videos;
        $podcasts = $user->podcasts;
        $consls =$user->consutiong;
        $conversations =Message::where('sender_id',$id)->orWhere('receiver_id',$id)->get();
        $users_follows  = User::whereHas('follower', function($q) use($id){
            $q->where('marketer_id', $id);
        })->get();
        $users = $conversations->map(function($conversation) use($id){
        if($conversation->sender_id == $id) {
            return $conversation->receiver;
        }

        return $conversation->sender;
        })->unique();
        // return view('pages.marketers.profile.chats')->with('users',$users)->with('user',$id); 

        return view('pages.marketers.profile.show')
        ->with('user', $user)
        ->with('services',$services)
        ->with('blogs',$blogs)
        ->with('users_follows',$users_follows)
        ->with('podcasts',$podcasts)
        ->with('consls',$consls)
        ->with('users',$users)
        ->with('videos',$videos);


    }
    public function show_messages($id){
        $conversations =Message::where('sender_id',$id)->orWhere('receiver_id',$id)->get();
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
        $consls = BookingConsultion::where('user_id',$user->id)->get(); 
        $conversations =Message::where('sender_id',$id)->orWhere('receiver_id',$id)->get();
        $messages = $conversations->map(function($conversation) use($id){
        if($conversation->sender_id == $id) {
            return $conversation->receiver;
        }

        return $conversation->sender;
        })->unique();

        return view('pages.customers.profile.show')
        ->with('user', $user)
        ->with('messages', $messages)

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
    public function delete_creators($id){
        $user = User::find($id)->delete();
        Alert::warning('Success', 'Deleted successfully');

        return redirect()->back();
    }

    
}
