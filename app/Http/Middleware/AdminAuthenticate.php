<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $auth = Auth::guard($guard);

         if ( $auth->guest()) {

                return redirect()->guest('login');
         }
         if(! $auth->user()->isAdmin()) {

                return response('Access denied.', 401);

         }
                return $next($request);
    }
}
