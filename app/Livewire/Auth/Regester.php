<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout("layouts.app")]
class Regester extends Component
{
    use WithFileUploads;
    #[Validate("required|min:2|string")]
    public $name;
    #[Validate("required|email|unique:users")]
    public $email;
    #[Validate("required|min:4|string")]
    public $username;
    #[Validate("required|min:6|max:10")]
    public $password;
   
  
    #[Validate("nullable|image")]
    public $image;
    public $terms;

    public function regester(){
        $this->validate();
        $user=User::create([
            "name"=>$this->name,
        
            "email"=>$this->email,
            "password"=>$this->password,
            "username"=>$this->username,
            "image"=>$this->image?->store("uplouds/profile","public"),

        ]);
        // $user->assignRole("user");
        redirect("/login");

    }
    public function render()
    {
        return view('livewire.auth.regester');
    }
}
