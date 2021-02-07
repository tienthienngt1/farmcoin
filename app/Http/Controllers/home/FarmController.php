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
      $nameVet = $this->getNameVetBag($field);
      if($field === null){
        return $this->redirectFarm();
      }
      
      if($nameVet === null){
        $updateBag = DB::table('users')->where('id',Auth::user()->id)->update([
            'bag->vet->'.$field.'->name' => $this->getRecordVet($field)->name,
            'bag->vet->'.$field.'->quantity' => 1 ,
          ]);
          
        $updateFarm = DB::table('users')->where('id',Auth::user()->id)->update([
          'farm->farm1s->field'.$id => null,
          'farm->farm1s->field'.$id.'Time' => null,
        ]);
        Session::flash('notify','Thu hoạch thành công');
        
      }else{
        
        $updateBag = DB::table('users')->where('id',Auth::user()->id)->update([
             'bag->vet->'.$field.'->quantity' => $this->getQuantityVetBag($field) +1,
           ]);
         
        $updateFarm = DB::table('users')->where('id',Auth::user()->id)->update([
          'farm->farm1s->field'.$id => null,
          'farm->farm1s->field'.$id.'Time' => null,
        ]);
        
        Session::flash('notify','Thu hoạch thành công');
      }
        return $this->redirectFarm();
      
    }
    
    public function viewBag($id)
    {
      $get_fl = DB::table('bags')->where('id', Auth::user()->id)->get();
      $get_vet = DB::table('vetgetables')->where('id','<=',$get_fl->farm_level)->get();
        return view('home.bag',['id'=>$id,'get_vet'=>$get_vet]);
    }
   
}
