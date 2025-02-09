<?php

namespace App\Livewire;

use App\Events\massagesend;
use App\Models\converstaion_massage;
use App\Models\private_converstaion;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Privatechat extends Component
{
  
    public $conv_id;
    public $user;
    public $converstaion_massage;
    public $conversation;
    #[Validate("required|string|min:1")]
    public $massage_text;
    #[On("sended")]
    

    public function mount($user_id){
        // dd($user_id);
        $this->user=User::where("id",$user_id)->first();
        if(private_converstaion::where("user2_id",$this->user->id)->where("user1_id",auth()->user()->id)->exists()||private_converstaion::where("user1_id",$this->user->id)->where("user2_id",auth()->user()->id)->exists()){
           
            $this->conversation=private_converstaion::where("user1_id",$this->user->id)->where("user2_id",auth()->user()->id)->first()??private_converstaion::where("user2_id",$this->user->id)->where("user1_id",auth()->user()->id)->first() ;
            // dd("1");
            $this->conv_id=$this->conversation->id;
           
        }else{
            // dd("not found");
            $this->conversation=private_converstaion::create([
                "user1_id"=>$this->user->id,
                "user2_id"=>auth()->user()->id
            ]);
            $this->conv_id= $this->conversation->id;
        }
        // $this->id=$room_id;
        // $this->conversation=private_converstaion::where("id",$this->conv_id)->first();

    }
    // function BroadcastMassageRecive($event){
    //     dd($event);
    //     }

    //   public function getListeners(){
    //     $auth_id=auth()->user()->id;
    //     return [
    //         "echo-private:chat.{$auth_id},MasageSent"=>"BroadcastMassageRecive"
    //     ];

    // }
    
    // public function dispatchmassagesend(){
        
    //     broadcast(new massagesend(auth()->user(),$this->converstaion_massage,$this->conversation,$this->user));
    // }

   
    public function sendmassage(){
        // dd(1);
        $this->validate();
        // dd(2);
       
  
            $this->converstaion_massage=converstaion_massage::create([
                'sender_id'=>auth()->user()->id,
                "massage_text"=>$this->massage_text,
                "converstaion_id"=>$this->conv_id
    
    
            ]);
            // dd(3);
            $this->massage_text="";
            $this->dispatch("sended",[$this->user->id]);
            
            // $this->dispatchmassagesend();
        

    

    }
   
    public function render()
    {
        $massages=converstaion_massage::where("converstaion_id",$this->conv_id)->get();
        // dd($this->conv_id);
        $users=User::all();
        return view('livewire.privatechat',["users"=>$users,"user"=>$this->user,'massages'=>$massages]);
    }
}
