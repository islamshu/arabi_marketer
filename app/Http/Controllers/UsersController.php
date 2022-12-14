<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\MarkterOrder;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Auth;
use Crypt;
use Hash;
use Illuminate\Http\Request;
use Notification;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =User::orderBy('id', 'asc')->where('type','!=','user')->where('type','!=','marketer')->get();
       return view('pages.users.index')->with('users',$users);
    }
    public function verfty_email($id){
       $encid = Crypt::decrypt($id);
       $user = User::find($encid);
       $user->email_verified_at = now();
       $user->save();
       return Redirect::to('https://sub.arabicreators.com/');
    }
    public function create()
    {
        $roles = Role::get();
       return view('pages.users.create')->with('roles',$roles);
    }
    public function store(Request $request){
        $check = User::where('email',$request->email)->where('type','staff')->first();
        if($check){
            return redirect()->back()->with(['error'=>'البريد الاكتروني مستخدم من قبل']) 
            ->withInput($request->all());

        }
       $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'confirm_password' => 'required|same:password',
       ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mention =  '@'. str_replace(' ','_',$request->name) ;
        $user->type = 'staff';
        $user->image = 'users/defult_user.png';
        $user->password =  Hash::make($request->password);
        $user->save();
        $user->assignRole($request->input('roles'));
        Alert::success('Success', 'تم الاضافة بنجاح');

       return redirect()->route('users.index');
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
            $user->status = 2;
        }else{
            $user->status = 0;
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
                'title' => 'تم قبولك كصانع محتوى',
                'time' => $user->updated_at
            ];
            Notification::send($user, new GeneralNotification($datas));
        }
        if($request->status == 0 && $request->message == null){
            $datas = [
                'id' => $user->id,
                'name' => $user->name,
                'url' => "",
                'title' => 'تم رفضك كصانع محتوى',
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
            $user->message = $request->message;
            $user->save();
            Notification::send($user, new GeneralNotification($data));
        }
        if($user->status = 2){
            return redirect()->route('marketer.show',$user->id);
        }else{
            return redirect()->route('customer.show',$user->id);

        }
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
        $user = User::find($id)->delete();
        Alert::success('Success', 'تم الحذف بنجاح');

    }
}
