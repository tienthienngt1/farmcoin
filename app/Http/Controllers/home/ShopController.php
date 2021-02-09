<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\GetAllRepositories;
use Session;

class ShopController extends Controller
{
  use GetAllRepositories;
    public function index()
    {
      return redirect('home/shop/1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if(!isset($_POST['buy'])){
         return $this->index();
       }
       
       $cost = (int)$request->cost;
       $balance = (int)$this->getMoneyUser()->balance;
       $level = null;
       
       if($request->id === "1"){
         $level = json_decode($this->getUser()->role)->levelFarm;
       }else{
         $level = json_decode($this->getUser()->role)->levelPet;
       }
       
       if($level === null){
         return $this->index();
       }
       
       if($balance <= $cost){
       Session::flash('notifyError',' Bạn không đủ tiền trong tài khoản');
       }else{
         $arrayRole = json_decode($this->getUser()->role, true);
         if($request->id === "1"){
           $b = ['levelFarm' => $arrayRole['levelFarm'] + 1];
         }else{
           $b = ['levelPet' => $arrayRole['levelPet'] + 1];
         }
         $c = array_replace($arrayRole,$b);
         $arrayMoney = json_decode($this->getUser()->money, true);
         $minusBalance = ['balance' =>$balance - $cost];
         $d = array_replace($arrayMoney, $minusBalance);
         $data1 = ['money'=>json_encode($d)];
         $data = [
           'role' => json_encode($c)
          ];
         $this->updateUser($data);
         $this->updateUser($data1);
       Session::flash('notify','Mở Khoá thành công, bạn nhận được '.$request->name);
       }
     
       return redirect('home/shop/'.$request->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view('home.shop',['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
