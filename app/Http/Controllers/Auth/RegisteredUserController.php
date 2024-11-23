<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Http\Traits\AuthTrait;


class RegisteredUserController extends Controller
{
    use AuthTrait;
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if($request->user == 'admin' || $request->user == 'teacher'){

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed'],
            ]);

            $user = User::create([
                'name' => $request->name,
                'role' => $request->user,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            auth('web')->login($user);
        }
        else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'school_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Student::class],
                'password' => ['required', 'confirmed'],
            ]);

            $user = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'city' => $request->city,
                'school_name' => $request->school_name,
            ]);
            auth('student')->login($user);
        }

        event(new Registered($user));

        // redirect user to home

        return $this->redirectToPage($request);

    }
}
