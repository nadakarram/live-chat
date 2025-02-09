<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room_massage extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id',
        'sender_id',
        'massage_text',
      
        
    ];
}
