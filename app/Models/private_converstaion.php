<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class private_converstaion extends Model
{
    use HasFactory;
    protected $fillable = [
        'user1_id',
        'user2_id',
        
        
    ];
}
