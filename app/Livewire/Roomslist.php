<?php

namespace App\Livewire;

use App\Models\chat_room;
use App\Models\room_participations;
use Livewire\Component;

class Roomslist extends Component
{
    public $roomp=[];
    public $page="nochat";
    public $data="";
    public function chatroom($room_id){
        
        
        $this->page="chating";
        $this->data=$room_id;


    }
    public function render()
    {
        $rooms=chat_room::all();
        $members=room_participations::where("user_id",auth()->user()->id)->get();
        foreach($rooms as $room){ 
            foreach ($members as $member) {
           
                if ($member->room_id==$room->id) {
                    $this->roomp[]=$room;
                    # code...
                }
            }
            # code...
        }
        // dd($this->roomp);
        
        return view('livewire.roomslist',["rooms"=>$this->roomp]);
    }
}
