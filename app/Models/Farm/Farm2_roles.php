<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_user',
        'farm5_role',
        'farm6_role',
        'farm7_role',
        'farm8_role',
    ];
    
    protected $timestamps = false;

}
