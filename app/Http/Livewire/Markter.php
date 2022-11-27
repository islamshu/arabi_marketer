<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Country;
use App\Models\User;
use App\Models\UserCategory;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Markter extends Component
{
    use WithFileUploads;
    public $currentStep = 1;
    public $selection=[];
    public $mention,$first_name,$last_name,$email,$password, $price, $detail,$country,$pio, $status = 1;
    public $image;
    public $successMsg = '';
  
    /**
     * Write code on Method
     */
    public function render()
    {
        return view('livewire.markter', [
            'categoires' => Category::ofType('user')->orderBy('id', 'asc')->get(),
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
            'last_name' => 'required',
            'country'=>'required',
            'password'=>'required',
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
        $user->status = 1;
        $user->email_verified_at = Carbon::now();
        $user->lang = 'ar';
        $user->country_id = $this->country;

        $user->save();
   
     

            foreach ($this->selection as $type) {
              
                $usertype = new UserCategory();
                $usertype->user_id = $user->id;
                $usertype->type_id = $type;
                $usertype->save();
            }
        

     
  
        $this->successMsg = 'Markter successfully created.';
  
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
    public function clearForm()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->mention = '';
        $this->email = '';
        $this->country = '';
        $this->selection = '';
        $this->pio = '';
        $this->password = '';
    }
}