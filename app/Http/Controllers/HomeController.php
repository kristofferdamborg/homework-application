<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

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
       return view('home');
    }
}
