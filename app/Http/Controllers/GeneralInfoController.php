<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Blog;
use App\Models\BlogImage;
use App\Models\Consulting;
use App\Models\GeneralInfo;
use App\Models\Notification;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GeneralInfoController extends Controller
{
    public function about_frontend(){
        return view('pages.about_frontend');
    }
    public function admin_setting(){
        return view('pages.admin_setting');
    }

    
    public function return_exchange_policy(){
        return view('pages.return_exchange_policy');
    }
    public function usage_policy(){
        return view('pages.usage_policy');
    }
    public function pay_policy(){
        return view('pages.pay_policy');
    }
    public function rights_guarantee(){
        return view('pages.rights_guarantee');
    }
    public function how_site_work(){
        return view('pages.how_site_work');
    }

    
    
    
    public function privacy_policy(){
        return view('pages.privacy_policy');
    }

    

    public function myfatoorah()
    {
        return view('pages.configs.myfatoorah');
    }
    public function first_section(){
        return view('pages.configs.home');
    }
    public function price_service(){
        return view('pages.configs.price_service');
    }
    public function price_consultion(){
        return view('pages.configs.price_consultion');
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

        Alert::success('Success', 'تم تحديث البيانات بنجاح');
        return redirect()->back();
    }
    public function store_test(Request $request)
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
            
            Generalinfo::setValue(str_replace('%','',$name), $value);
        }

        Alert::success('Success', 'تم تحديث البيانات بنجاح');
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
                $data =  $c->title ."<br>";
                $type = '<span style="font-size: 14px;color: red;">(Blog )</span>';
                $dd = '/blogs/'.$c->id.'/edit';
               $anc=  "<li> <a href=".$dd.">   $data $type </a></li>";
              
               
                array_push($cl ,$anc);
            }
        }
        $vendors = Video::where('title','like','%'.$input.'%')->orWhere('title','like','%'.$input.'%')->get();
        
        if($vendors){
            foreach($vendors as $c){

                 $data =  $c->title."<br>";
                    $type = '<span style="font-size: 14px;color: red;">(video )</span>';

                    $dd = '/videos/'.$c->id.'/edit';
                    $anc=  "<li> <a href=".$dd.">  $data $type  </a></li>";
              
               
                array_push($cl ,$anc);
            }
        }
        $branches = Consulting::where('title','like','%'.$input.'%')->orWhere('title','like','%'.$input.'%')->get();
        
        if($branches){
            foreach($branches as $c){

                 $data = $c->title."<br>";
                $type = '<span style="font-size: 14px;color: red;">(Consulting )</span>';

                $dd = '/consloution/'.$c->id.'/edit';
                $anc=  "<li> <a href=".$dd.">  $data $type </a></li>";
              
               
                array_push($cl ,$anc);
            }
        }
        
      
        
        if(!$cl){
                    $emp = array();

            $data = '<li> <a >  لا توجد بيانات متطابقة  </a></li>';
             array_push($emp ,$data);
            return $emp;
        }else{

            return $cl;
        }      
    }
    public function general_data()
    {
        return view('pages.configs.general');
    }
    public function upload(Request $request)
    {
        $image = $request->image ;

        $input['imagename'] = time().'.'.$image->extension();
         
        $destinationPath = public_path('uploads/blog');
        $img = Image::make($image->path());
        $img->resize(1300, 1300, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

            
            
        $imagee= 'blog/'.$input['imagename'];

        $name = preg_replace('/\..+$/', '', $image->getClientOriginalName());
        $pic = new BlogImage();
        $pic->image    = $imagee;
        $pic->title = $name;
        $pic->user_id = auth()->id();
        $pic->save();
     
        return $pic;
    }
    public function get_image($id)
    {
       $pic= BlogImage::find($id);
     
        return $pic;
    }
    public function update_data_image(Request $request){
        $pic = BlogImage::find($request->image_id);
        $pic->title = $request->title_image;
        $pic->alt = $request->alt_image;
        $pic->description = $request->description_image;
        $pic->save();
        return true;
    }


}
