<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{
    public function checkGuard($request)
    {
        if ($request->user == 'student') {
            $guardName = 'student';
        } 
        else {
            $guardName = 'web';
        }
        return $guardName;
    }

    public function redirectToPage($request)
    {
        if ($request->user == 'student') {
            return redirect()->intended(RouteServiceProvider::STUDENTHOME);
        } 
        else {
            return redirect()->intended(RouteServiceProvider::ADMINHOME);
        }
    }
}
