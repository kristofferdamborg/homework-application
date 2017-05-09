<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\School;
use App\SchoolClass;
use App\Subject;
use DB;

class SchoolClassController extends Controller
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

        if (! empty($school->classes))
        {
            $school->classes;
        }

        return view('school-admin.class.index', compact('school'));
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
        
        return view('school-admin.class.create', compact('school'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $class = SchoolClass::create($request->all());

        $school_id = Auth::user()->school_id;

        $class->school_id = $school_id;

        $class->save();

        return redirect()->route('class.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = SchoolClass::findOrFail($id);

        $class->users;

        return view('school-admin.class.show', compact('class'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = SchoolClass::findOrFail($id);

        return view('school-admin.class.edit', compact('class'));
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
        $class = SchoolClass::findOrFail($id);
        $class->name = $request->name;
        $class->save();

        return redirect()->route('class.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SchoolClass::findOrFail($id);

        SchoolClass::destroy($id);

        

        return redirect()->route('class.index');
    }
}
