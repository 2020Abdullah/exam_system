<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth('student')->user()->is_active === 1){
            return $next($request);
        }
        else {
            $data['title'] = '422';
            $data['NotAllowed'] = 'حسابك معطل برجاء الإتصال بالدعم للمساعدة!';
            return response()->view('NotDevice', $data, 422);
        }
    }
}
