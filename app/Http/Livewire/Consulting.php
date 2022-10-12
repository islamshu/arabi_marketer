<?php

namespace App\Http\Livewire;

use App\Models\Consulting as ModelsConsulting;
use App\Models\ConsutingDate;
use Livewire\Component;
use App\Models\User;
use Request;

class Consulting extends Component
{
    public $currentSection = 1;
    public $title, $description,$user, $type, $place,$color,$time_duration,$hour,$mints,$day,$from,$to,$price,$payment,$start_date,$end_date,$url;
    public $i = 1;
    public $inputs = [];
    public $successMessage;
    public $values;
    
    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }
    public function step1()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'place' => 'required',
            'color'=>'required',
            'user'=>'required'
        ]);

        $this->currentSection = 2;
    }
    public function step2()
    {
        $validatedData = $this->validate([
            'price' => 'required',
            'time_duration'=>'required',
            'url' => 'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'payment'=>'required'

        ]);
        $validatedDate = $this->validate([
            'day.0' => 'required',
            'from.0' => 'required',
            'to.0' => 'required',
            'day.*' => 'required',
            'from.*' => 'required',
            'to.*' => 'required',

        ],
        [
            'day.0.required' => 'day field is required',
            'from.0.required' => 'from field is required',
            'to.0.required' => 'to field is required',

            'day.*.required' => 'day field is required',
            'from.*.required' => 'from field is required',
            'to.*.required' => 'to email must be a valid email address.',
        ]
    );


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
        $con = ModelsConsulting::create([
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

        foreach ($this->day as $key => $value) {
            ConsutingDate::create(['consulte_id'=>$con->id,'day' => $this->day[$key], 'from' => $this->from[$key] , 'to' => $this->to[$key]]);
        }
 

        $this->successMessage = "تم الاضافة بنجاح";

        $this->clearForm();

        $this->currentSection = 1;
    }
    public function back($section)
    {
        $this->currentSection = $section;
    }
    public function clearForm()
    {
        $this->title = "";
        $this->description = "";
        $this->color = "";
        $this->place = "";
        $this->type = "";
        $this->hour = "";
        $this->mints = "";
        $this->price = "";
        $this->payment = "";
        $this->start_date = "";
        $this->end_date = "";
        $this->url = "";

    }

    public function render()
    {
        return view('livewire.consulting');
    }
}