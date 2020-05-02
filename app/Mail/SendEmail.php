<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sub;
    public $msg;
    public function __construct($subject, $message)
    {
        $this->sub = $subject;
        $this->msg = $message;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $img = asset('front/imgs/logo.png');
        $e_sub = $this->sub;
        $e_message = $this->msg;
        return $this->view('mail', compact('e_message', 'img'))->subject($e_sub);
    }
}
