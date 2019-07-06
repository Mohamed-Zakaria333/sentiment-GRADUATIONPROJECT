<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class customlogout extends Controller
{



protected function user_logout()
{

if(Auth::user())
{
if(Auth::user()->isAdmin==0)
{
Auth::logout();

return back();
}
}




}
//========================================================
//========================================================
//========================================================
//========================================================
protected function admin_logout()
{

if(Session::get('active_admin')[0]==1)
{	
Session::put('active_admin',[0,'user1.png','random','admin']);

// if(Auth::user()->isAdmin==1)
// {
 // Auth::logout();
return redirect('/Admin_Login');
// }
}





}

}
