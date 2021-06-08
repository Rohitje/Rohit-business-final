<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Controller
{
    public function ChangePassword()
    {
        return view('admin.body.change_password');
    }

    public function UpdatePassword(Request $request)
    {
        $validateData = $request -> validate
        ([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user() -> password;
        if(Hash::check($request -> oldpassword, $hashedPassword))
        {
            $user = User::find(Auth::id());
            $user -> password = Hash::make($request -> password);
            $user -> save();
            Auth::logout();

            $notification = array
            (
                'message' => 'Passwoord successvol geupdatet!',
                'alert-type' => 'success'
            );
            return Redirect() -> route('login') -> with($notification);
        }
        else
        {
            $notification = array
            (
                'message' => 'Huidige passwoord is ongeldig!',
                'alert-type' => 'error'
            );
            return Redirect() -> back() -> with($notification);
        }
    }
}
