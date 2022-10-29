<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Consulting;
use App\Models\GeneralInfo;
use App\Models\Notification;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GeneralInfoController extends Controller
{
    public function myfatoorah()
    {
        return view('pages.configs.myfatoorah');
    }
    public function store(Request $request)
    {
        if ($request->hasFile('general_file')) {
            foreach ($request->file('general_file') as $name => $value) {
                if ($value == null) {
                    continue;
                }
                GeneralInfo::setValue($name, $value->store('general'));
            }
        }

        foreach ($request->input('general') as $name => $value) {
            if ($value == null) {
                continue;
            }
            Generalinfo::setValue($name, $value);
        }

        session()->flash('success', 'تم تحديث البيانات بنجاح');
        return redirect()->back();
    }
    public function notification($id)
    {
        $not = Notification::find($id);
        $not->read_at = Carbon::now();
        $not->save();
        return redirect(json_decode($not->data)->url);
    }
    public function dashabord_search(Request $request){
        $input = $request['query'];
        if($input == null){
             $emp = array();

            $data = '<li> <a >  لا توجد بيانات متطابقة  </a></li>';
             array_push($emp ,$data);
            return $emp;
        }
        $clients =Blog::where('title','like','%'.$input.'%')->get();
    
        $cl = array();
        if($clients){
            foreach($clients as $c){
                $image = '<img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Profile-720.png" width="40" hight="30" >'  ;
                $data =  $c->name ."<br>";
                $type = '<span style="font-size: 14px;color: red;">(Blog )</span>';
                $dd = '/en/clinets/'.$c->id;
               $anc=  "<li> <a href=".$dd."> $image  $data $type </a></li>";
              
               
                array_push($cl ,$anc);
            }
        }
        $vendors = Video::where('title','like','%'.$input.'%')->orWhere('title','like','%'.$input.'%')->get();
        
        if($vendors){
            foreach($vendors as $c){
             $image = '<img onerror="this.onerror=null;this.src="http://website.foryougo.net/uploads/general/ZPQ01r4g2pVhVjiBMuDynwf3bu8fqVpwvQAyfM0t.png";" src="http://foryougo.foryougo.net/images/brand/'.$c->image.'" width="40" hight="30" >'  ;

                 $data =  $c->name_ar."<br>";
                    $type = '<span style="font-size: 14px;color: red;">(video )</span>';

                $dd = '/en/vendor/'.$c->id;
               $anc=  "<li> <a href=".$dd."> $image $data $type  </a></li>";
              
               
                array_push($cl ,$anc);
            }
        }
        $branches = Consulting::where('title','like','%'.$input.'%')->orWhere('title','like','%'.$input.'%')->get();
        
        if($branches){
            foreach($branches as $c){
                $image = '<img src="http://website.foryougo.net/uploads/general/ZPQ01r4g2pVhVjiBMuDynwf3bu8fqVpwvQAyfM0t.png" width="40" hight="30" >'  ;

                 $data = $c->name_ar."<br>";
                $type = '<span style="font-size: 14px;color: red;">(Consulting )</span>';

                $dd = '/en/branch/'.$c->id.'/edit';
               $anc=  "<li> <a href=".$dd."> $image $data $type </a></li>";
              
               
                array_push($cl ,$anc);
            }
        }
        $offers = Offer::where('name_ar','like','%'.$input.'%')->orWhere('name_en','like','%'.$input.'%')->get();
        
      
        
        if(!$cl){
                    $emp = array();

            $data = '<li> <a >  لا توجد بيانات متطابقة  </a></li>';
             array_push($emp ,$data);
            return $emp;
        }else{

            return $cl;
        }
        
        
        
        
        
      
    }


}
