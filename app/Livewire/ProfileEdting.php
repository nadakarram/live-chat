<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
#[Layout("layouts.nav_footer")]
class ProfileEdting extends Component
{ 
    use WithFileUploads;
    #[Validate("required|min:2|string")]
    public $name;
    #[Validate("required|min:2|string")]
    public $username;
    #[Validate("required|email")]
    public $email;

   

    #[Validate(["image"])]
    public $edtedimage;
    public $image;

    public $user;

    public $massage="";
    function mount(User $user){
        $this->user=User::where("id",auth()->user()->id)->first();
        $this->name=$this->user->name;
        
        $this->username=$this->user->username;
       
        $this->email=$this->user->email;
        $this->image=$this->user->image;


    }
    function changeimage(){
        $this->validateOnly($this->edtedimage);
        User::where("id",auth()->user()->id)->update([
            "image"=>$this->edtedimage?->store("uplouds/profile","public"),]);
            $this->massage="image change correctly";
    }
     function updateUserData(){
        // dd("upated");
        // $this->validate();
        // dd("upated");
        User::where("id",auth()->user()->id)->update([
            "name"=>$this->name,
            "username"=>$this->username,
            
            "email"=>$this->email,
          
            // "address"=>$this->address,
            // "image"=>$this->edtedimage?->store("uplouds/profile","public"),
        ]);
      $this->massage="change correctly";

     }
    public function render()
    {
        return view('livewire.profile-edting');
    }
}
