<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MustLogin
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
        $session_key=$request->header('sessionKey');
        if($session_key==null){
            return redirect('dashboard')->with('msg', 'NEED_SECESSION_KEY');
        }
        return $next($request);
    }
}
