<?php

namespace App\Http\Controllers;

use App\Exports\ExportVisitor;
use App\Mail\ApplicationAccepted;
use App\Mail\ApplicationRejected;
use App\Models\Visitor;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Notification;
use App\Models\User;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;
class VisitorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:visitor-list|visitor-create|visitor-edit|visitor-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:visitor-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:visitor-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:visitor-delete', ['only' => ['delete']]);
    }
    public function create()
    {
        return view('admin.visitors.create');
    }
    public function store(Request $request, Visitor $visitor)
    {
        $request->validate(
            [
                'cnic_number' => 'regex:/^[0-9]{5}-[0-9]{7}-[0-9]$/|unique:visitors,cnic_number',
                'mobilenumber' => 'required|digits:10',
            ]
        );
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filePath = 'uploads/visitors/' . $filename;

            // Store the file
            Storage::disk('public')->put($filePath, file_get_contents($file));

            $input["image"] = "$filePath";
        }
        if (auth()->user()->hasRole('visitor')) {
            $input['user_id'] = auth()->user()->id;
            // Create the visitor and associate the user with it
            $visitor = $visitor->create($input);
            $visitor->user()->associate(auth()->user());
            $visitor->save();
             // Add a notification for the visitor rejection
        Notification::create([
            'visitor_id' => $visitor->id,
            'message' => "Visitor {$visitor->name} has applied." // Adjust according to your notification structure
        ]);
        } else {
            // Create the user
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => $input['password']
            ]);

            // Assign the 'visitor' role to the user
            $visitorRole = Role::where('name', 'visitor')->first();
            $user->assignRole($visitorRole);
            $input['user_id'] = $user->id;
            // Create the visitor and associate the user with it
            $visitor = $visitor->create($input);
            $visitor->user()->associate($user);
            $visitor->save();
        }
        
        return redirect()->back()->with('alert-success', 'Visitor has been added successfully');
    }
    public function index()
    {
        return view('admin.visitors.index');
    }
    public function show(Request $request, Visitor $visitor)
    {
        return view('admin.visitors.show', compact('visitor'));
    }
    public function ajax(Request $request)
    {
        $query = Visitor::query();
        return DataTables::eloquent($query)->addColumn('category', function (Visitor $visitor) {
            $category = $visitor->category->name;
            return $category;
        })->addColumn('depart', function (Visitor $visitor) {
            return $visitor->depart->name;
        })->toJson();
    }
    public function edit(Request $request, Visitor $visitor)
    {
        // $userMail = $visitor->email;
        // // dd($userMail);
        return view('admin.visitors.edit', compact('visitor'));
    }
    public function update(Request $request, Visitor $visitor)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($visitor->image);
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filePath = 'uploads/visitors/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $input["image"] = "$filePath";
        } else {
            unset($input['image']);
        }
        $user = $visitor->user;
        $user->update([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => $input['password']
        ]);
        $visitor->update($input);
        return redirect()->route('visitor.index')->with('alert-success', 'Visitor has been updated successfully');
    }
    public function delete(Request $request, Visitor $visitor)
    {
        $visitor->delete();
        return redirect()->back()->with('alert-success', 'Visitor has been deleted successfully');
    }
    public function approve(Request $request, Visitor $visitor)
    {
        $visitor->status = 'approved';
        $visitor->save();
        
        Mail::to($visitor->email)->send(new ApplicationAccepted($visitor));

        return redirect()->back()->with('alert-success', 'Application accepted and email sent.');
    }

    public function reject(Request $request, Visitor $visitor)
    {
        $visitor->status = 'rejected';
        $visitor->save();
        Mail::to($visitor->email)->send(new ApplicationRejected($visitor));

        return redirect()->back()->with('alert-success', 'Application rejected and email sent.');
    }


    public function createPdf(Visitor $visitor)
    {
        $pdf = Pdf::loadView('admin.visitors.pdf', compact('visitor'));
        return $pdf->download('visitors.pdf'); // Download the generated PDF
    }
    public function exportVisitor(Request $request)
    {

        return Excel::download(new ExportVisitor, 'visitors.xlsx');
    }
    public function entry(Request $request, Visitor $visitor)
    {
        $visitor->entryStatus = 'entered';
        $visitor->save();

        return redirect()->back()->with('alert-success','Visito has been entered ');;
    }
    public function exit(Request $request, Visitor $visitor)
    {
        $visitor->entryStatus = 'exited';
        $visitor->save();

        return redirect()->back()->with('alert-success','Visitor has been exited ');
    }
}
