<?php

namespace App\Http\Controllers;

use App\Models\ReferralSource;  // Add this line
use Illuminate\Http\Request;

class ReferralSourceController extends Controller
{
    public function index()
    {
        $referralSources = ReferralSource::all(); // Fetch all referral sources
        return view('referral_sources.index', compact('referralSources'));  // Pass to view
    }

    public function create()
    {
        return view('referral_sources.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'source_name' => 'required|unique:referral_sources',
            'status' => 'required|in:active,inactive',
        ]);

        ReferralSource::create($request->all());
        return redirect()->route('referral_sources.index')->with('success', 'Referral Source created successfully.');
    }

    public function show($id)
    {
        $referralSource = ReferralSource::findOrFail($id);
        return view('referral_sources.show', compact('referralSource'));
    }

    public function edit($id)
    {
        $referralSource = ReferralSource::findOrFail($id);
        return view('referral_sources.edit', compact('referralSource'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'source_name' => 'required|unique:referral_sources,source_name,' . $id,
            'status' => 'required|in:active,inactive',
        ]);

        $referralSource = ReferralSource::findOrFail($id);
        $referralSource->update($request->all());
        return redirect()->route('referral_sources.index')->with('success', 'Referral Source updated successfully.');
    }

    public function destroy($id)
    {
        $referralSource = ReferralSource::findOrFail($id);
        $referralSource->delete();
        return redirect()->route('referral_sources.index')->with('success', 'Referral Source deleted successfully.');
    }
}