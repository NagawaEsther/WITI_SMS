<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Models\CourseUnit;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\URL;


class LectureController extends Controller
{
    public function index()
    {
        $lectures = Lecture::with('courseUnit')->latest()->get();
        return view('lectures.index', compact('lectures'));
    }

    public function create()
    {
        $courseUnits = CourseUnit::all();
        return view('lectures.create', compact('courseUnits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'course_units_id' => 'required|exists:course_units,id',
            'lecture_file' => 'nullable|mimes:pdf,ppt,pptx,docx',
            'video_url' => 'nullable|url',
            'description' => 'nullable|string',
          

            'start_time' => 'nullable|date',
            'end_time' => 'nullable|date|after:start_time', // Ensure end_time is after start_time
        ]);

        $path = null;
        if ($request->hasFile('lecture_file')) {
            $path = $request->file('lecture_file')->store('lectures', 'public');
        }

        Lecture::create([
            'title' => $request->title,
            'description' => $request->description,
            'course_units_id' => $request->course_units_id,
            'file_path' => $path,
            'video_url' => $request->video_url,
            'status' => 'active', // optional
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'posted_by' => auth()->user()->name ?? 'Admin'
        ]);

        return redirect()->route('lectures.index')->with('success', 'Lecture uploaded successfully.');
    }

    public function show(Lecture $lecture)
    {
        return view('lectures.show', compact('lecture'));
    }



    public function studentCourseUnits()
{
    $courseUnits = CourseUnit::with('lectures')->get(); // eager load lectures
    return view('/course_units', compact('courseUnits'));
}

public function showLecturesByUnit($id)
{
    $courseUnit = CourseUnit::with('lectures')->findOrFail($id);
    return view('/lectures_by_unit', compact('courseUnit'));
}

public function bulkDelete(Request $request)
{
    Lecture::whereIn('id', $request->ids)->delete();
    return response()->json(['success' => "Lectures deleted successfully."]);
}



public function edit($id)
{
    // Find the lecture by its ID
    $lecture = Lecture::findOrFail($id);

    // Get all course units for the dropdown list
    $courseUnits = CourseUnit::all();

    // Return the edit view with the lecture data and course units
    return view('lectures.edit', compact('lecture', 'courseUnits'));
}

public function update(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'title' => 'required|string|max:255',
        'course_units_id' => 'required|exists:course_units,id',
        'description' => 'nullable|string',
        'lecture_file' => 'nullable|file|mimes:pdf,ppt,pptx,docx', // Example file types
        'video_url' => 'nullable|url',
        'start_time' => 'nullable|date',
        'end_time' => 'nullable|date|after:start_time', // Ensure end time is after start time
    ]);

    // Find the lecture by its ID
    $lecture = Lecture::findOrFail($id);

    // Update the lecture data
    $lecture->title = $request->input('title');
    $lecture->course_units_id = $request->input('course_units_id');
    $lecture->description = $request->input('description');
    $lecture->start_time = $request->input('start_time');
    $lecture->end_time = $request->input('end_time');
    $lecture->video_url = $request->input('video_url');

    // Handle the file upload if there is a new lecture file
    if ($request->hasFile('lecture_file')) {
        // Delete the old file if it exists
        if ($lecture->file_path) {
            Storage::delete('public/' . $lecture->file_path);
        }

        // Store the new file
        $filePath = $request->file('lecture_file')->store('lectures', 'public');
        $lecture->file_path = $filePath;
    }

    // Save the updated lecture
    $lecture->save();

    // Redirect back to the lectures index with a success message
    return redirect()->route('lectures.index')->with('success', 'Lecture updated successfully.');
}


public function destroy($id)
{
    $lecture = Lecture::findOrFail($id);

    // If a file exists, delete it
    if ($lecture->file_path) {
        Storage::delete('public/' . $lecture->file_path);
    }

    // Delete the lecture record
    $lecture->delete();

    return redirect()->route('lectures.index')->with('success', 'Lecture deleted successfully.');
}













}