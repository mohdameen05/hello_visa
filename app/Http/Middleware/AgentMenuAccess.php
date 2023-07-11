<?php

namespace App\Http\Middleware;

use Closure;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Session ;

class AgentMenuAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {     
               
          if(isset(Session::get('agent_info')['id'] )){
                return $next($request);
            } else {
                return redirect('/login');
          }
       
    }
    
}
