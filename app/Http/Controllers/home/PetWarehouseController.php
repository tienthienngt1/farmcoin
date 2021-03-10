<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\GetAllRepositories;
use Carbon\Carbon;
use Session;

class PetWarehouseController extends Controller
{
  
  use GetAllRepositories;
  
    public function redirect()
    {
      return redirect('home/pet');
    }
    
    public function index()
    {
        return view('home.petWarehouse');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->getPetBag()->statusPet !== null){
          session::flash('notifyError','Bạn đang nuôi con vật khác rồi!');
          return $this->redirect();
        }
        $id = $request->__id;
        $data = [
          'bag->pet->statusPet' => $id,
          'bag->pet->timePet' => Carbon::now()->add($this->getRecordPet($id)->time,'hour'),
        ];
        
        $this->updateUser($data);
        
        session::flash('notify','Nuôi '.$request->__name.' thành công!');
        
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
