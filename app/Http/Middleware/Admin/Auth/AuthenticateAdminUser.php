<?php

namespace App\Http\Middleware\Admin\Auth;

use Closure;

class AuthenticateAdminUser
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
        if (auth()->user()) {
            if (auth()->user()->hasAdminRole()) {
                return $next($request);
            } else {
                //TODO Redirect a una vista "sin permisos"
                return redirect()->route('main'); 
            }
            
        }

        return redirect()->route('admin.login');
    }
}
