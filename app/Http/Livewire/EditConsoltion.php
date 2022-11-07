<?php

namespace App\Http\Livewire;

use App\Models\Consulting;
use App\Models\ConsutingDate;
use Livewire\Component;
use Request;

class EditConsoltion extends Component
{
    public $con_id;
    public Consulting $con;

    public $colsoltion;
    public $currentSection = 1;
    public $title,$days, $description, $user, $type, $place, $color, $time_duration, $hour, $mints, $day, $from, $to, $price, $payment, $start_date, $end_date, $url;
    public $i = 1;
    public $inputs = [];
    public $day_selects = [];
    public $day_select=[];
    public $form_select = [];
    public $to_select = [];


    public $successMessage;


    public $values;
    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }
    public function mount()
    {
        $getProductID = explode('/', url()->current());
        $this->con_id = (int)Request::segment(2);
        $this->con = Consulting::find($this->con_id);
        $this->title = $this->con->title;
        $this->description = $this->con->description;
        $this->user = $this->con->user_id;
        $this->type = $this->con->type_id;
        $this->place = $this->con->place_id;
        $this->color = $this->con->color;
        $this->hour = $this->con->hour;
        $this->mints = $this->con->min;
        $this->start_date =$this->con->start_at;
        $this->end_date = $this->con->end_at;
        $this->price = $this->con->price;
        $this->url = $this->con->url;
        $this->days = $this->con->date;
        $this->i = $this->con->date->count() + 1;
        foreach($this->days as $key=>$d){
            $this->day_select[$key]= $d->day;
            $this->form_select[$key]= $d->from;
            $this->to_select[$key]= $d->to;

        }
        // dd($this->con);
        $this->payment = $this->con->payment_id;
        if($this->con->hour == 0 && $this->con->min == 30){
            $this->time_duration = 30;
        }elseif($this->con->hour == 1 && $this->con->min == 0){
            $this->time_duration = 60;
        }elseif($this->con->hour == 2 && $this->con->min == 0){
            $this->time_duration = 120;
        }else{
            $this->time_duration = 'else';
        }
        
        
        

    }

    public function render()
    {
        return view('livewire.edit-consoltion');
    }
    public function remove($i)
    {   
        dd($this->i);
        unset($this->i);
    }
    public function remove_key($i)
    {
        dd($this->inputs[$i]);
        unset($this->inputs[$i]);
    }

    public function step1()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'place' => 'required',
            'color' => 'required',
            'user' => 'required'

        ]);

        $this->currentSection = 2;
    }
    public function step2()
    {
        $validatedData = $this->validate([
            'price' => 'required',
            'time_duration' => 'required',
            'url' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'payment' => 'required'

        ]);
        // $validatedDate = $this->validate(
        //     [
        //         'day.0' => 'required',
        //         'from.0' => 'required',
        //         'to.0' => 'required',
        //         'day.*' => 'required',
        //         'from.*' => 'required',
        //         'to.*' => 'required',

        //     ],
        //     [
        //         'day.0.required' => 'day field is required',
        //         'from.0.required' => 'from field is required',
        //         'to.0.required' => 'to field is required',

        //         'day.*.required' => 'day field is required',
        //         'from.*.required' => 'from field is required',
        //         'to.*.required' => 'to email must be a valid email address.',
        //     ]
        // );


        $this->currentSection = 3;
    }
    public function step3(Request $request)
    {
        // $time_duration == 'else' ? $hour .':'. $mints.':00' : $time_duration  
        if($this->time_duration == 'else'){
            $hour = $this->hour;
            $mints = $this->mints;
        }elseif($this->time_duration == 30){
            $hour = 0;
            $mints = 30;
        }elseif($this->time_duration == 60){
            $hour = 1;
            $mints = 0;
        }
        elseif($this->time_duration == 120){
            $hour = 2;
            $mints = 0;
        }
        $cond = Consulting::find($this->con_id);
        $con = $cond->update([
            'title' => $this->title,
            'description' => $this->description,
            'color' => $this->color,
            'place_id' => $this->place,
            'type_id' => $this->type,
            'hour' => $hour,
            'min' => $mints,
            'start_at'=>$this->start_date,
            'end_at'=>$this->end_date,
            'price'=>$this->price,
            'url'=>$this->url,
            'payment_id'=>$this->payment,
            'user_id'=>$this->user,
        ]);
        ConsutingDate::where('consulte_id',$cond->id)->delete();
        foreach ($this->day_select as $key => $value) {

            ConsutingDate::create(['consulte_id'=>$cond->id,'day' => $this->day_select[$key], 'from' => $this->form_select[$key] , 'to' => $this->to_select[$key]]);
        }

        // foreach ($this->day as $key => $value) {
        //     ConsutingDate::create(['consulte_id'=>$con->id,'day' => $this->day[$key], 'from' => $this->from[$key] , 'to' => $this->to[$key]]);
        // }
 

        $this->successMessage = "تم التعديل بنجاح";

        // $this->clearForm();

        $this->currentSection = 1;
    }
    public function back($section)
    {
        $this->currentSection = $section;
    }

}
