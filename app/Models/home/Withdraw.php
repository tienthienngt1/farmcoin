<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;
    
    protected $fillable = [
      'user_id','money', 'status'  
    ];
    
    public function user()
    {
      $this->belongsTo('App\Models\User');
    }
}
