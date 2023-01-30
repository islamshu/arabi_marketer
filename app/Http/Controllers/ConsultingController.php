<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Livewire\EditConsoltion;
use App\Models\Consulting;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Http\Request;
use Notification;

class ConsultingController extends Controller
{
    public function index(){
        return view('pages.consulting.index')->with('consls',Consulting::orderby('created_at', 'desc')->get());
    }
    public function edit($id){
        return view('pages.consulting.edit');
    }
    public function change_status_consulting(Request $request,$id){
        $service = Consulting::find($id);
        $service->status = $request->status;
        $service->save();
        Alert::success('Success', 'Aproved service');
        $admins = User::where('type','Admin')->get();
        if($request->status ==1){
           $title = 'تم قبول الاستشارة'; 
           $date = [
            'id'=>$service->id,
            'url' => 'https://sub.arabicreators.com/Consulting/'.$service->user->mention.'/'.$service->url,
            'title' =>  $title,
            'time' => $service->updated_at
        ];
        }else{
            $title = 'تم رفض الاستشارة'; 
            $date = [
                'id'=>$service->id,
                'url' => 'https://sub.arabicreators.com/EditConsultation/'.$service->id,
                'title' =>  $title,
                'time' => $service->updated_at
            ];
        }
        Notification::send($service->user, new GeneralNotification($date));
            // send_notification($date);
        return redirect()->back();
    }
    public function reject_cons(Request $request){
     $cons = Consulting::find($request->cons_id);
     $cons->message = $request->message;
     $cons->status = 0;
     $cons->save();
     Alert::success('Success', 'Deleted successfully');
     return redirect()->back();  
    }
   
    public function show($id){
        
        return view('pages.consulting.show')->with('co',Consulting::find($id));
    }
    public function create(){
        return view('pages.consulting.create');
    }
    
    public function destroy($id){
        Consulting::find($id)->delete();
        Alert::success('Success', 'Deleted successfully');
        return redirect()->back();  
      }
}
