<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\User;
use Session;
class IsAdmin
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
        $adminid = Session::get('curr');
        // dd($adminid);
         if($adminid != null)
         {
          return $next($request);
         }
         else
         {
          return redirect('/');
         }
  
      }
}
