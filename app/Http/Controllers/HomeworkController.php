<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;
use App\SchoolClass;
use Auth;
use App\Homework;
use App\Subject;
use Alerts;

class HomeworkController extends Controller
{
    
    public function index()
    {
        $school_id = Auth::user()->school_id;
        $school = School::find($school_id);
        $school->classes;

        return view('homework.index', compact('school'));
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
        Homework::create($request->all());

        return redirect('/homework')->with('success', 'Lektien blev oprettet!');
    }
   
    public function show($id)
    {   
        $schoolclass = SchoolClass::find($id);
        $schoolclass->homeworks;
        $arr = array();

        foreach ($schoolclass->homeworks as $homework) 
        {
            $arr[$homework->subject_id] = Subject::find($homework->subject_id)->name;
        }

        return view('homework.show', compact('schoolclass','arr'));
    } 
   
    public function edit($id)
    {
        $homework = Homework::findOrFail($id);
        $school_id = Auth::user()->school_id;
        $school = School::find($school_id);

        $school->classes;
        $school->subjects;

        return view('homework.edit', compact('homework','school'));
    }
    
    public function update(Request $request, $id)
    {
        $homework = Homework::findOrFail($id);
        $homework->save();

        return redirect()->route('homework.index');
    }
   
    public function destroy($id)
    {
        Homework::findOrFail($id);
        Homework::destroy($id);

        return redirect()->route('homework.index');
    }
}