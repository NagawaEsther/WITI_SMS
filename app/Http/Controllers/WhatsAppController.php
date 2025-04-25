<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\TwilioService;

class WhatsAppController extends Controller
{
    protected $twilio;

    public function __construct(TwilioService $twilio)
    {
        $this->twilio = $twilio;
    }

    public function index()
{
    return view('whatsapp.index'); // Ensure this Blade file exists
}


    public function sendMessage(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'message' => 'required'
        ]);

        $this->twilio->sendWhatsAppMessage($request->input('phone'), $request->input('message'));

        return back()->with('success', 'WhatsApp message sent successfully!');
    }


    
}
