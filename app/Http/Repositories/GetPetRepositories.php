<?php

namespace App\Http\Repositories;

use DB;

trait GetPetRepositories 
{
 
  public function getPet()
  {
    return DB::table('pet')->get();
  }

}