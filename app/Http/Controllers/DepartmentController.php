<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function create() {
        return view('admin.department.create');  
    }
    public function store(Request $request,Department $department){
        $request->validate([
            'name'=>'required|unique:departments,name,except,id'
        ]);
        $department->create($request->except('_token'));
        return redirect()->back();
    }
    public function index() {
        $departments = Department::get();
        return view('admin.department.index',compact('departments'));      
    }
    public function edit(Department $department) {
        return view('admin.department.edit',compact('department'));       
    }
    public function update(Request $request,Department $department) {
        $request->validate([
            'name'=>'required|unique:departments,name,except,id'
        ]);
        $department->update($request->except('_token')); 
        return redirect()->route('department.index');     
    }
    public function delete(Department $department){
        $department->delete();
        return redirect()->back();
    }
}
