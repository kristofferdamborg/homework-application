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
    
    public function index()
    {
        $school_id = Auth::user()->school_id;
        $school = School::find($school_id);
        $school->classes;

        if (Auth::check() && Auth::user()->hasRole('school-admin'))
        {
            return view('homework.index', compact('school'));
        }
        elseif (Auth::check() && Auth::user()->hasRole('teacher'))
        {
            return view('homework.index', compact('school'));
        }
        elseif (Auth::check() && Auth::user()->hasRole('pupil'))
        {  
            return redirect()->route('homework.show', Auth::user()->school_class_id);
        }
        else 
        {
            return "how did you do this, sigh... contact support";
        }
    }
    
    public function create()
    {
        if (Auth::check() && Auth::user()->hasRole('pupil'))
        {
            return redirect()->route('homework.index');
        }else 
        {
        $school_id = Auth::user()->school_id;
        $school = School::find($school_id);
        $school->classes;
        $school->subjects;
        return view('homework.create', compact('school'));
        }

    }
   
    public function store(Request $request)
    {
        Homework::create($request->all());
        return redirect()->route('homework.index');
    }
   
    public function show($id)
    {   $schoolclass = SchoolClass::find($id);
        $schoolclass->homeworks;
        $arr = array();
        foreach ($schoolclass->homeworks as $homework) {
            $arr[$homework->subject_id] = Subject::find($homework->subject_id)->name;
        }
        return view('homework.show', compact('schoolclass','arr'));
    } 
    
    public function edit($id)
    {
        if (Auth::check() && Auth::user()->hasRole('pupil'))
        {
            return redirect()->route('homework.index');
        }
        else
        {
            $homework = Homework::findOrFail($id);
            $school_id = Auth::user()->school_id;
            $school = School::find($school_id);
            $school->classes;
            $school->subjects;

            return view('homework.edit', compact('homework','school'));
        }
    }
    
    public function update(Request $request, $id)
    {
        $homework = Homework::findOrFail($id);
        $homework->title = $request->title;
        $homework->description = $request->description;
        $homework->school_class_id = $request->school_class_id;
        $homework->subject_id = $request->subject_id;
        $homework->started_at = $request->started_at;
        $homework->due_at = $request->due_at;

        $homework->save();

        return redirect()->route('homework.index');
    }
    
    public function destroy($id)
    {
        if (Auth::check() && Auth::user()->hasRole('pupil'))
        {
            return redirect()->route('homework.index');
        }
        else 
        {
        Homework::findOrFail($id);
        Homework::destroy($id);

        return redirect()->route('homework.index');
        }
    }
    
}