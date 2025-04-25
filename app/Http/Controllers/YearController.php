<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function index()
    {
        // Fetch years with pagination (10 per page)
        $years = Year::paginate(10);
        
        // Return the view with paginated years
        return view('years.index', compact('years'));
    }

    public function create()
    {
        return view('years.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Year::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('years.index')->with('success', 'Year created successfully.');
    }

    public function show($id)
    {
        $year = Year::findOrFail($id);
        return view('years.show', compact('year'));
    }

    public function edit($id)
    {
        $year = Year::findOrFail($id);
        return view('years.edit', compact('year'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $year = Year::findOrFail($id);
        $year->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('years.index')->with('success', 'Year updated successfully.');
    }

    public function destroy($id)
    {
        $year = Year::findOrFail($id);
        $year->delete();

        return redirect()->route('years.index')->with('success', 'Year deleted successfully.');
    }
}