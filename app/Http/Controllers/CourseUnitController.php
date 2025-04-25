<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseUnit;
use App\Models\Semester;

class CourseUnitController extends Controller
{
    // Display all course units
    public function index()
    {
        // Load all course units with their semester relationship
        // $courseUnits = CourseUnit::with('semester')->get();
        $courseUnits = CourseUnit::with('semester')->orderBy('created_at', 'desc')->get();
        


        return view('courses.index', compact('courseUnits'));
    }

    // Show the form for creating a new course unit
    public function create()
    {
        // Load all semesters for the dropdown
        $semesters = Semester::all();

        return view('courses.create', compact('semesters'));
    }

    // Store a newly created course unit
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'semester_id' => 'required|exists:semesters,id',
            'course_unit_code' => 'nullable|string|max:255',
            'status' => 'nullable|in:active,inactive',
            'credit_unit' => 'nullable|integer',
            'thumbnailUrl' => 'nullable|string|url',
            'duration'=>  'nullable|string',
            'startDate'=> 'nullable|date',
            'endDate'=> 'nullable|date',
            'totalLessons' =>'nullable|integer',
            'totalHours'=> 'nullable|integer',
            'lastAccessedDate'=> 'nullable|date',
            'lecturer_id'=> 'nullable|string',
            'lecturer_name'=> 'nullable|string',
            'lecturer_image'=>'nullable|string',
        ]);

        // Fetch the semester to get its name
    $semester = Semester::find($request->semester_id);

        CourseUnit::create([
            'name' => $request->name,
            'description' => $request->description,
            'semester_id' => $request->semester_id,
            'course_unit_code' => $request->course_unit_code,
            'thumbnailUrl' => $request->thumbnailUrl,
            'status' => $request->status ?? 'active',
            'credit_unit' => $request->credit_unit ?? 3,
            'created_by' => auth()->id(),
            'duration'=> $request->duration,
            'startDate'=> $request->startDate,
            'endDate'=> $request->endDate,
            'totalLessons'=> $request->totalLessons,
            'totalHours'=> $request->totalHours,
            'lastAccessedDate' => now(),
            // 'lastAccessedDate'=> $request->lastAccessedDate,
            'lecturer_id'=> $request->lecturer_id,
            'lecturer_name'=> $request->lecturer_name,
            'lecturer_image'=> $request->lecturer_image,
        ]);

        return redirect()->route('course-units.index')->with('success', 'Course Unit created successfully');
    }

    // Show the form for editing an existing course unit
    public function edit($id)
    {
        $courseUnit = CourseUnit::findOrFail($id);
        $semesters = Semester::all(); // To allow editing semester too if needed

        return view('courses.edit', compact('courseUnit', 'semesters'));
    }

    // Update a specific course unit
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'semester_id' => 'required|exists:semesters,id',
            'course_unit_code' => 'nullable|string|max:255',
            'status' => 'nullable|in:active,inactive',
            'credit_unit' => 'nullable|integer',
            'thumbnailUrl' => 'nullable|string|url',
            'duration'=>  'nullable|string',
            'startDate'=> 'nullable|date',
            'endDate'=> 'nullable|date',
            'totalLessons' =>'nullable|integer',
            'totalHours'=> 'nullable|integer',
            'lastAccessedDate'=> 'nullable|date',
            'lecturer_id'=> 'nullable|string',
            'lecturer_name'=> 'nullable|string',
            'lecturer_image'=>'nullable|string',
        ]);

        $courseUnit = CourseUnit::findOrFail($id);

        // Fetch the semester to get its name
        $semester = Semester::find($request->semester_id);

        $courseUnit->update([
            'name' => $request->name,
            'description' => $request->description,
            'semester_id' => $request->semester_id,
            'course_unit_code' => $request->course_unit_code,
            'status' => $request->status ?? 'active',
            'credit_unit' => $request->credit_unit ?? 3,
            'created_by' => auth()->id(),

            'thumbnailUrl' => $request->thumbnailUrl,

            'duration'=> $request->duration,
            'startDate'=> $request->startDate,
            'endDate'=> $request->endDate,
            'totalLessons'=> $request->totalLessons,
            'totalHours'=> $request->totalHours,
            'lastAccessedDate' => now(),
            // 'lastAccessedDate'=> $request->lastAccessedDate,
            'lecturer_id'=> $request->lecturer_id,
            'lecturer_name'=> $request->lecturer_name,
            'lecturer_image'=> $request->lecturer_image,



        ]);

        return redirect()->route('course-units.index')->with('success', 'Course Unit updated successfully');
    }

    // Delete a course unit
    public function destroy($id)
    {
        $courseUnit = CourseUnit::findOrFail($id);
        $courseUnit->delete();

        return redirect()->route('course-units.index')->with('success', 'Course Unit deleted successfully');
    }

    // Optional: Bulk delete course units
    public function bulkDestroy(Request $request)
    {
        $courseUnitIds = $request->input('ids');

        if (is_array($courseUnitIds) && count($courseUnitIds) > 0) {
            CourseUnit::whereIn('id', $courseUnitIds)->delete();
            return response()->json(['success' => 'Selected course units have been deleted.']);
        }

        return response()->json(['error' => 'No course units selected for deletion.'], 400);
    }

    // Show the details of a specific course unit
// public function show($id)
// {
//     $courseUnit = CourseUnit::findOrFail($id); // Find the specific course unit by ID

//     return view('courses.show', compact('courseUnit')); // Pass the single course unit to the view
// }

// public function show($id)
// {
//     $courseUnit = CourseUnit::findOrFail($id);

//     // Update the lastAccessedDate to the current timestamp
//     $courseUnit->lastAccessedDate = now(); // Laravel's helper to get the current timestamp
//     $courseUnit->save();

//     return view('courses.show', compact('courseUnit'));
// }

// public function show($id)
// {
//     $courseUnit = CourseUnit::findOrFail($id); // Find the specific course unit by ID

//     // Update the 'lastAccessedDate' to the current date and time
//     $courseUnit->lastAccessedDate = \Carbon\Carbon::now();
//     $courseUnit->save(); // Save the updated record

//     return view('courses.show', compact('courseUnit')); // Pass the course unit to the view
// }


public function show($id)
{
    $courseUnit = CourseUnit::findOrFail($id);

    // Update the lastAccessedDate to the current timestamp
    $courseUnit->update(['lastAccessedDate' => now()]);

    return view('courses.show', compact('courseUnit'));
}


public function search(Request $request)
{
    $search = $request->query('search');
    $courseUnits = CourseUnit::where('name', 'like', "%{$search}%")
        ->orWhere('course_unit_code', 'like', "%{$search}%")
        ->get();
    
    return view('/my_courses', compact('courseUnits'));
}




    

}
