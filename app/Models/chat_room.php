<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat_room extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_created_id',
        'description',
        'image',
        "room_type",
        
    ];
}
