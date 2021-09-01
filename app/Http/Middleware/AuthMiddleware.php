<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Closure;

class AuthMiddleware
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
        if (Auth::check()) {
            return $next($request);
        }else{
            $notification = array(
                'message' => 'Vui lòng đăng nhập',
                'alert-type' => 'error'
            );
        return Redirect::to('/login')->with('mess','Vui lòng đăng nhập!!')->with($notification);
        }
        
    }
}
