<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestModel;
use Illuminate\Support\Facades\Storage;

class RequestController extends Controller
{
    public function submitDeadSemester(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'semester' => 'required|string',
            'reason' => 'required|string',
            // 'status'=>'required|status',
            'document' => 'nullable|file|mimes:pdf,jpg,jpeg,png,docx|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('document')) {
            $filePath = $request->file('document')->store('requests');
        }
        // $filePath = null;
        // if ($request->hasFile('document')) {
        //     $path = $request->file('document')->store('requests', 'public');
        // }


        RequestModel::create([
            'name' => $request->name,
            'type' => 'semester',
            'semester' => $request->semester,
            'reason' => $request->reason,
            // 'status'=>$request->status,
            'document' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Dead semester request submitted successfully.');
    }

    public function submitDeadYear(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'year' => 'required|string',
            'reason' => 'required|string',
            // 'status'=>'required|string',
            'document' => 'nullable|file|mimes:pdf,jpg,jpeg,png,docx|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('document')) {
            $filePath = $request->file('document')->store('requests');
        }

        RequestModel::create([
            'name' => $request->name,
            'type' => 'year',
            'year' => $request->year,
            'reason' => $request->reason,
            'document' => $filePath,
            // 'status'=>$request->status,
        ]);

        return redirect()->back()->with('success', 'Dead year request submitted successfully.');
    }


    public function approve($id)
{
    $request = RequestModel::findOrFail($id);
    $request->status = 'approved';
    $request->save();

    return redirect()->back()->with('success', 'Request approved successfully.');
}

public function reject($id)
{
    $request = RequestModel::findOrFail($id);
    $request->status = 'rejected';
    $request->save();

    return redirect()->back()->with('success', 'Request rejected successfully.');
}

}

