<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecentActivity;

class RecentActivityController extends Controller
{
    public function index()
    {
        $activities = RecentActivity::latest()->get();
        return view('recent_activities.index', compact('activities'));
    }

    public function create()
    {
        return view('recent_activities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ]);

        $activity =RecentActivity::create($request->all());
        return redirect()->route('recent_activities.index')->with('success', 'Activity "' . $activity->title . '"added successfully!');
    }

    public function destroy($id)
    {
        RecentActivity::findOrFail($id)->delete();
        return redirect()->route('recent_activities.index')->with('success', 'Activity deleted!');
    }
}
