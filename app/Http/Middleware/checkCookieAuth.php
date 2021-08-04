<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;

class checkCookieAuth
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
        if ($request->session()->get('token') == "") {
            session()->flash('login', 'Vui lòng đăng nhập lại');
            if ($request->wantsJson()) {
                return response()->json(['code' => 401]);
            }
            return redirect()->route('auth.index');
        }
        return $next($request);
    }
}
