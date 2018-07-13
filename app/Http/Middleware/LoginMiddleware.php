<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        if($request->session()->has('user_login')){
            if(session('user_login')['superuser'] == '博主'){
                return $next($request);
            }else{
                return redirect('/');
            }
            
        }else{
            return redirect('/admin/login/index');
        }
    }
}
