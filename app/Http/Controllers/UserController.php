<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
use App\User;
use App\School;
use Auth;

class UserController extends Controller
{
    public function index()
    {   
        $user = Auth::user();

        if($user->hasRole('admin'))
        {
            $users = User::all();

            return view('admin.user.index', compact('users'));
        }
        else 
        {
            $users = User::whereHas('roles', function($q) {
                $q->where('name', 'teacher');
                    })->get();
            
            return view('school-admin.teacher.index', compact('users'));
        }
    }

    public function create()
    {
        $user = Auth::user();

        if($user->hasRole('admin'))
        {
            $schools = School::all();

            $roles = Role::all();

            return view('admin.user.create', compact(['schools', 'roles']));
        }
        else
        {
            $user->school;

            return view('school-admin.teacher.create', compact('user'));
        }
    }

    public function store(Request $request)
    {
        $userCheck = Auth::user();

        if($userCheck->hasRole('admin'))
        {
            $user = User::create($request->all());

            $user->school_id = $request->school_id;

            $user->password = bcrypt($request->password);

            $user->attachRole(Role::find($request->role)->first());
            
            $user->save(); 
            
            return redirect()->route('user.index');
        }
        else
        {   
            $school_id = Auth::user()->school_id;

            $user = User::create($request->all());

            $user->school_id = $school_id;

            $user->attachRole(Role::where('name', 'teacher')->first());

            $user->save();

            return redirect()->route('user.index');
        }
    }

    public function show($id)
    {
        //
    }

   public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        User::findOrFail($id);

        User::destroy($id);

        return redirect()->route('user.index');
    }
}
