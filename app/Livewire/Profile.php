<?php

namespace App\Livewire;

use App\Models\offer;
use App\Models\order;
use App\Models\order_item;
use App\Models\product;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout("layouts.nav_footer")]
class Profile extends Component
{
   

    public function render()
    {
        $user=User::where("id",auth()->user()->id)->first();
     
        return view('livewire.profile',["userdata"=>$user]);
    }
}
