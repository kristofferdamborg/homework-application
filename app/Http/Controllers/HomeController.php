<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Session;
use Carbon\Carbon;
use App\Subject;
use App\Homework;
use App\Events;

class HomeController extends Controller
{
    // Checks if the user is authenticated, by applying middleware
    // If the user is not authenticated, they will get redirected to login page
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Returns the home view (home.blade.php found in resources/views/home.blade.php)
    public function index()
    {  
        $user = Auth::user();

        $user->school;
        $user->school_class;
        $user->school_class->homeworks;
        $user->school_class->events;

        $narr = array();
        foreach ($user->school_class->homeworks as $homework) {
            $narr[$homework->subject_id] = Subject::find($homework->subject_id)->name;
        }

        if (Auth::check() && Auth::user()->hasRole('admin'))
        {
            return view('home', compact('user'));
        }
        elseif (Auth::check() && Auth::user()->hasRole('school-admin'))
        {
            return view('home', compact('user'));
        }
        elseif (Auth::check() && Auth::user()->hasRole('teacher'))
        {
            return view('dashboard', compact('user','narr'));
        }
        elseif (Auth::check() && Auth::user()->hasRole('pupil'))
        {
            $session = Auth::user()->sessions()->latest()->first();
            
            return view('dashboard', compact('user', 'session','narr'));
        }
        else 
        {
            return view('welcome', compact('user'));
        }
    }
}
