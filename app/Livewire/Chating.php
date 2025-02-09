<?php

namespace App\Livewire;

use App\Models\chat_room;
use App\Models\room_massage;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
// #[Layout("layouts.nav_footer")]

class Chating extends Component
{
    public $id;
    public $room;
    #[Validate("required|string|min:1")]
    public $massage_text;
    public function mount($room_id){
        // dd($room);
        $this->id=$room_id;
        $this->room=chat_room::where("id",$room_id)->first();

    }
    public function sendmassage(){
        // dd(1);
        $this->validate();
        // dd(2);
        room_massage::create([
            'sender_id'=>auth()->user()->id,
            "massage_text"=>$this->massage_text,
            "room_id"=>$this->id


        ]);
        $this->massage_text="";
        $this->dispatch("sended");

    }
    #[On("sended")]
    public function render()
    {
        // dd($this->room);
        $users=User::all();
        $massages=room_massage::where("room_id",$this->id)->get();
        
        return view('livewire.chating',["users"=>$users,"room"=>$this->room,'massages'=>$massages]);
    }
}
