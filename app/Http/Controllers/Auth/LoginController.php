<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;

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

        // Uses the function underneath (findOrCreateUser) and creates $authUser object
        $authUser = $this->findOrCreateUser($user);

        // Sets the user as authenticated (logged in)
        Auth::login($authUser, true);

        // Redirects the user to home page, after being logged in
        return redirect('/home');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
    }

    // Checks if the user exists, by looking for google_id
    // Creates a new user, if an existing is not found
    public function findOrCreateUser($googleUser)
    {
        $authUser = User::where('google_id', $googleUser->id)->first();

        if ($authUser) {
            return $authUser;
        }

        return User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_id' => $googleUser->id,
            'avatar' => $googleUser->avatar
        ]);
    }
}
