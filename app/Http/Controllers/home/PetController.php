<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\GetAllRepositories;
use Session,DB;

class PetController extends Controller
{
  use GetAllRepositories;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function redirect()
     {
       return redirect('home/pet');
     }
     
     
    public function index()
    {
        return view('home.pet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->getPetBag()->statusPet === null){
          return $this->redirect();
        }
        $pet = $this->getRecordPet($request -> __id);
      
        $data = [
          'bag->pet->statusPet' => null,
          'bag->pet->timePet' => null,
          'exp' => $this->getUser()->exp + $pet->exp,
          'money->balance' => $this->getMoneyUser()->balance + ($pet->sell/1000),
        ];
        
        $this->updateUser($data);
        $this->updateUser(['level' => $this->getLevel($this->getUser()->exp)]);
        
        session::flash('notify', 'Bán '.$pet->name.' thành công. Bạn nhận được '.$pet->exp.' exp và '.($pet->sell/1000).'TH');
        
        return $this->redirect();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
