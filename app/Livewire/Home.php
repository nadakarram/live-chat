<?php

namespace App\Livewire;

use App\Models\chat_room;
use App\Models\private_converstaion;
use App\Models\room_participations;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
#[Layout("layouts.nav_footer")]

class Home extends Component
{ 
    public $roomp=[];
    public $page="nochat";
    public $data="";
    public $color="#fff";
    public function getroom($room_id){
        
        // $this->color=" #007bff23";
        $this->page="chating";
      
        $this->dispatch("chating");
        return redirect("/chating/$room_id");


    }
    #[On("chating")]
    public function render()
    {
        $rooms=chat_room::all();
        $privatechat1=private_converstaion::where("user1_id",auth()->user()->id)->get();
        $privatechat2=private_converstaion::where("user2_id",auth()->user()->id)->get();
    //    dd($privatechat2,$privatechat1);
        $members=room_participations::where("user_id",auth()->user()->id)->get();
        $users=User::all();
        foreach($rooms as $room){ 
            foreach ($members as $member) {
           
                if ($member->room_id==$room->id) {
                    $this->roomp[]=$room;
                    # code...
                }
            }
            # code...
        }
        return view('livewire.home',["users"=>$users,"rooms"=>$this->roomp,"privatechats1"=>$privatechat1,"privatechats2"=>$privatechat2]);
    }
}
