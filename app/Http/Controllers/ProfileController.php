<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function Profile()
    {
        if(Auth::user())
        {
            $user = User::find(Auth::user() -> id);
            if($user)
            {
                return view('admin.body.update_profile', compact('user'));
            }
        }
    }

    public function UpdateProfile(Request $request)
    {
        $user = User::find(Auth::user() ->id);
        if($user)
        {
            $user -> name = $request['name'];
            $user -> email = $request['email'];

            $user -> save();

            $notification = array
            (
                'message' => 'User profile successfully updated!',
                'alert-type' => 'success'
            );
            return Redirect() -> route('dashboard') -> with($notification);
        }
        else
        {
            return Redirect() -> back();
        }
    }
}
