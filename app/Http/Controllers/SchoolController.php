<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();

        return view('admin.school.index', compact('schools'));
    }

    public function create()
    {
        return view('admin.school.create');
    }

    public function store(Request $request)
    {
        School::create($request->all());

        return redirect()->route('school.index');
    }

    public function show($id)
    {
        $school = School::findOrFail($id);

        $school->users;

        return view('admin.school.show', compact('school'));
    }

    public function edit($id)
    {
        $school = School::findOrFail($id);

        return view('admin.school.edit', compact('school'));
    }

    public function update(Request $request, $id)
    {
        $school = School::findOrFail($id);
        $school->name = $request->name;
        $school->location = $request->location;
        $school->save();

        return redirect()->route('school.index');
    }

    public function destroy($id)
    {
        School::findOrFail($id);

        School::destroy($id);

        return redirect()->route('school.index');
    }
}