<?php

// app/Http/Controllers/AcademicCalendarController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicCalendarEvent;

class AcademicCalendarController extends Controller
{
    public function index()
    {
        $events = AcademicCalendarEvent::orderBy('start_date')->get();
        return view('calendar.index', compact('events'));
    }

    public function create()
    {
        return view('calendar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        AcademicCalendarEvent::create($request->all());

        return redirect()->route('calendar.index')->with('success', 'Event added successfully');
    }

    public function destroy($id)
    {
        AcademicCalendarEvent::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Event deleted');
    }


//     public function bulkDelete(Request $request)
// {
//     $eventIds = $request->input('event_ids');
    
//     if ($eventIds) {
//         AcademicCalendarEvent::destroy($eventIds); // Delete events by their IDs
//         return redirect()->route('calendar.index')->with('success', 'Selected events deleted successfully.');
//     }

//     return redirect()->route('calendar.index')->with('error', 'No events selected for deletion.');
// }

public function bulkDelete(Request $request)
{
    // Get the selected event IDs
    $eventIds = $request->input('events', []);

    // Check if there are selected IDs
    if (count($eventIds) > 0) {
        // Delete the events by their IDs
        AcademicCalendarEvent::whereIn('id', $eventIds)->delete();
        return redirect()->route('calendar.index')->with('success', 'Selected events deleted successfully.');
    } else {
        return redirect()->route('calendar.index')->with('error', 'No events selected for deletion.');
    }
}

public function academicCalendar()
{

    $events=AcademicCalendarEvent::all();

    // Retrieve calendar events
    $calendarEvents = AcademicCalendarEvent::all(); // Adjust this query as needed


    // ✅ Pass them to the view
    
    return view('/academic_calendar',compact('events'));
}


}
