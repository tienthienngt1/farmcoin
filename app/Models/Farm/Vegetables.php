<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_user',
        'name',
        'icon',
        'cost',
        'time',
    ];

}
