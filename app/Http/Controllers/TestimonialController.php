<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    public function create(){
        return view('admin.testimonial.create');
    }
    public function store(Request $request, Testimonial $testimonial) {
        
        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $filePath = 'uploads/testimonials/' . $filename;

            // Store the file
            Storage::disk('public')->put($filePath, file_get_contents($file));

            $input["image"] = "$filePath";
        }

        
         $testimonial->create($input);
            
        return redirect()->back()->with('alert-success','Testimonial has been added successfully');
    }
    public function index(){
        return view('admin.testimonial.index');

    }
    public function show(Request $request, Testimonial $testimonial) {
        return view('admin.testimonial.show', compact('testimonial'));
    }
    public function ajax(Request $request) {
        $query = Testimonial::query();
        return DataTables::eloquent($query)->toJson();

    }
    public function edit(Request $request,Testimonial $testimonial) {
        return view('admin.testimonial.edit',compact('testimonial'));
    }
    public function update(Request $request, Testimonial $testimonial) {
        $input = $request->all();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($testimonial->image);
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $filePath = 'uploads/testimonials/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $input["image"] = "$filePath";
        }
        else
        {
            unset($input['image']);
        }
    
        $testimonial->update($input);
        return redirect()->route('testimonial.index')->with('alert-success','Testimonial has been updated successfully');
    }
    public function delete(Request $request,Testimonial $testimonial){
        $testimonial->delete();
        return redirect()->back()->with('alert-success','Testimonial has been deleted successfully');
    }
}
