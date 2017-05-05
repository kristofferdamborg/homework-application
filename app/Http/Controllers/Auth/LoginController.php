<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;
use App\Role;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // Scaffolded authentication methods
    use AuthenticatesUsers;

    // Redirect after user login
    protected $redirectTo = '/home';
    
    // Allows guests (non-authenticated users) to access functions (not logout) in this controller
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Redirects to Google for login
    // (Uses the socialite package)
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handles the callback from Google
    // (Uses the socialite package)
   public function handleProviderCallback()
    {
        try 
        {
            $user = Socialite::driver('google')->user();
        } 
        catch (Exception $e) 
        {
            return redirect('auth/google');
        }

        $authUser = User::where('google_id', $user->id)->first();

        if($authUser) //If the user is found
        {
            Auth::login($authUser, true); //Log in the user
            return redirect('/home');
        }
        else //If user is not found, redirect to the register page
        {
            return redirect('/register')->with('user', $user);
        }
    }
}