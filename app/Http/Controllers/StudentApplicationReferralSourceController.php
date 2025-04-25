<?php

namespace App\Http\Controllers;

use App\Models\StudentApplicationReferralSource;
use Illuminate\Http\Request;

class StudentApplicationReferralSourceController extends Controller
{
    // Displaying a listing of the resource
    public function index()
    {
        $referrals = StudentApplicationReferralSource::all();
        return view('student_referrals.index', compact('referrals')); // You can return a view or API response
    }

    // Showing the form for creating a new resource
    public function create()
    {
        return view('student_referrals.create'); // Creating a form for adding referrals
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_application_id' => 'required|exists:student_applications,id',
            'referral_source_id' => 'required|exists:referral_sources,id',
        ]);

        StudentApplicationReferralSource::create($validated);

        return redirect()->route('referrals.index')->with('success', 'Referral added successfully!');
    }

    // Displaying the specified resource
    public function show($id)
    {
        $referral = StudentApplicationReferralSource::findOrFail($id);
        return view('student_referrals.show', compact('referral'));
    }

    // Showing the form for editing the specified resource
    public function edit($id)
    {
        $referral = StudentApplicationReferralSource::findOrFail($id);
        return view('student_referrals.edit', compact('referral'));
    }

    // Updating the specified resource in storage
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'student_application_id' => 'required|exists:student_applications,id',
            'referral_source_id' => 'required|exists:referral_sources,id',
        ]);

        $referral = StudentApplicationReferralSource::findOrFail($id);
        $referral->update($validated);

        return redirect()->route('referrals.index')->with('success', 'Referral updated successfully!');
    }

    // Removing the specified resource from storage
    public function destroy($id)
    {
        $referral = StudentApplicationReferralSource::findOrFail($id);
        $referral->delete();

        return redirect()->route('referrals.index')->with('success', 'Referral deleted successfully!');
    }
}