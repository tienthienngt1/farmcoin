<?php

namespace App\Models\Farm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_user',
        'farm_level',
        'pet_level',
    ];

}
