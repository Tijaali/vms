<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Rules\CnicFormat;
use Barryvdh\DomPDF\Facade\Pdf ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
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

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $filePath = 'uploads/visitors/' . $filename;

            // Store the file
            Storage::disk('public')->put($filePath, file_get_contents($file));

            $input["image"] = "$filePath";
        }

        // if($request->hasfile('image'))
        // {
        //     $file = $request->file('image');
        //     $extenstion = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extenstion;
        //     $destinationPath = '/uploads/students';
        //     $file->move('storage/uploads/students/', $filename);
        //     $input["image"] = "$destinationPath/$filename";
        // }

        Visitor::create($input);
        return redirect()->route('visitor.index')->with('alert-success','Visitor has been added successfully');
    }
    public function index(){
        return view('admin.visitors.index');

    }
    public function show(Request $request, Visitor $visitor) {
        return view('admin.visitors.show', compact('visitor'));
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

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($visitor->image);
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $filePath = 'uploads/visitors/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $input["image"] = "$filePath";
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
    public function approve(Request $request, Visitor $visitor) {
        $visitor->status='approved';
        $visitor->save();
        return redirect()->back();
    }
    public function reject(Request $request, Visitor $visitor) {
        $visitor->status='rejected';
        $visitor->save();
        return redirect()->back();
    }
    public function createPdf()
{
    $visitors = Visitor::all();
    $pdf = Pdf::loadView('admin.visitors.pdf', compact('visitors'));
    return $pdf->download('visitors.pdf'); // Download the generated PDF
}
}
