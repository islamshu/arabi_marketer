<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\MarkterOrder;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Auth;
use Illuminate\Http\Request;
use Notification;
use Spatie\Permission\Contracts\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return response()->view('pages.users.index');
    }
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
       return view('pages.users.create')->with('roles');
    }
    
    public function getData(Request $request){
        $users = User::orderBy('id', 'asc')->where('type','!=','user')->where('type','!=','marketer');


        return datatable_paginate($users);
    }
    public function dashbaord(){
        if(Auth::check()){
            return view('pages.index');
        }else{
            return redirect()->route('login');
        }
    }

    public function marketers_requests()
    {
       return view('pages.users.request')->with('requests',MarkterOrder::orderby('id','desc')->get());
    }
    public function change_status_markter(Request $request, $id){
        $order = MarkterOrder::find($id);
        $user = $order->user;
        if($request->status == 2){
            $user->type = 'marketer';
        }else{
            $user->type = 'user';
        }
        $user->save();
        $order->delete();
        Alert::success('Success', 'Edited successfully');
        if($request->status == 2 && $request->message == null){
            $datas = [
                'id' => $user->id,
                'name' => $user->name,
                'url' => "",
                'title' => 'تم قبولك كمسوق',
                'time' => $user->updated_at
            ];
            Notification::send($user, new GeneralNotification($datas));
        }
        if($request->status == 0 && $request->message == null){
            $datas = [
                'id' => $user->id,
                'name' => $user->name,
                'url' => "",
                'title' => 'تم رفضك كمسوق',
                'time' => $user->updated_at
            ];
            Notification::send($user, new GeneralNotification($datas));
        }
        if($request->message != null){
            $data = [
                'id' => $user->id,
                'name' => $user->name,
                'url' => "",
                'title' => $request->message,
                'time' => $user->updated_at
            ];
            Notification::send($user, new GeneralNotification($data));
        }

        return redirect()->route('customer.show',$user->id);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $config = theme()->getOption('page');

        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = theme()->getOption('page', 'edit');

        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
