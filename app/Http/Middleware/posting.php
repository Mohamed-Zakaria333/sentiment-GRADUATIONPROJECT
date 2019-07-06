<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Config;
use Session;

class posting
{
    //public  $status;

        function __construct()
         {
           Session::put('status',0);
           //Session::get('status')
         //Config::set('status',0);
       //$this.$status = Config::get('status',0);
       //dd($status);
         
        }
    public function handle($request, Closure $next)
    {

       //Config::set('status');
             
          if ( $request->user() )  {
            Session::put('status',1);
           // dd($request->user());
        }
         else 

        {
                  
               // dd(Config::get('status'));
               //return redirect('/login_user');
               return back()->with('status',Session::get('status'));
           
        }

        return $next($request);
    }
}
