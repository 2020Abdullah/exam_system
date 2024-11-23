<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        if(auth('web')->check()){
            $user = auth('web')->user();
        }
        else {
            $user = auth('student')->user();
        }
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user_id = '';
        if(auth('web')->check()){
            $user_id = auth('web')->user()->id;
            $user = User::findOrFail($user_id);
            $user->name = $request->name;
            $user->email = $request->email;
            if($request->password !== null){
                $user->password = Hash::make($request->password);
            }

            if($request->hasFile('profile_img')){
                // delete old image 
                $old_img = asset($user->profile_img);
                if(file_exists($old_img)){
                    unlink($old_img);
                }
                // add new image
                $generateFile = time() . '.' . $request->profile_img->extension();
                $folder = public_path('images/users');
                $request->profile_img->move($folder, $generateFile);
                $imagePath = 'images/users/' . $generateFile;
                $user->profile_img = $imagePath;
            }
            $user->save();
        }
        else {
            $user_id = auth('student')->user()->id;
            $user = Student::findOrFail($user_id);
            $user->name = $request->name;
            $user->email = $request->email;
            if($request->password !== null){
                $user->password = Hash::make($request->password);
            }

            if($request->hasFile('profile_img')){
                // delete old image 
                $old_img = asset($user->profile_img);
                if(file_exists($old_img)){
                    unlink($old_img);
                }
                // add new image
                $generateFile = time() . '.' . $request->profile_img->extension();
                $folder = public_path('images/students');
                $request->profile_img->move($folder, $generateFile);
                $imagePath = 'images/students/' . $generateFile;
                $user->profile_img = $imagePath;
            }
            $user->save();
        }
        return back()->with('success', 'تم تعديل بيانات ملفك الشخصي بنجاح');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
