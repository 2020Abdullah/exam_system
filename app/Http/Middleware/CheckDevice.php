<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDevice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $IP = $request->ip();
        if($IP == auth('student')->user()->IPAddress){
            return $next($request);
        }
        else {
            $data['title'] = '422';
            $data['NotAllowed'] = 'غير مسموح لك بإستخدام هذا البرنامج !';
           return response()->view('NotDevice', $data, 422);
        }
    }
}
