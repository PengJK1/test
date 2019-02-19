<?php

namespace app\http\middleware;

use think\Session;

class Login
{
    public function handle($request, \Closure $next)
    {
        if(!Session('user')){
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
