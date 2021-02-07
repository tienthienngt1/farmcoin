<?php

namespace App\Models\Farm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_user',
        'field5',
        'field6',
        'field7',
        'field8',
    ];
    
    protected $timestamps = false;

}
