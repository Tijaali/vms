<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecurityOfficerController extends Controller
{
    public function create(){
        return view('admin.empolyee.create');
    }
}
