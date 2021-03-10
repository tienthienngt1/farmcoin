<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Mail\ForgetPassword;
use DB, Session, Mail;

class ForgotPasswordController extends Controller
{
  public function showLinkRequestForm()
  {
      return view('auth.passwords.email');
  }

  protected function sendResetLinkEmail(Request $request)
  {
    $this->validateEmail($request);
    $newPass = rand(00000000, 99999999);
    $user = DB::table('users')->where('email',$request->email)->first();
    if(!$user){
      Session::flash('notifyError','Địa chỉ email không tồn tại');
      return back();
    }
    DB::table('users')->where('email',$request->email)->update([
      'password' => bcrypt($newPass),  
    ]);
    Mail::to($request->email)->send(new ForgetPassword($newPass));
    Session::flash('notify',' Bạn vui lòng kiểm tra email để lấy mật khẩu mới.');
    return back();
  }
  
  protected function validateEmail(Request $request)
  {
    $request->validate(['email' => 'required|email']);
  }
}
