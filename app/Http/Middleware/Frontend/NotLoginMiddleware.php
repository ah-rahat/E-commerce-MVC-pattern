<?php

namespace App\Http\Middleware\Frontend;

use Closure;
use Session;

class NotLoginMiddleware
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
        if (!(Session::get('custromer_id'))) {
            return redirect('/checkout/user');
        }
        else{
        return $next($request);
        }
    }
}
