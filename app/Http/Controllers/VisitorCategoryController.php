<?php

namespace App\Http\Controllers;

use App\Models\VisitorCategory;
use Illuminate\Http\Request;

class VisitorCategoryController extends Controller
{
    public function create(VisitorCategory $visitorCategory) {
        return view('admin.categories.create');  
    }
    public function store(Request $request,VisitorCategory $visitorCategory){
        // $request->validate([
        //     'name'=>'required|unique:visitor_catgories,name,except,id',
        // ]);
        $visitorCategory->create($request->except('_token'));
        return redirect()->back();
        
    }

    public function index() {
        $visitorCategory = VisitorCategory::get();
        return view('admin.categories.index',compact('visitorCategory'));
        
    }
    public function edit(VisitorCategory $visitorCategory){
        return view('admin.categories.edit',compact('visitorCategory'));
    }
    public function update(Request $request, VisitorCategory $visitorCategory){
        // $request->validate([
        //     'name'=>'required|unique:visitor_catgories,name,except,id',
        // ]);
        $visitorCategory->update($request->except('_token'));
        return redirect()->route('visitorCategory.index');

    }
    public function delete(VisitorCategory $visitorCategory){
        $visitorCategory->delete();
        return redirect()->back();
    }
}
