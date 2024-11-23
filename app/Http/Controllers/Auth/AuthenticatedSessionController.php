<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Traits\AuthTrait;

class AuthenticatedSessionController extends Controller
{
    use AuthTrait;
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->authenticate();

        // $request->session()->regenerate();

        // login user 

        if ($request->remember == 1) {
            $remember = true;
        } else {
            $remember = false;
        }

        if (Auth::guard($this->checkGuard($request))->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return $this->redirectToPage($request);
        } else {
            return back()->with('faild', 'لا يوجد حساب لدينا بهذا الإسم !');
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if(Auth::guard('student')->check()){
            Auth::guard('student')->logout();
        }
        else {
            Auth::guard('web')->logout();
        }

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }
}
