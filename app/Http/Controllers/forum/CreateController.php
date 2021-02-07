<?php

namespace App\Http\Controllers\forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Categories;
use App\Models\Like_comment;
use Session, Auth;

class CreateController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if(!empty($id)){
            $mess = [
              'tittle.required' => 'Tiêu đề không được để trống',
              'tittle.max' => 'Tiêu đề không được quá 100 kí tự',
              'content.required' => 'Nội dung không được để trống',
              'content.max' => 'Nội dung không được quá 500 kí tự',
            ];
            
            $validator = $request->validate([
              'tittle' => ['required','max:100'],
              'content' => ['required','max:500'],
            ],$mess);
            
              Categories::create([
                'id_user' => Auth::user()->id,
                'category' => $id,
                'hash' => md5(now()),
                'tittle' => $request->tittle,
                'content' => $request->content,
                'like' => 0,
                'view' => 0,
                'comment' => 0,
            ]);
              session::flash('notify','Tạo bài viết thành công !');
              return redirect('/forum/'.$id);
        };
        return redirect ($request->path());
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
