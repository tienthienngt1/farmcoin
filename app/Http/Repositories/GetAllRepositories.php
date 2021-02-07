<?php 

namespace App\Http\Repositories;

use App\Http\Repositories\GetVetRepositories;
use App\Http\Repositories\GetFarmRepositories;
use App\Http\Repositories\GetUserRepositories;
use App\Http\Repositories\GetBagRepositories;

trait GetAllRepositories
{
  use GetVetRepositories, GetFarmRepositories, GetUserRepositories , GetBagRepositories;
  
}