<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = Lecturer::all(); // Fetch all lecturers
        return view('lecturers.index', compact('lecturers'));
    }

    public function create()
    {
        return view('lecturers.create'); // Show the create form
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:lecturers',
            'phone_number' => 'required|digits_between:10,15',
            'gender' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            
            'password' => 'nullable|string|min:6|max:255', // Password is optional
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Create a new Lecturer instance
        $lecturer = new Lecturer();
        $lecturer->name = $request->name;
        $lecturer->email = $request->email;
        $lecturer->phone_number = $request->phone_number;
        $lecturer->gender = $request->gender;
        $lecturer->position = $request->position;
        $lecturer->status = $request->status;
        

        

        // Set password (use provided password or default to "123456")
        $lecturer->password = Hash::make($request->password ?? '123456');

        // Store user image if uploaded
        if ($request->hasFile('image')) {
            $lecturer->image = \App\Models\ImageUploader::upload($request->file('image'), 'lecturers');
        } else {
            $lecturer->image = "user.jpg";
        }

        $lecturer->save(); // Save lecturer to database
        
        
        
        return redirect()->route('lecturers.index')->with('success', 'Lecturer added successfully!');
    }

    public function show(Lecturer $lecturer)
    {
        return view('lecturers.show', compact('lecturer')); // Show lecturer details
    }

    public function edit(Lecturer $lecturer)
    {
        return view('lecturers.edit', compact('lecturer')); // Show edit form
    }

    public function update(Request $request, Lecturer $lecturer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:lecturers,email,' . $lecturer->id,
            'phone_number' => 'required|digits_between:10,15',
            'gender' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            
            'password' => 'nullable|string|min:6|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $lecturer->name = $request->name;
        $lecturer->email = $request->email;
        $lecturer->phone_number = $request->phone_number;
        $lecturer->gender = $request->gender;
        $lecturer->position = $request->position;
        $lecturer->status = $request->status;
        
        // Update password if provided
        if ($request->filled('password')) {
            $lecturer->password = Hash::make($request->password);
        }

        // Update image if uploaded
        if ($request->hasFile('image')) {
            $lecturer->image = \App\Models\ImageUploader::upload($request->file('image'), 'users');
        }

        $lecturer->save(); // Save changes
        

        return redirect()->route('lecturers.index')->with('success', 'Lecturer updated successfully!');
    }

    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete(); // Delete lecturer
        return redirect()->route('lecturers.index')->with('success', 'Lecturer deleted successfully!');
    }


    public function bulkDestroy(Request $request)
    {
        // Get the selected application IDs
        $ids = explode(',', $request->input('ids'));

        // Delete the selected student applications
        Lecturer::destroy($ids);

        return redirect()->route('lecturer.index')->with('success', 'Selected applications deleted.');
    }
}
