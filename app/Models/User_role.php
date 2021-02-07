<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_role extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_user',
        'level',
        'auth',
        'role_forum',
        'farm_level',
        'pet_level',
    ];
}
