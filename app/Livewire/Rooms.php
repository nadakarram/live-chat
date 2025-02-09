<?php

namespace App\Livewire;

use App\Models\chat_room;
use App\Models\room_participations;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;

#[Layout("layouts.nav_footer")]

class Rooms extends Component
{
    use WithFileUploads;
    #[Validate("required|min:2|string")]
    public $name;
    #[Validate("nullable|image")]
    public $image;
    #[Validate("required|min:20|string")]
    public $description;
    #[Validate("required|string|in:private,public")]
    public $room_type;
    public $massage='';
    public $member_number=0;


    public function createroom(){
        $this->validate();
        $chatroom=chat_room::create([
            "name"=>$this->name,
            "description"=>$this->description,
            "image"=>$this->image?->store("uplouds/profile","public"),
            // ->store("uplouds/profile","public"),
            "user_created_id"=>auth()->user()->id,
            "room_type"=>$this->room_type

        ]);
        // dd($chatroom->id);
  
        room_participations::create([
            "user_id"=>auth()->user()->id,
            "room_id"=>$chatroom->id
        ]);

    }
    public function joinroom($room_id){
        if (room_participations::where("user_id",auth()->user()->id)->where("room_id",$room_id)->exists()) {
            # code...
            $this->massage="you already particpated";
        }else{
            room_participations::create([
                "user_id"=>auth()->user()->id,
                "room_id"=>$room_id
            ]);
            $this->massage="you joined in this room now";
        }
     

    }
    public function room_member_number($id){
        $this->member_number=room_participations::where("room_id",$id)->count();
        // return $num;
    }
    public function render()
    {
        $rooms=chat_room::all();
        $rooms_member=room_participations::all();
        return view('livewire.rooms',["rooms"=>$rooms,"rooms_member"=>$rooms_member]);
    }
}
