<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Rules\CnicFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class VisitorController extends Controller
{
    public function create()  {
        return view('admin.visitors.create');
    }
    public function store(Request $request, Visitor $visitor) {
        $request->validate(
            [
                'cnic_number' =>'regex:/^[0-9]{5}-[0-9]{7}-[0-9]$/|unique:visitors,cnic_number',
            ],

        );
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Visitor::create($input);
        return redirect()->route('visitor.index')->with('alert-success','Visitor has been added successfully');
    }
    public function index(){
        return view('admin.visitors.index');

    }
    public function show(Visitor $visitor){
        return view('admin.visitors.show',compact('visitor'));
    }
    public function ajax(Request $request) {
        $query = Visitor::query();
        return DataTables::eloquent($query)->addColumn('category',function(Visitor $visitor){
           $category = $visitor->category->name;
            return $category;
        })->addColumn('depart',function(Visitor $visitor){
            return $visitor->depart->name;
        })->toJson();

    }
    public function edit(Request $request,Visitor $visitor) {
        return view('admin.visitors.edit',compact('visitor'));
    }
    public function update(Request $request, Visitor $visitor) {
        $input = $request->all();
        if($image= $request->file("image")){
            $destinationPath = 'images/';
            $profileImage = date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath,$profileImage);
            $input['image'] = "$profileImage";
        }
        else
        {
            unset($input['image']);
        }
        $visitor->update($input);
        return redirect()->route('visitor.index')->with('alert-success','Visitor has been updated successfully');
    }
    public function delete(Request $request,Visitor $visitor){
        $visitor->delete();
        return redirect()->back()->with('alert-success','Visitor has been deleted successfully');
    }
}
