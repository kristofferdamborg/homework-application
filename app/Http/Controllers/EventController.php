<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\School;
use App\SchoolClass;
use App\Event;

class EventController extends Controller
{
    public function index()
    {
    	if (Auth::check() && Auth::user()->hasRole('pupil'))
		{
			$class_id = Auth::user()->school_class_id;
       	    $class = SchoolClass::find($class_id);

        	return view('event.stuIndex', compact('class'));
	    	//return redirect()->route('event.stuIndex');
		}
		else
		{   
		$school_id = Auth::user()->school_id;
		$school = School::find($school_id);
		$arr = array();
		foreach ($school->events as $event) 
		{
			$arr[$event->school_class_id] = SchoolClass::find($event->school_class_id)->name;
		}
			return view('event.index', compact('school','arr'));
		}
    }

    /*public function stuIndex()
    {   
    	$class_id = Auth::user()->school_class_id;
        $class = SchoolClass::find($class_id);

        return view('event.stuIndex', compact('class'));
    }*/


    public function create()
    {
    	if (Auth::check() && Auth::user()->hasRole('pupil'))
		{
	         return redirect()->route('event.stuIndex');
		}
		else
		{  
			$school_id = Auth::user()->school_id;
			$school = School::find($school_id);
			$school->classes;

        	return view('event.create', compact('school'));
    	}
    }

    public function store(Request $request)
    {	
    	Event::create($request->all());

        return redirect()->route('event.index');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        $className = SchoolClass::find($event->school_class_id)->name;

        return view('event.show', compact('event','className'));
    }

    public function edit($id)
    {
		if (Auth::check() && Auth::user()->hasRole('pupil'))
		{
			return redirect()->route('event.stuIndex');
		}
		else
		{  
			$event = Event::findOrFail($id);
			$school_id = Auth::user()->school_id;
			$school = School::find($school_id);
			$school->classes;

			return view('event.edit', compact('event','school'));
		}
	}

    public function update(Request $request, $id)
    {
    	$event = Event::findOrFail($id);
        	$event->name = $request->name;
        	$event->type = $request->type;
        	$event->description = $request->description;
        	$event->school_class_id = $request->school_class_id;
        	$event->school_id = $request->school_id;
        	$event->start_time = $request->start_time;
        	$event->end_time = $request->end_time;

        	$event->save();

        	return redirect()->route('event.index');

    }

    public function destroy($id)
    {
    	if (Auth::check() && Auth::user()->hasRole('pupil'))
		{
	    	return redirect()->route('event.stuIndex');
		}
		else
		{  
    		Event::findOrFail($id);
        	Event::destroy($id);

        	return redirect()->route('event.index');
        }
    }
}
