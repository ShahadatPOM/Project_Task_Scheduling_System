<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountCredentials extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $password;

    public function __construct($array)
    {
        $this->email = $array['email'];
        $this->password = $array['password'];
    }

    public function build()
    {
        return $this->view('user.email');
    }
}
