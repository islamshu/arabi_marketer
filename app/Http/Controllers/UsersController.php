<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\MarkterOrder;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Auth;
use Illuminate\Http\Request;
use Notification;

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
    
    public function getData(Request $request){
        $users = User::orderBy('id', 'asc');


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
        if($request->message != null){
            $data = [
                'id' => $user->id,
                'name' => $user->name,
                'url' => "",
                'title' => 'لديك مسوق جديد',
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
