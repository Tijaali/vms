<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{
    public function create()  {
        return view('admin.events.create');
    }
    public function store(Request $request, Event $event) {
        
        $input = $request->all();

        if ($request->hasFile('brochure')) {
            $file = $request->file('brochure');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $filePath = 'uploads/events/' . $filename;

            // Store the file
            Storage::disk('public')->put($filePath, file_get_contents($file));

            $input["brochure"] = "$filePath";
        }

        
         $event->create($input);
            
        return redirect()->back()->with('alert-success','Event has been added successfully');
    }
    public function index(){
        return view('admin.events.index');

    }
    public function show(Request $request, Event $event) {
        return view('admin.events.show', compact('event'));
    }
    public function ajax(Request $request) {
        $query = Event::query();
        return DataTables::eloquent($query)->addColumn('depart',function(Event $event){
            return $event->depart->name;
        })->toJson();

    }
    public function edit(Request $request,Event $event) {
        return view('admin.events.edit',compact('event'));
    }
    public function update(Request $request, Event $event) {
        $input = $request->all();

        if ($request->hasFile('brochure')) {
            Storage::disk('public')->delete($event->brochure);
            $file = $request->file('brochure');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $filePath = 'uploads/events/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $input["brochure"] = "$filePath";
        }
        else
        {
            unset($input['brochure']);
        }
    
        $event->update($input);
        return redirect()->route('event.index')->with('alert-success','Event has been updated successfully');
    }
    public function delete(Request $request,Event $event){
        $event->delete();
        return redirect()->back()->with('alert-success','Event has been deleted successfully');
    }
    public function eventRegisteration(Event $event) {
        // dd($event);
        return view('client.eventBooking', compact('event'));
    }
    
}
