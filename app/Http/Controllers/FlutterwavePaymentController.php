<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Payment;
use App\Models\Student;

class FlutterwavePaymentController extends Controller
{
    public function initiate(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric|min:1',
        ]);

        $student = Student::findOrFail($request->student_id);
        $tx_ref = 'PALSPAY-' . uniqid();

        $data = [
            "tx_ref" => $tx_ref,
            "amount" => $request->amount,
            "currency" => "UGX",
            "redirect_url" => route('flutterwave.callback'),
            "payment_options" => "card, mobilemoneyuganda",
            "customer" => [
                "email" => $student->email,
                "name" => $student->name,
            ],
            "customizations" => [
                "title" => "Pals Student Payment",
                "description" => "Tuition payment for " . $student->name,
            ]
        ];

        $response = Http::withToken(config('services.flutterwave.secret_key'))
            ->post('https://api.flutterwave.com/v3/payments', $data)
            ->json();

        if (isset($response['data']['link'])) {
            session()->put('student_id', $request->student_id);
            return redirect($response['data']['link']);
        }

        return back()->with('error', 'Something went wrong. Try again.');
    }

    public function callback(Request $request)
    {
        $status = $request->query('status');

        if ($status === 'successful') {
            $tx_id = $request->query('transaction_id');

            $verify = Http::withToken(config('services.flutterwave.secret_key'))
                ->get("https://api.flutterwave.com/v3/transactions/{$tx_id}/verify")
                ->json();

            if ($verify['status'] === 'success') {
                $amount = $verify['data']['amount'];
                $method = $verify['data']['payment_type'];
                $reference = $verify['data']['tx_ref'];
                $student_id = session('student_id');

                Payment::create([
                    'student_id' => $student_id,
                    'amount' => $amount,
                    'method' => $method,
                    'reference' => $reference,
                ]);

                return redirect()->route('student.payments.make', $student_id)
                    ->with('success', 'Payment successful!');
            }
        }

        return redirect()->route('student.payments.make', session('student_id'))
            ->with('error', 'Payment was not completed.');
    }
}


