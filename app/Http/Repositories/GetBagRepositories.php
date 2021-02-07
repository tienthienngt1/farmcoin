<?php

namespace App\Http\Repositories;

use App\Http\Repositories\GetUserRepositories;

trait GetBagRepositories
{
  use GetUserRepositories, GetVetRepositories;
  
  public function GetBagUser()
  {
    return json_decode($this->getUser()->bag);
  }
  
  public function GetNameVetBag($id)
  {
    return json_decode($this->getUser()->bag)->vet->$id->name;
  }
  
  public function GetQuantityVetBag($id)
  {
    return json_decode($this->getUser()->bag)->vet->$id->quantity;
  }
  
  public function GetNamePetBag($id)
  {
    $namePet = $this->getRecordVet($id)->name;
    return json_decode($this->getUser()->bag)->pet->$namePet;
  }
  
}