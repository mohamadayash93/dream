<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ServiceEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $sub;
    public $_name;
    public $_mobile;
    public $_city;
    public $msg;
    public function __construct($subject, $name, $mobile, $city, $message)
    {
        $this->sub = $subject;
        $this->_city = $city;
        $this->_name = $name;
        $this->_mobile = $mobile;
        $this->msg = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $img = asset('imgs/logo.png');
        $e_sub = $this->sub;
        $e_name = $this->_name;
        $e_mobile= $this->_mobile;
        $e_city = $this->_city;
        $e_message = $this->msg;
        return $this->view('mail', compact('e_message', 'e_name', 'e_mobile', 'e_city', 'img'))->subject($e_sub);
    }
}
