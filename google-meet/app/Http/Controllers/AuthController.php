<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    // Redirect to Google for authentication
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle the callback from Google
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        // dd($user->user);
        // Authenticate the user in your application (you may need to implement your own logic)
        Auth::login($user);
        
        return redirect('/home'); // Redirect to your application's home page
    }
}
