<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Session;
use Auth;
use App\User;
use Alert;
use Carbon\Carbon;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Auth::user()->sessions;

        return view('sessions.index', compact('sessions'));
    }

    public function create()
    {
        $school_id = Auth::user()->school_id;

        $school = School::find($school_id);

        $school->classes;

        $school->subjects;

        return view('homework.create', compact('school'));
    }

    public function store(Request $request)
    {
        $dummy_session = Auth::user()->sessions()->where('created_at', NULL)->first();

        if($dummy_session)
        {
            Session::destroy($dummy_session->id);
        }
        
        $session = Session::create();

        $user_id = Auth::user()->id;

        $session->user_id = $user_id;

        $session->created_at = Carbon::now();

        $session->save();
        
        return redirect('/')->with('success', 'Du er nu tjekket ind!');
    }

    public function show($id)
    {   
        
    } 

    public function edit($id)
    {
    
    }

    public function update(Request $request, $id)
    {
        $session = Session::findOrFail($id);
        $session->ended_at = Carbon::now();
        $session->description = $request->description;
        $session->save();

        return redirect('/')->with('success', 'Du er nu tjekket ud!');
    }

    public function destroy($id)
    {
    
    }
}
