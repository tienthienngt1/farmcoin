<?php

namespace App\Http\Repositories;

use App\Models\User;
use DB,Auth;

trait GetUserRepositories
{
  
  public function getUser()
  {
    if(Auth::user() === null){
      return null;
    };
    return User::where('id',Auth::user()->id)->first();
  }
  
  public function updateUser($data)
  {
    return User::where('id',Auth::user()->id)->update($data);
  }
}