<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\GetAllRepositories;
use DB, Auth, Session;
use Carbon\Carbon;

class FarmController extends Controller
{
  
  use GetAllRepositories;

    public function viewFarm()
    {
        return view('home.farm');
    }
    
    public function redirectFarm()
    {
        return redirect('home/farm');
    }
    
    public function handleGrow(Request $request, $id)
    {
      
      if(isset($_POST['plant']))
      {
        return $this->handlePlant($id);
      }
      
      if(isset($_POST['selectSeedling']))
      {
        return $this->handleSelectSeedling($request, $id);
      }
     
      if(isset($_POST['harvest']))
      {
        return $this->handleHarvest($request, $id);
      }
     
      return $this->redirectFarm();
    }
    
    public function selectSeedling($id)
    {
      $levelFarm = $this->getLevelFarm();
      
      $field = $this->getField($id);
      
      if($field !== null){
        return $this->redirectFarm();
      }
      
      $getVetUser = $this->getVetUser($levelFarm);
      
      return view('home.selectSeedling',['vet' => $getVetUser]);
    }

    public function handlePlant($id)
    {
      return $this->selectSeedling($id);
    }
    
    public function handleSelectSeedling($request, $id)
    {
      $idVet = $request->id;
      $field = $this->getField($id);
      $recordVet = $this->getRecordVet($idVet);
      
      if($field !== null)
      {
        return $this->redirectFarm();
      }
      
      $update = DB::table('users')->where('id',Auth::user()->id)->update([
          'farm->farm1s->field'.$id => $idVet,
          'farm->farm1s->field'.$id.'Time' => Carbon::now()->add($recordVet->time,'hour'),
        ]);
      
      if($update){
      Session::flash('notify','Gieo hạt thành công');
      }
        
      return $this->redirectFarm();
    }

    public function handleHarvest($request, $id)
    {
      $field = $this->getField($id);
      $nameVet = $this->getRecordVet($field)->name;
      
      if($field === null){
        return $this->redirectFarm();
      }
      
      if($this->getIdVetBag($field) === null){
        $data = [
          'bag->vet->'.$field => json_encode([
             'cost' => $this->getRecordVet($field)->sell,
             'path' => $this->getRecordVet($field)->icon,
             'name' => $nameVet,
             'quantity' => 1,
          ]),
        ];
      }else{
        $data = [
          'bag->vet->'.$field => json_encode([
             'cost' => $this->getRecordVet($field)->sell,
             'path' => $this->getRecordVet($field)->icon,
             'name' => $nameVet,
             'quantity' => $this->getQuantityVetBag($field) + 1
          ]),
        ];
      }
      
      $this->updateUser($data);
      $this->updateUser([
        'farm->farm1s->field'.$id => null,
        'farm->farm1s->field'.$id.'Time' => null,
      ]);
      $this->updateUser([
        'exp' => $this->getRecordVet($field)->exp,
      ]);
      
      Session::flash('notify','Thu hoạch thành công');
      return $this->redirectFarm();
    }
   
}
