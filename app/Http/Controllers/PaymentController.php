<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Payment;

class PaymentController extends Controller
{
   

    public function showPaymentForm($studentId)
    {
        $student = Student::findOrFail($studentId);
        return view('payments.create', compact('student'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric|min:1',
            'method' => 'required|string',
        ]);

        Payment::create([
            'student_id' => $request->student_id,
            'amount' => $request->amount,
            'method' => $request->method,
            'reference' => 'REF-' . uniqid(),
        ]);

        return redirect()->back()->with('success', 'Payment recorded successfully.');
    }
}


