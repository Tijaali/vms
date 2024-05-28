<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\SecurityOfficer;
use App\Models\Visitor;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    // public function getUser() {
    //     $visitor = DB::table('visitors')->where()
    // }
    public function homePage() {
        $events = Event::get();
        $employees = SecurityOfficer::get();
        // dd($employees);
        return view('client.index',compact('events','employees'));
    }
}
