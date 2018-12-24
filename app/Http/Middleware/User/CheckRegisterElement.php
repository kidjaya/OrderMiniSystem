<?php

namespace App\Http\Middleware\User;

use Closure;

class CheckRegisterElement
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
         return redirect('/');

    }
}
