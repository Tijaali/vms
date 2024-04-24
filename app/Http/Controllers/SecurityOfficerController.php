<?php

namespace App\Http\Controllers;

use App\Models\SecurityOfficer;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class SecurityOfficerController extends Controller
{
        function __construct()
    {
         $this->middleware('permission:employee-show|employee-list|employee-create|employee-edit|employee-delete', ['only' => ['index','store']]);
         $this->middleware('permission:employee-create', ['only' => ['create','store']]);
         $this->middleware('permission:employee-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:employee-delete', ['only' => ['delete']]);
         $this->middleware('permission:employee-show',['only'=>['show']]);
    }
    public function create()
    {
        return view('admin.employee.create');
    }
    public function store(Request $request, SecurityOfficer $securityOfficer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            // 'password' => 'required|string|min:8',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the image validation rules as needed
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filepath = "uploads/employees/" . $filename;
            Storage::disk('public')->put($filepath, file_get_contents($file));
            $input["image"] = $filepath;
        }
    
        // Create the user
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => $input['password']
        ]);
    
        // Assign the 'security' role to the user
        $securityRole = Role::where('name', 'SecurityOfficer')->first();
        $user->assignRole($securityRole);
    
        // Create the security officer and associate the user with it
        $securityOfficer = $securityOfficer->create($input);
        $securityOfficer->user()->associate($user);
        $securityOfficer->save();
    
        return redirect()->route('empoylee.index')->with('alert-success', 'Security Officer has been created');
    }
    public function index()
    {
        return view('admin.employee.index');
    }
    public function ajax(Request $request)
    {
        $query = SecurityOfficer::query();
        return DataTables::eloquent($query)->addColumn('depart', function (SecurityOfficer $securityOfficer) {
            $depart = $securityOfficer->depart->name;
            return $depart;
        })->toJson();
    }
    public function show(Request $request, SecurityOfficer $securityOfficer){
        return view('admin.employee.show',compact('securityOfficer'));
    }
    public function edit(Request $request, SecurityOfficer $securityOfficer)
    {
        return view('admin.employee.edit', compact('securityOfficer'));
    }
    public function update(Request $request, SecurityOfficer $securityOfficer)
    {
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($securityOfficer->image);
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filepath = "uploads/employees/" . $filename;
            Storage::disk('public')->put($filepath, file_get_contents($file));
            $input["image"] = $filepath;
        } else {
            unset($input['image']);
        }
       $user= $securityOfficer->user;
       $user->update([
        'name' => $input['name'],
        'email' => $input['email'],
        'password' => $input['password']
       ]);
        $securityOfficer->update($input);
        return redirect()->route('empoylee.index')->with('alert-success', 'Record has been updated successfully!');
    }
    public function delete(Request $request, SecurityOfficer $securityOfficer)
    {
        $securityOfficer->delete();
        return redirect()->back();
    }

}
