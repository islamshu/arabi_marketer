<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Country;
use App\Models\MarkterSoical;
use App\Models\Specialty;
use App\Models\User;
use App\Models\UserCategory;
use Carbon\Carbon;
use Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Str;

class Markter extends Component
{
    use WithFileUploads;
    public $currentStep = 1;
    public $selection=[];
    public $mention,$first_name,$last_name,$email,$password,$confirm_password, $price, $detail,$country,$pio, $status = 1;
    public $image;
    public $facebook,$instagram,$twitter,$pinterest,$snapchat,$linkedin,$website,$followers_number;
    public $successMsg = '';
  
    /**
     * Write code on Method
     */
    public function render()
    {

        return view('livewire.markter', [
            'categoires' => Specialty::orderBy('id', 'asc')->get(),
            'countries'=>Country::get(),
       ]);
    }
  
    /**
     * Write code on Method
     */
    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'mention' => 'required|unique:users,mention',
            'email' => 'email|required|unique:users,email',
            'first_name' => 'required',
            // 'last_name' => 'required',
            'country'=>'required',
            'password'=>'required',
            'confirm_password'=>'required|same:password',
            'image'=>'required'
        ]);

 
        $this->currentStep = 2;
    }
  
    /**
     * Write code on Method
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'selection' => 'required',
            'pio'=>'required',
        ]);
  
        $this->currentStep = 3;
    }
    public function thirdStepSubmit()
    {
      
  
        $this->currentStep = 4;
    }
  
    /**
     * Write code on Method
     */
    public function submitForm()
    {
        $user = new User();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->name = str_replace('@','',$this->mention);
        $user->mention = $this->mention;
        $user->type = 'marketer';
        $user->email = $this->email;
        $user->password =  Hash::make($this->password);
        $user->cover = 'cover_profile.jpg';
        $user->email_verified_at = Carbon::now();
        $user->lang = 'ar';
        $user->image = $this->image->store('users');
        $user->country_id = $this->country;
        $user->status = 2;
        $user->save();
        $soical = new MarkterSoical();
        $soical->user_id = $user->id;
        $soical->facebook = $this->facebook;
        $soical->twitter = $this->twitter;
        $soical->pinterest = $this->pinterest;
        $soical->snapchat = $this->snapchat;
        $soical->followers_number = $this->followers_number;

        $soical->save();
   
     

            foreach ($this->selection as $type) {
              
                $usertype = new UserCategory();
                $usertype->user_id = $user->id;
                $usertype->type_id = $type;
                $usertype->save();
            }
        

     
  
        $this->successMsg = 'تم انشاء الصانع محتوى بنجاح';
  
        $this->clearForm();
  
        $this->currentStep = 1;
    }
  
    /**
     * Write code on Method
     */
    public function back($step)
    {
        $this->currentStep = $step;    
    }
  
    /**
     * Write code on Method
     */
    
     public function generatePassword()
     {
         $this->password = Str::random(8);
         $this->confirm_password = $this->password ;
     }
    public function clearForm()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->mention = '';
        $this->email = '';
        $this->country = '';
        $this->selection = [];
        $this->pio = '';
        $this->image = '';

        $this->password = '';
    }
}