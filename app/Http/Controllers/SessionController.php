<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
<<<<<<< HEAD:app/Http/Controllers/SessionController.php
use App\Session;
use Auth;
use App\User;
use Alert;
use Carbon\Carbon;
=======
use App\School;
use App\SchoolClass;
use Auth;
use App\Homework;
use App\Subject;
>>>>>>> a2b17f4d6abd7122b76ab6b5f71dcbf566f3b585:app/Http/Controllers/HomeworkController.php

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school_id = Auth::user()->school_id;

        $school = School::find($school_id);

        $school->classes;

        return view('homework.index', compact('school'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school_id = Auth::user()->school_id;

        $school = School::find($school_id);

        $school->classes;

        $school->subjects;

        return view('homework.create', compact('school'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD:app/Http/Controllers/SessionController.php
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

=======
        Homework::create($request->all());
>>>>>>> a2b17f4d6abd7122b76ab6b5f71dcbf566f3b585:app/Http/Controllers/HomeworkController.php
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $schoolclass = SchoolClass::find($id);
        $schoolclass->homeworks;
        $arr = array();

        foreach ($schoolclass->homeworks as $homework) {
            $arr[$homework->subject_id] = Subject::find($homework->subject_id)->name;
        }

        return view('homework.show', compact('schoolclass','arr'));
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $homework = Homework::findOrFail($id);

        $school_id = Auth::user()->school_id;

        $school = School::find($school_id);

        $school->classes;

        $school->subjects;

        return view('homework.edit', compact('homework','school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
<<<<<<< HEAD:app/Http/Controllers/SessionController.php
        $session = Session::findOrFail($id);
        $session->ended_at = Carbon::now();
        $session->description = $request->description;
        $session->save();

        return redirect('/')->with('warning', 'Du er nu tjekket ud!');
=======
        $homework = Homework::findOrFail($id);
        $homework->save();

        return redirect()->route('homework.index');
>>>>>>> a2b17f4d6abd7122b76ab6b5f71dcbf566f3b585:app/Http/Controllers/HomeworkController.php
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Homework::findOrFail($id);

        Homework::destroy($id);

        return redirect()->route('homework.index');
    }
}
