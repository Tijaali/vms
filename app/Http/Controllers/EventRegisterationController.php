<?php

namespace App\Http\Controllers;

use App\Mail\ApplicationAccepted;
use App\Mail\ApplicationRejected;
use App\Models\EventRegisteration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class EventRegisterationController extends Controller
{
    public function store(Request $request,EventRegisteration $eventregisteration){
        $request->validate(
            [
                'cnic_number' => 'regex:/^[0-9]{5}-[0-9]{7}-[0-9]$/|unique:event_registerations,cnic',
                'phone' => 'required|digits:10',
            ]
        );
        $eventregisteration->create($request->except('_token'));
        return redirect()->back()->with('alert-success','EventRegisteration has been created successfully!');
    }

    public function index() {
        return view('admin.eventBooking.index');      
    }
    public function ajax(){
        $query = EventRegisteration::query();
        return DataTables::eloquent($query)->addColumn('name',function(EventRegisteration $eventRegisteration){
            return $eventRegisteration->user->name;
        })->addColumn('email',function(EventRegisteration $eventRegisteration){
            return $eventRegisteration->user->email;
        })->addColumn('event',function(EventRegisteration $eventRegisteration){
            return $eventRegisteration->event->title;
        })->toJson();
        
    }
    public function delete(EventRegisteration $eventRegisteration){
        $eventRegisteration->delete();
        return redirect()->back()->with('alert-success','EventRegisteration has been deleted successfully!');
    }
    public function approve(Request $request, EventRegisteration $eventRegisteration)
    {
        $eventRegisteration->status = 'approved';
        $eventRegisteration->save();
        
        Mail::to($eventRegisteration->user->email)->send(new ApplicationAccepted($eventRegisteration));
        return redirect()->back()->with('alert-success', 'Application accepted and email sent.');
    }

    public function reject(Request $request, EventRegisteration $eventRegisteration)
    {
        $eventRegisteration->status = 'rejected';
        $eventRegisteration->save();

        Mail::to($eventRegisteration->user->email)->send(new ApplicationRejected($eventRegisteration));
        return redirect()->back()->with('alert-success', 'Application rejected and email sent.');
    }
    public function entry(Request $request, EventRegisteration $eventRegisteration)
    {
        $eventRegisteration->entryStatus = 'entered';
        $eventRegisteration->save();

        return redirect()->back()->with('alert-success','Visitor has been allowed to enter successfully!');
    }
    public function exit(Request $request, EventRegisteration $eventRegisteration)
    {
        $eventRegisteration->entryStatus = 'exited';
        $eventRegisteration->save();

        return redirect()->back()->with('alert-success','Visitor has been exited from campus!');
    }
}

