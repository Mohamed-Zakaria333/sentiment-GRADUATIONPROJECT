<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
class customlogin extends Controller
{
       














       protected function user_login(Request $request)
   {

     // dd(343+3434);
      //========================
       $this->validate($request, [
      'email'    => 'required|email',
      'password'  => 'required'
     ]);
       $user=DB::table('users')->where(['email'=>$request->get('email'),'password'=>$request->get('password')])->first();


       if($user==null)
       {

         return redirect('/HomePage')->with('success', 'member not fount in our databases');

       }
       
       if($user->isAdmin==0)
       {
          Auth::loginUsingId($user->id, true);
        
          return back();
        }
      if($user->isAdmin==1)
       {
       return back();
        }    








   } 
//=======================================================================
//=======================================================================
//=======================================================================
//=======================================================================
//=======================================================================
//=======================================================================
//=======================================================================
//=======================================================================




       protected function admin_login(Request $request)
       {
        //dd(3434+334);
       $this->validate($request, [
      'email'    => 'required|email',
      'password'  => 'required'
        ]);
      //==================================
       $user=DB::table('users')->where(['email'=>$request->get('email'),'password'=>$request->get('password')])->first();
       if($user==null)
       {

        return redirect('/Admin_Login')->with('success', 'Admin not fount in our databases');

       }
       
    
        if($user->isAdmin==1)
       {

            
        Session::put('active_admin',[1,$user->avatar,$user->Fname,$user->Lname]);
        //dd(Session::get('active_admin')[1]);
        // $is_active = Session::get('active_admin');
       // Auth::loginUsingId($user->id, true);
        //Auth::guard('admin')->getProvider();
        //Auth::guard('admin')->login($user,true);
       //dd(Auth::guard('admin')->getUser());


        //dd($x);
          return redirect('/Dashboard/products');
       }


     
   } 







































}
