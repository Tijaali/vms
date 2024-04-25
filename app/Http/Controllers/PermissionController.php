<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function create() {
        return view('admin.permission.create');  
    }
    public function store(Request $request,Permission $permission){
        $request->validate([
            'name'=>'required|unique:permissions,name,except,id'
        ]);
        $permission->create($request->except('_token'));
        return redirect()->back();
    }
    public function index() {
        $permissions = Permission::get();
        return view('admin.permission.index',compact('permissions'));      
    }
    public function edit(Permission $permission) {
        return view('admin.permission.edit',compact('permission'));       
    }
    public function update(Request $request,Permission $permission) {
        $request->validate([
            'name'=>'required|unique:permissions,name,except,id'
        ]);
        $permission->update($request->except('_token')); 
        return redirect()->route('permission.index');     
    }
    public function delete(Permission $permission){
        $permission->delete();
        return redirect()->back();
    }
}
