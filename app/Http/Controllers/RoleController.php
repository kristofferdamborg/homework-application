<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::create($request->except(['permission', '_token']));

        if($request->permission)
        foreach ($request->permission as $key => $value)
        {
            $role->attachPermission($value);
        }

        return redirect()->route('role.index');
    }
   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);

        $permissions = Permission::all();

        $role_permissions = $role->perms()->pluck('id', 'id')->toArray();

        return view('admin.role.edit', compact(['role', 'role_permissions', 'permissions']));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        DB::table('permission_role')->where('role_id', $id)->delete();

        if($request->permission)
        {
            foreach ($request->permission as $key => $value)
            {
                $role->attachPermission($value);
            }
        }

        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
        DB::table('roles')->where('id', $id)->delete();

        return redirect()->route('role.index');
    }
}
