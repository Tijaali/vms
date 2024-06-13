<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller

{
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['delete']]);
    }
    public function create(){
        $permissions = Permission::get();
        return view('admin.roles.create',compact('permissions'));  
    }
    public function store(Request $request){
        $role=Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission_id'));
        return redirect()->back()->with('alert-success','Role has been created successfully');;
    }
    public function index(){
        $roles = Role::get();
        return view('admin.roles.index',compact('roles'));
    }
    public function show(Role $role){
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$role->id)
            ->get();
            // dd($rolePermissions);
    
        return view('admin.roles.show',compact('role','rolePermissions'));
    }
    public function edit(Role $role) {
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$role->id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    
        return view("admin.roles.edit",compact('role','permissions','rolePermissions'));
        
    }
    public function update(Request $request,Role $role){
        $role->update($request->except("_token"));
        $role->syncPermissions($request->input('permission_id'));
        return redirect()->route('role.index')->with('alert-success','Role has been updated successfully');;
    }
    public function delete(Role $role) {
        $role->delete();
        return redirect()->back()->with('alert-success','Role has been deleted successfully');;
        
    }
}
