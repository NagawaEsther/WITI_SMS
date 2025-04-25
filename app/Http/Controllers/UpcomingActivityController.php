<?php

namespace App\Http\Controllers;

use App\Models\UpcomingActivity;
use Illuminate\Http\Request;

class UpcomingActivityController extends Controller
{
    // Fetch and display the upcoming activities
    public function index()
    {
        // Fetch all upcoming activities from the database
        $upcomingActivities = UpcomingActivity::all();
        
        // Return the view with the fetched data
        return view('upcoming_activities.index', compact('upcomingActivities'));
    }

    // Show the form to create a new upcoming activity
    public function create()
    {
        return view('upcoming_activities.create');
    }


    // Store a new upcoming activity
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'title' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ]);

        // Create and store the new upcoming activity in the database
        UpcomingActivity::create([
            'title' => $request->title,
            'time' => $request->time,
            'status' => $request->status,
            'icon' => $request->icon,
        ]);

        $activity =UpcomingActivity::create($request->all());

        // Redirect or return a response
        return redirect()->route('upcoming_activities.index')->with('success', 'Upcoming activity "' . $activity->title . '"added successfully.');
    }

    // Show the form to edit an existing upcoming activity
    public function edit($id)
    {
        // Find the upcoming activity by ID
        $activity = UpcomingActivity::findOrFail($id);
        
        // Return the edit view with the activity data
        return view('upcoming_activities.edit', compact('activity'));
    }

    // Update the upcoming activity in the database
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'title' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ]);

        // Find and update the activity by ID
        $activity = UpcomingActivity::findOrFail($id);
        $activity->update([
            'title' => $request->title,
            'time' => $request->time,
            'status' => $request->status,
            'icon' => $request->icon,
        ]);

        // Redirect or return a response
        return redirect()->route('upcoming_activities.index')->with('success', 'Activity updated successfully.');
    }

    // Delete an upcoming activity
    public function destroy($id)
    {
        // Find and delete the activity by ID
        $activity = UpcomingActivity::findOrFail($id);
        $activity->delete();

        // Redirect or return a response
        return redirect()->route('upcoming_activities.index')->with('success', 'Activity deleted successfully.');
    }


    // Show the details of a specific upcoming activity
public function show($id)
{
    // Find the upcoming activity by ID
    $activity = UpcomingActivity::findOrFail($id);
    
    // Return the show view with the activity data
    return view('upcoming_activities.show', compact('activity'));
}

}
