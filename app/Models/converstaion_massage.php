<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class converstaion_massage extends Model
{
    use HasFactory;
    protected $fillable = [
        'sender_id',
        'converstaion_id',
        'massage_text',
       
        
    ];
}
