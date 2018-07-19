<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
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
                return back() -> with('error','没有权限');
            }
         
        }else{
            return redirect('/home/login')-> with('error','请先登录');   
        }
        
    }
}
