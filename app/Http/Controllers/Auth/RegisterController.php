<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
use App\School;
use Illuminate\Http\Request;
use App\SchoolClass;
use App\Session;

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

    // Fetches all schools to register view
    public function index()
    {
        $schools = School::all();

        return view('auth.register', compact('schools'));
    }

    // Validates user input
    protected function validator(array $data)
    {
        if ( empty($data['google_id']))
        {
            return Validator::make($data, [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
            ]);
        }
        else 
        {
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'google_id' => 'string|max:255',
                'avatar' => 'string|max:255',
            ]);
        }
    }

    // Creates new user (bcrypt = hashing of the password)
    protected function create(array $data)
    {
        if ( empty($data['google_id']))
        {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
        }
        else
        {
             $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'google_id' => $data['google_id'],
                'avatar' => $data['avatar'],
            ]);
        }

        $user->school_id = $data['school_id'];

        $user->school_class_id = $data['class_id'];

        $user->save();

        $session = Session::create();

        $session->user_id = $user->id;

        $session->created_at = NULL;

        $session->save();

        if ($user->email == 'kristofferdamborg@gmail.com')
        {
            $user->attachRole(Role::where('name', 'admin')->first());
        }
        elseif ($user->email == 'alexmuderspachnielsen@gmail.com')
        {
            $user->attachRole(Role::where('name', 'admin')->first());
        }
        else
        {
            $user->attachRole(Role::where('name', 'elev')->first());
        }

        return $user;
    }

    public function findClass(Request $request)
    {
        $data = SchoolClass::select('name','id')->where('school_id', $request->id)->get();

        return response()->json($data);
	}

}
