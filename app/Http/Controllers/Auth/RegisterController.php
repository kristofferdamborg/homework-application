<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // Scaffolded registration methods
    use RegistersUsers;

    // Redirect after registration
    protected $redirectTo = '/home';

    // Allows guests (non-authenticated users) to access functions in this controller
    public function __construct()
    {
        $this->middleware('guest');
    }

    // Validates user input
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'google_id' => 'string|max:255',
            'avatar' => 'string|max:255',
        ]);
    }

    // Creates new user (bcrypt = hashing of the password)
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'google_id' => $data['google_id'],
            'avatar' => $data['avatar'],
            'password' => bcrypt($data['password']),
        ]);

        $user->attachRole(Role::where('name', 'admin')->first());

        return $user;
    }
}
