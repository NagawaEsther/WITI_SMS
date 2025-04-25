<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $applicantName;

    public function __construct($applicantName)
    {
        $this->applicantName = $applicantName;
    }

    public function build()
    {
        return $this->from('shanitahkhan874@gmail.com', 'Women Institute of Technology and Innovation') // Change the sender email if needed
                    ->subject('Application Received')
                    ->view('emails.application_submitted')
                    ->with([
                        'name' => $this->applicantName
                    ]);
    }
}
