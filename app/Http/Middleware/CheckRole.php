<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if (isset(auth()->user()->role)) {
            $role = auth()->user()->role;
            if ($role == 0) {
                return $next($request);
            }
            else{
                return redirect()->route('khongphaiadmin');
            }
        }
        else{
            return redirect()->route('khongphaiadmin');
        } 
        
    }
}
