<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Vinicius73\IAvatar\Facade\IAvatarFacade as IAvatar;
use File;
use Config;
use Illuminate\Support\Facades\Auth;
use App\User;
// Auth;
class customregistration extends Controller
{
    
   private $lastID;
         // constructor
        function __construct() {
           $lastID=DB::table('users')->count();
           
         
           Config::set('last_user_id',$lastID);

            }



   protected function submit_user(Request $request)
   {
       $this->validate($request, [
      'Fname'    => 'required',
      'Lname'    => 'required',
      'email'    => 'required|email|unique:users',
      'password'  => 'required|confirmed'
     ]);


     $fname    = $request->input('Fname');
     $lname    = $request->input('Lname');
     $email    = $request->input('email');
     $password = $request->input('password');

      $initial_FS = get_avatar_name($fname,$lname);
      
      
      $avatar = IAvatar::random($initial_FS);

      $i = Config::get('last_user_id');
      $img_name = 'user'.++$i.'.png';
      $avatar->save('public::generated_avaters/user'.$i.'.png');
     
     // dd($img_name);

       // $user =  DB::table('users')->insert(['Fname' => $fname, 'Lname' => $lname,'avatar'=>$img_name,'email' =>  $email ,'password'=>$password,'created_at' => date("Y-m-d H:i:s")]);

$user = new User();
$user->Fname = $fname;
$user->Lname = $lname;
$user->email = $email ;
$user->password = $password;

$user->avatar = $img_name;
$user->save();



       // Login and "remember" the given user...
      Auth::login($user,true);

        return redirect('/HomePage');
   } 

















}
