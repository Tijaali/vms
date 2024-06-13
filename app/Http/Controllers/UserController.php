<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegisteration;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userApplications() {
        $user = auth()->user(); 
        // dd($user);
         if (auth()->user()->hasRole('visitor')) {
            $usersAndApp = Visitor::where('user_id', $user->id)->get();
            // dd($usersAndApp);
            return view('admin.Applications.application',compact('usersAndApp'));
        }

    }
    public function eventApplications() {
        $user = auth()->user(); 
        // dd($user);
         if (auth()->user()->hasRole('visitor')) {
            $usersAndApp = EventRegisteration::where('user_id', $user->id)->get();
            // dd($usersAndApp);
            return view('admin.Applications.eventApplications',compact('usersAndApp'));
        }

    }
    public function eventData(){
        $events = Event::with('depart')->get();
        return view('admin.Applications.events',compact('events'));

    }
}
