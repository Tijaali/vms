<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function create(){
        $permissions = Permission::get();
        return view('admin.roles.create',compact('permissions'));  
    }
    public function store(Request $request, Role $role){
        $role->create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission_id'));
        return redirect()->back();
    }
}
