<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $applicantName;

    public function __construct($applicantName)
    {
        $this->applicantName = $applicantName;
    }

    public function build()
    {
        return $this->from('shanitahkhan874@gmail.com', 'Women Institute of Technology and Innovation')
                    ->subject('Application Approved')
                    ->view('emails.application_approved')
                    ->with([
                        'name' => $this->applicantName
                    ]);
    }
}
