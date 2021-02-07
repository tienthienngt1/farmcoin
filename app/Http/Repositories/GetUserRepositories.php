<?php

namespace App\Http\Repositories;

use DB,Auth;

trait GetUserRepositories
{
  
  public function getUser()
  {
    return DB::table('users')->where('id',Auth::user()->id)->first();
  }
}