<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailcontent;
    /**
     * Create a new message instance.
     *
     * @return void
     */
   
    public function __construct($mailcontent)
    {
        $this->mailcontent = $mailcontent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sruthisureshp09@gmail.com')
        ->view('email');
    }
}
