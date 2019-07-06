<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Closure;

class is_admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {  

  


          //dd($next);
      if (Session::get('active_admin')[0]==1)
        {
        // $admins = DB::table('users')->where('isAdmin',1)->get();
        // foreach($admins as $admin)
        // {
        //     if($request->user()->email===$admin->email)
        //       $admin_mail=$admin->email;
        //       // dd($admin_mail);
        // }
           // dd('yes there is one registered');
           // if(Auth::user()->isAdmin == 1&&(Auth::user()->email===$admin_mail))
           // {
              
           //   // dd(897879+897978);

           // }
           // else
           // {
           //     // dd('no one registered');
           //    return redirect('/Admin_Login'); 

           // }
            
        }
         else 
        {
          return redirect('/Admin_Login');      
                
        }
        return $next($request);
    }
}
