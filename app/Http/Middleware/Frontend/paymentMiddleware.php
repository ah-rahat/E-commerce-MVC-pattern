<?php

namespace App\Http\Middleware\Frontend;

use Closure;
use Cart;

class paymentMiddleware
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
        if (!(Cart::getSubTotal())){
            return redirect('/shop');
        }
        else{
        return $next($request);
        }
    }
}
