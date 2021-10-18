<?php

namespace App\Http\Middleware\Frontend;

use Closure;
use Cart;
use Session;

class checkoutMiddleware
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
            if (!(Cart::getSubTotal())){
                return redirect('/shop');
            }
            else{
                return redirect('/shipping');
            }
        }
        else{
        return $next($request);
        }
    }
}
