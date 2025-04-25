<?php

// app/Http/Controllers/ModuleController.php

// app/Http/Controllers/ModuleController.php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\CourseUnit;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::with('courseUnit')->get();
        return view('modules.index', compact('modules'));
    }

    public function create()
    {
        $courseUnits = CourseUnit::all();
        return view('modules.create', compact('courseUnits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_unit_id' => 'required|exists:course_units,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'lesson_count' => 'required|integer',
            'duration' => 'required|string',
            'status' => 'required|in:completed,current,locked',
            'icon' => 'nullable|string|max:255',
        ]);

        Module::create($request->all());

        return redirect()->route('modules.index')
                         ->with('success', 'Module created successfully.');
    }
//     public function show($id)
// {
//     $courseUnits = CourseUnit::with('modules')->findOrFail($id);
    
//     // Optionally filter or sort modules
//     $modules = $courseUnits->modules()->orderBy('title')->get();

//     return view('courses.show', compact('modules', 'courseUnit'));
// }

// Assuming you have a CourseUnit model and it has a relationship with Module
public function show($id)
{
    // Fetch the course unit by id and load its modules
    $courseUnit = CourseUnit::with('modules')->findOrFail($id);

    // Pass the courseUnit and its modules to the view
    return view('details', [
        'courseUnit' => $courseUnit,
        'modules' => $courseUnit->modules,  // This ensures you pass modules to the view
    ]);
}



}
