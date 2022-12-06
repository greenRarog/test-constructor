<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(Request $request, $user_id) 
    {
        $user = User::find($user_id);
        
        return view('user.profile', [
            'user' => $user,
        ]);
    }
    
    public function myProfile() {
       if (Auth::check()) {
            $id = Auth::User()->id;
            return redirect('/profile/' . $id);
        } else {
            return redirect('/login');
    }
    }
}
