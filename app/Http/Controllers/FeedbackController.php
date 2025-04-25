<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackReply;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('/feedback'); // form page
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Feedback::create([
            'student_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }

    public function destroy($id)
{
    $feedback = Feedback::findOrFail($id);
    $feedback->delete();

    return redirect()->route('admin.feedbacks')->with('success', 'Feedback deleted successfully!');
}




public function replyToFeedback(Request $request, $id)
{
    $request->validate([
        'reply' => 'required|string|max:1000',
    ]);

    // Find the feedback
    $feedback = Feedback::findOrFail($id);

    // Check if the feedback has a student and user associated
    $student = $feedback->student; // Get the student related to the feedback

    if ($student && $student) {
        // Send the email reply to the student's email
        Mail::to($student->email)->send(new FeedbackReply($request->reply));

        return redirect()->route('admin.feedbacks')->with('success', 'Reply sent successfully!');
    } else {
        return redirect()->route('admin.feedbacks')->with('error', 'Student or User not found for this feedback!');
    }
}



public function bulkDelete(Request $request)
{
    $ids = $request->input('ids');

    if (!$ids) {
        return response()->json(['message' => 'No feedbacks selected'], 400);
    }

    Feedback::whereIn('id', $ids)->delete();

    return response()->json(['message' => 'Selected feedbacks deleted successfully']);
}






}
