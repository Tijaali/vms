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
        
        $department->create($request->except('_token'));
        return redirect()->back()->with('alert-success','Department has been created successfully!');
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
        return redirect()->route('department.index')->with('alert-success','Department has been updated successfully!');     
    }
    public function delete(Department $department){
        $department->delete();
        return redirect()->back()->with('alert-success','Department has been deleted successfully!');
    }
}
