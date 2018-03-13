<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class HomeController extends Controller
{
   public function index(){
   	return view('login');
   }
   public function signin(Request $request){
   	  $this->validate($request,[
            'email'=>'required',
            'password'=>'required',
        ]);
        $email=$request->email;
        $password=$request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password]))
            {
                return redirect('main');
            }
            else{
               return redirect()->back()->with('error','Invalid login credentials!'); 
            }
   }

   public function register()
   {
   	return view('register');
   }
      public function postRegister(Request $request)
    {
        $this->validate($request,[
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|confirmed',
        ]);
    User::create([
           'name'=>$request->fname."".$request->lname,
           'email'=>$request->email,
           'password'=>bcrypt($request->password),
           'user_level'=>1,
       ]);
    return redirect('/')->with('success','User has been created!, can now login');
       
    } 
    public function  postLogout(){
        Auth::logout();
        return redirect('/');
    }
}
