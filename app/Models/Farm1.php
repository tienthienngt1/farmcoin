<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_user',
        'field1',
        'field2',
        'field3',
        'field4',
        'field1_time',
        'field2_time',
        'field3_time',
        'field4_time',
    ];
    
    protected $timestamps = false;

}
