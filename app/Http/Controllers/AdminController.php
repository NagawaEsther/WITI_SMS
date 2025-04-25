<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;

use Illuminate\Support\Facades\Mail;
use App\Mail\RequestStatusUpdate;
use App\Models\RequestModel;

class AdminController extends Controller
{
    public function viewFeedbacks()
{
    $feedbacks = Feedback::with('student')->latest()->get();
    return view('admin.feedbacks', compact('feedbacks'));
}



public function showStudentEnrollments()
{
    $students = \App\Models\User::whereHas('courseUnits')->with('courseUnits')->get();
    return view('admin.student_enrollments', compact('students'));
}


public function bulkDeleteEnrollments(Request $request)
{
    if ($request->has('ids')) {
        User::whereIn('id', $request->ids)->delete();
        return response()->json(['message' => 'Selected enrollments deleted successfully.']);
    }

    return response()->json(['message' => 'No enrollments selected.'], 400);
}



public function viewRequests()
{
    $requests = RequestModel::latest()->get(); // Fetch all requests
    return view('admin.requests', compact('requests'));
}


public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:approved,rejected',
    ]);

    $req = RequestModel::findOrFail($id);
    $req->status = $request->status;
    $req->save();

    if ($req->email) {
        Mail::to($req->email)->send(new RequestStatusUpdate($req));
    }


    // Send email
    // Mail::to('student@example.com') // Replace with user's email if stored
    //     ->send(new RequestStatusUpdate($req));

    return back()->with('success', 'Request status updated and email sent.');
}


}
