<?php

namespace App\Http\Middleware\Frontend;

use Closure;
use Session;
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
        if (Session::get('custromer_id')) {
            return redirect('/shipping');
        }
        else{
        return $next($request);
        }
    }
}
