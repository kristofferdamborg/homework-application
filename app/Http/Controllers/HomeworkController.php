<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;
use App\SchoolClass;
use Auth;
use App\Homework;
use App\Subject;

class HomeworkController extends Controller
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
        Homework::create($request->all());
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
        $homework = Homework::findOrFail($id);
        $homework->save();

        return redirect()->route('homework.index');
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
