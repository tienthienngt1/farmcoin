<?php

namespace App\Http\Controllers\forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session, Auth;
use App\Models\Comment;
class RepController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, $topic) 
    {
      $check= DB::table('categories')->where('hash',$topic)->first();
        
      if(isset($_POST['like'])){
        $check_user = DB::table('likes')->where('id_user',Auth::user()->id)->where('id_category',$check->id)->first();
        if($check_user === null){
          DB::table('likes')->insert(['id_user' => Auth::user()->id,'id_category' => $check->id]);
          DB::table('categories')->where('hash',$topic)->update(['like' => $check->like +1]);
          session::flash('notify','Like thành công');
        }
        return redirect($request->path());
      }
      
      if(isset($_POST['dislike'])){
          DB::table('likes')->where('id_user', Auth::user()->id)->where('id_category', $check->id)->delete();
          DB::table('categories')->where('hash',$topic)->update(['like' => $check->like - 1]);
          session::flash('notify',' Bỏ thích thành công !');
        return redirect($request->path());
      }
    
      $mess = [
        'content.required' => 'Nội dung không được để trống',
        'content.max' => 'Nội dung không được quá 500 kí tự',
      ];
            
      $validator = $request->validate([
        'content' => ['required','max:500'],
      ],$mess);
          
      Comment::create(['id_category' => $check->id, 'id_user' => $check->id_user,'content' => $request->content]);
          
      DB::table('categories')->where('id',$check->id)->update(['comment' => $check->comment + 1]);
          
      Session::flash('notify','Trả lời thành công');
          
      return redirect ($request->path());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, $topic)
    {
        $check= DB::table('categories')->where('categories.hash',$topic)->first();
        if($check === null){
          return redirect (route('forum'));
        };
        DB::table('categories')->where('hash',$topic)->update(['view' => $check->view + 1]);
        return redirect ('/forum/'.$id.'/topic/'.$topic);
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
