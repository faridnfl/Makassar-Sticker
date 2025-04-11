<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClearOrderSession
{
    public function handle(Request $request, Closure $next)
    {
        $allowedRoutes = ['order.form', 'order.preview'];

        if (!in_array(optional($request->route())->getName(), $allowedRoutes)) {
            session()->forget('order_data');
        }

        return $next($request);
    }
}
